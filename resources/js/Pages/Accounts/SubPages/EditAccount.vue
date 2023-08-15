<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Add Account</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('accounts.ListAccounts')" class="px-[10px] button-fill-blue">Accounts
                </Link>
                <Link as="button" :href="route('accounts.CreateAccount')" class="px-[10px] button-fill-blue">Add New
                </Link>
                <button @click.prevent.stop="saveUser" class="px-[10px] button-fill-blue ">Save</button>
                <Link :href="route('accounts.ViewAccount',[account.id])"  as="button" class="px-[10px] hover:bg-red-600 bg-red-500 text-white border-none">Cancel</Link>
            </ul>
        </div>
        <section class="flex flex-wrap md:gap-[20px]">
            <article class="w-[100%] flex flex-wrap xl:w-[68%] ">
                <AppCardHolder :title="'About'" class="w-[100%] mb-[20px]">
                    <div class="flex flex-wrap gap-3">
                        <form @submit.prevent class="p-[10px] w-[100%] md:w-[200px]">
                            <div class="w-[100%]">
                                <img v-if="account.profile_photo_path"  id="imagePreview" class="w-[100%] h-[auto] mb-[10px]" :src="app_defaults.profilePictures+account.profile_photo_path">
                                <img v-else id="imagePreview" class="w-[100%] h-[auto] mb-[10px]" :src="app_defaults.systemImages+'User.png'">
                                <div class="input-group-default">
                                    <label>Update Image</label>
                                    <input accept="image/*" type="file" @change="updateImage($event)">
                                    <span class="text-red-400">{{ $page.props.errors.profilePicture }}</span>
                                </div>
                            </div>
                        </form>
                        <form @submit.prevent class="mb-[20px] w-[100%] md:w-[420px] lg:w-[48%]">
                            <div class="md:flex md:gap-1">
                                <div class="input-group-default">
                                    <label>First Name</label>
                                    <input type="text" v-model="userFrom.first_name">
                                    <span class="text-red-500">{{ $page.props.errors.first_name }}</span>
                                </div>
                                <div class="input-group-default">
                                    <label>Last Name</label>
                                    <input type="text" v-model="userFrom.last_name">
                                    <span class="text-red-500">{{ $page.props.errors.last_name }}</span>
                                </div>
                            </div>
                            <div class="md:flex gap-1">
                                <div class="input-group-default">
                                    <label>National ID</label>
                                    <input type="text" v-model="userFrom.national_id">
                                    <span class="text-red-500">{{ $page.props.errors.national_id }}</span>
                                </div>
                                <div class="input-group-default">
                                    <label>Phone</label>
                                    <input type="text" v-model="userFrom.phone">
                                    <span class="text-red-500">{{ $page.props.errors.phone }}</span>
                                </div>
                            </div>
                            <div class="input-group-default">
                                <label>Email</label>
                                <input type="email" v-model="userFrom.email">
                                <span class="text-red-500">{{ $page.props.errors.email }}</span>
                            </div>
                            <div class="input-group-default">
                                <label>Designation</label>
                                <select v-model="userFrom.designation">
                                    <option value="2">Moderator</option>
                                    <option value="1">Admin</option>
                                    <option value="3">Driver</option>
                                    <option value="4">Client</option>
                                </select>
                                <span class="text-red-500">{{ $page.props.errors.designation }}</span>
                            </div>
                        </form>
                    </div>
                </AppCardHolder>

                <AppCardHolder v-if="account.id == $page.props.auth.user.id"  :title="'Security'" class="w-[100%] mb-[20px] md:m-[0px] ">
                    <form @submit.prevent class="mb-[20px] w-[100%] md:w-[420px] lg:w-[48%]">
                        <div class="input-group-default">
                            <label>Current Password</label>
                            <input type="text" v-model="securityForm.currentPassword">
                            <span class="text-red-500">{{ $page.props.errors.currentPassword }}</span>
                        </div>
                        <div class="input-group-default">
                            <label>New Password</label>
                            <input type="text" v-model="securityForm.newPassword">
                            <span class="text-red-500">{{ $page.props.errors.newPassword }}</span>
                        </div>
                        <div class="input-group-default">
                            <label>Confirm New Password</label>
                            <input type="text" v-model="securityForm.confirmNewPassword">
                            <span class="text-red-500">{{ $page.props.errors.confirmNewPassword }}</span>
                        </div>
                        <button @click.prevent.stop="updatePassword" class="px-[10px]">Update Password</button>
                    </form>
                </AppCardHolder>

            </article>
        </section>
    </section>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {app_defaults} from "@/appDefaults/config.js";
import BookingFrom from "@/Pages/Booking/Components/BookingFrom.vue";
import {useForm} from "@inertiajs/vue3";
import VehicleCard from "@/appComponents/VehicleCard.vue";
import AppCardHolder from "@/appComponents/AppCardHolder.vue";

export default {
    methods: {
        updateImage(event){
            this.userFrom.profilePicture = event.target.files[0]

            const imgPreview = document.getElementById("imagePreview");

            const fileReader = new FileReader();
            fileReader.readAsDataURL(this.userFrom.profilePicture);

            fileReader.onload = (event) =>{
                imgPreview.src = event.target.result;
            }
        },
        saveUser() {
            this.userFrom.post(route('accounts.putAccount', [this.account.id]))
        },
        updatePassword() {
            this.securityForm.put(route('accounts.putPassword', [this.account.id]))
        }
    },
    computed: {
        app_defaults() {
            return app_defaults
        },
    },
    components: {AppCardHolder, VehicleCard, BookingFrom},
    layout: DashboardLayout,
    data() {
        return {
            active_tab: 'Details',
            userFrom: useForm({
                first_name: this.account.first_name,
                last_name: this.account.last_name,
                national_id: this.account.national_id,
                phone: this.account.phone,
                email: this.account.email,
                designation: this.account.designation[0].id,
                profilePicture:null,
            }),
            securityForm: useForm({
                currentPassword: null,
                newPassword: null,
                confirmNewPassword: null,
            })
        }
    },
    props: ['account'],
    mounted() {
        console.clear()
        console.log()
    }
}
</script>


