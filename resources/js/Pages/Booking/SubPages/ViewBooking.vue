<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Booking : {{ 'XXXXXXXXXXX' }}</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('booking.CreateBooking')" class="px-[10px] button-fill-blue" >Add New</Link>
                <Link as="button" :href="route('booking.EditBooking',[1])" class="px-[10px] button-fill-blue " >Edit</Link>
                <Link as="button" href="'/'" class="px-[10px] border-red-400 text-gray-50 bg-red-400" >Delete</Link>
            </ul>
        </div>

        <section class="flex flex-wrap md:gap-[20px]">
            <article class="sm:w-[100%] md:w-[300px]" >
                <DriverCard :app_defaults="app_defaults"/>
                <VehicleCard :app_defaults="app_defaults"/>
            </article>
            <article class="w-[100%] md:w-[calc(100%-320px)]" >
                <AppCardHolder :title="'Trip Details'" :pill="'Active'" class="w-[100%]" >
                    <ul class="flex gap-[20px]">
                        <button class="px-[10px]" :class="{ 'button-fill-blue':active_tab === 'Details' }" @click.prevent.stop="active_tab = 'Details' " >Details</button>
                        <button class="px-[10px]" :class="{ 'button-fill-blue':active_tab === 'Payment' }" @click.prevent.stop="active_tab = 'Payment' " >Payments</button>
                        <button class="px-[10px]" :class="{ 'button-fill-blue':active_tab === 'Invoice' }" @click.prevent.stop="active_tab = 'Invoice' " >Invoice</button>
                    </ul>
                    <div class="w-[100%]">
                        <DetailsComponent class="w-[100%]" v-if="active_tab === 'Details'"/>
                        <Payment class="w-[100%]" v-if="active_tab === 'Payment'"/>
                        <Payment class="w-[100%]" :type="'Invoice'" v-if="active_tab === 'Invoice'"/>
                    </div>
                </AppCardHolder>
            </article>
        </section>
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
    components: {Payment, DetailsComponent, DriverCard, VehicleCard, AppCardHolder},
    layout:DashboardLayout,
    data(){
        return{
            active_tab:'Details'
        }
    }
}
</script>


