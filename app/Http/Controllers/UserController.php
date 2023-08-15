<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageUpload;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function postUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'national_id' => 'required|numeric|digits:8',
            'phone' => 'required|numeric|max_digits:15|unique:users',
            'email' => 'required|email|max:100|min:2',
            'designation' => 'required',
        ]);

        $User = new User();
        $User->password = bcrypt('password');

        return $this->putAccount($request, $User);
    }

    public function putAccount(Request $request, User $User)
    {
        $request->validate([
            'first_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'national_id' => 'required|numeric|digits:8',
            'phone' => 'required|numeric|max_digits:15',
            'email' => 'required|email|max:100|min:2',
            'designation' => 'required',
            'profilePicture' => 'nullable|image|max:2048',
        ]);

        $User->first_name = $request['first_name'];
        $User->last_name = $request['last_name'];
        $User->national_id = $request['national_id'];
        $User->phone = $request['phone'];
        $User->email = $request['email'];

        if($request->file() && $request->file('profilePicture')){
            $file = $request->file('profilePicture');
            $file_details = ImageUpload::upload_file($file,'profilePictures',true,$User);
            $User->profile_photo_path = $file_details['name'];
        }

        $User->save();

        $User->designation()->sync([$request['designation']]);

        $User->refresh();

        return Redirect::route('accounts.ViewAccount', ['User' => $User->id]);
    }

    public function putPassword(Request $request, User $User)
    {
        $request->validate([
            'currentPassword' => ['required', function ($attr, $val, $fail) {
                if (!Hash::check($val, Auth::user()->password)) {
                    $fail('Old password did not match');
                }
            }],
            'newPassword' => ['required', Password::default()],
            'confirmNewPassword' => ['required', 'same:newPassword'],
        ]);

        $User->password = bcrypt($request['newPassword']);
        $User->save();

        return \redirect()->route('accounts.ViewAccount',['User'=> $User]);
    }

    public function delete(Request $request,User $User)
    {
        $User->delete();

        return \redirect()->route('accounts.ListAccount');
    }
}
