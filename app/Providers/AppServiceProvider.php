<?php

namespace App\Providers;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        //TODO:Check on the default pass word recommendation
        Password::defaults(function () {
            return Password::min(8);
        });

        //validate if vehicle exist
        Validator::extend('vehicle_exist', function ($attribute, $value, $parameters, $validator) {
            try {

                $model = Vehicle::where('Registration_number', $value)->firstOrFail();
                return true;

            } catch (ModelNotFoundException $ex){
                return false;
            }

        });
        Validator::replacer('vehicle_exist', function ($message, $attribute, $rule, $parameters) {
            return "Vehicle does not exist";
        });


    }
}
