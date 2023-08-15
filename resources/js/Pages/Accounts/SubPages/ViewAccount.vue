<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Add Account</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('accounts.ListAccounts')" class="px-[10px] button-fill-blue" >Accounts</Link>
                <Link as="button" :href="route('accounts.CreateAccount')" class="px-[10px] button-fill-blue" >Add New</Link>
                <Link as="button" :href="route('accounts.EditAccount',[account.id])" class="px-[10px] button-fill-blue" >Edit</Link>
            </ul>
        </div>
        <section class="flex flex-wrap md:gap-[20px]">
            <article class="w-[100%] flex flex-wrap xl:w-[68%] ">
                <AppCardHolder :title="'About'" class="w-[100%] mb-[20px]">
                    <div class="flex flex-wrap gap-3">
                        <form @submit.prevent class="p-[10px] w-[100%] md:w-[200px]">
                            <div class="w-[100%]">
                                <img v-if="userFrom.profile_photo_path" class="w-[100%] h-[auto] mb-[10px]" :src="app_defaults.profilePictures+userFrom.profile_photo_path">
                                <img v-else class="w-[100%] h-[auto] mb-[10px]" :src="app_defaults.systemImages+'User.png'">
                            </div>
                        </form>
                        <form @submit.prevent class="mb-[20px] w-[100%] md:w-[420px] lg:w-[48%]">
                            <div class="md:flex md:gap-1">
                                <div class="input-group-default">
                                    <label>First Name</label>
                                    <input type="text" v-model="userFrom.first_name">
                                </div>
                                <div class="input-group-default">
                                    <label>Last Name</label>
                                    <input type="text" v-model="userFrom.last_name">
                                </div>
                            </div>
                            <div class="md:flex gap-1">
                                <div class="input-group-default">
                                    <label>National ID</label>
                                    <input type="text" v-model="userFrom.national_id">
                                </div>
                                <div class="input-group-default">
                                    <label>Phone</label>
                                    <input type="text" v-model="userFrom.phone">
                                </div>
                            </div>
                            <div class="input-group-default">
                                <label>Email</label>
                                <input type="email" v-model="userFrom.email">
                            </div>
                            <div class="input-group-default">
                                <label>Designation</label>
                                <input type="email" v-model="userFrom.designation[0].name">
                            </div>

                        </form>
                    </div>
                </AppCardHolder>
            </article>
        </section>
    </section>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {app_defaults} from "@/appDefaults/config.js";
import BookingFrom from "@/Pages/Booking/Components/BookingFrom.vue";
import { useForm} from "@inertiajs/vue3";
import VehicleCard from "@/appComponents/VehicleCard.vue";
import AppCardHolder from "@/appComponents/AppCardHolder.vue";

export default {
    methods: {
        saveUser(){
            this.userFrom.post(route('accounts.postAccount'))
        }
    },
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    components: {AppCardHolder, VehicleCard, BookingFrom},
    layout:DashboardLayout,
    data(){
        return{
            active_tab:'Details',
            userFrom:useForm({
                first_name:this.account.first_name,
                last_name:this.account.last_name,
                national_id:this.account.national_id,
                phone:this.account.phone,
                email:this.account.email,
                designation:this.account.designation,
                profile_photo_path:this.account.profile_photo_path
            })
        }
    },
    props:['account']
}
</script>
<style scoped lang="scss">
@import "../../../../scss/defaults";

input{
    border: none !important;
    pointer-events: none;
}

label{
    @extend .lighter-text;
}
</style>


