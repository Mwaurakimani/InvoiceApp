<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Add Notification</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('notifications.ListNotifications')" class="px-[10px] button-fill-blue" >Notifications</Link>
                <Link as="button" href="'/'" class="px-[10px] button-fill-blue " >Save Notification</Link>
            </ul>
        </div>
    </section>
    <section class="px-[10px]" >
        <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
            <h5>Notification Details</h5>
            <div class="input-group-default">
                <input type="text" placeholder="Title">
            </div>
            <div class="input-group-default">
                <textarea class="h-[100px]" placeholder="Notification" ></textarea>
            </div>
        </form>
    </section>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {app_defaults} from "@/appDefaults/config.js";
import BookingFrom from "@/Pages/Booking/Components/BookingFrom.vue";
import {router} from "@inertiajs/vue3";

export default {
    methods: {
        router() {
            return router
        }
    },
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    components: {BookingFrom},
    layout:DashboardLayout,
    data(){
        return{
            active_tab:'Details'
        }
    }
}
</script>


