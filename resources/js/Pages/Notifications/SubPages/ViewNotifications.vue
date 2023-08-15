<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Add Notification</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('notifications.ListNotifications')" class="px-[10px] button-fill-blue">
                    Notifications
                </Link>
                <Link as="button" method="delete" :href="route('notifications.DeleteNotification',[notification.id])" class="px-[10px] border-none bg-red-400 hover:bg-red-500 text-white">Delete Notification</Link>
            </ul>
        </div>
    </section>
    <section class="px-[10px]">
        <AppCardHolder :title="notification.title" class="">
<!--            <div class="flex mb-[10px]">-->
<!--                <label class="w-[50px]">From :</label>-->
<!--                <p>Username</p>-->
<!--            </div>-->
            <p class="small-text">{{ notification.message }}</p>
        </AppCardHolder>
    </section>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import AppCardHolder from "@/appComponents/AppCardHolder.vue";
import {app_defaults} from "@/appDefaults/config.js";
import VehicleCard from "@/appComponents/VehicleCard.vue";
import DriverCard from "@/appComponents/DriverCard.vue";
import DetailsComponent from "@/Pages/Booking/Components/DetailsComponent.vue";
import Payment from "@/Pages/Booking/Components/Payments.vue";

export default {
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    props:['notification'],
    components: {Payment, DetailsComponent, DriverCard, VehicleCard, AppCardHolder},
    layout: DashboardLayout,
    data() {
        return {
            active_tab: 'Details'
        }
    }
}
</script>


