<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Vehicle : {{ 'XXXXXXXXXXX' }}</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('vehicle.CreateVehicle')" class="px-[10px] button-fill-blue" >Add New</Link>
                <Link as="button" :href="route('vehicle.EditVehicle',[1])" class="px-[10px] button-fill-blue " >Edit</Link>
                <Link as="button" href="'/'" class="px-[10px] border-red-400 text-gray-50 bg-red-400" >Delete</Link>
            </ul>
        </div>

        <section class="flex flex-wrap md:gap-[20px]">
            <article class="sm:w-[100%] md:w-[300px]" >
                <VehicleCard :app_defaults="app_defaults"/>
                <DriverCard :app_defaults="app_defaults"/>
            </article>
            <article class="w-[100%] md:w-[calc(100%-320px)]" >
                <AppCardHolder :title="'Trip Details'" :pill="'Active'" class="w-[100%]" >
                    <div class="w-[100%]">
                        <mileage :custom="{disable_edit:true}"></mileage>
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
import Trips from "@/Pages/Vehicles/Components/Trips.vue";
import Mileage from "@/Pages/Vehicles/Components/Mileage.vue";
export default {
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    components: {Mileage, Trips, DetailsComponent, DriverCard, VehicleCard, AppCardHolder},
    layout:DashboardLayout,
    data(){
        return{
            active_tab:'Details'
        }
    }
}
</script>


