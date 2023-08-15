<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Add Booking</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('vehicle.ListVehicles')" class="px-[10px] button-fill-blue" >Vehicles</Link>
                <Link as="button" href="'/'" class="px-[10px] button-fill-blue"  @click.prevent.stop="saveVehicle" >Save</Link>
            </ul>
        </div>
    </section>
    <VehicleFrom :vehicleForm="vehicleForm" />
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {app_defaults} from "@/appDefaults/config.js";
import VehicleFrom from "@/Pages/Vehicles/Components/VehicleFrom.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    methods: {
        saveVehicle(){
            this.vehicleForm.post(route('vehicle.postVehicle'))
        }
    },
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    components: {VehicleFrom},
    layout:DashboardLayout,
    data(){
        return{
            active_tab:'Details',
            vehicleForm:useForm({
                Name:"Nisan Sunny",
                Registration_number:"KAG 333Y",
                make:"2014",
                engine_size:"2200",
                transmission:"Automatic",
                fuel_capacity:"500",
                odometer_reading:"300000",
                seats:"14",
                status:"Active",
                Notes:"None"
            })

        }
    }
}
</script>


