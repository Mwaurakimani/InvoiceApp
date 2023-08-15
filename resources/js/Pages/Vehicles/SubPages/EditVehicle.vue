<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Edit Vehicle</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('vehicle.ViewVehicle',[vehicle.id])" class="px-[10px] button-fill-blue " >View</Link>
                <button @click.prevent.stop="saveVehicle" class="px-[10px] button-fill-blue " >Save</button>
            </ul>
        </div>
    </section>
    <VehicleFrom :vehicleForm="vehicleForm"></VehicleFrom>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {app_defaults} from "@/appDefaults/config.js";
import VehicleFrom from "@/Pages/Vehicles/Components/VehicleFrom.vue";
import {useForm} from "@inertiajs/vue3";
import vehicle from "../vehicle.vue";


export default {
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    methods:{
        saveVehicle(){
            this.vehicleForm.put(route('vehicle.putVehicle',[this.vehicle.id]))
        }
    },
    components: {VehicleFrom},
    layout:DashboardLayout,
    data(){
        return{
            active_tab:'Details',
            vehicleForm:useForm({
                Name:this.vehicle.Name ??null,
                Registration_number:this.vehicle.Registration_number ??null,
                make:this.vehicle.make ??null,
                engine_size:this.vehicle.engine_size ??null,
                transmission:this.vehicle.transmission ??null,
                fuel_capacity:this.vehicle.fuel_capacity ??null,
                odometer_reading:this.vehicle.odometer_reading ??null,
                seats:this.vehicle.seats ??null,
                status:this.vehicle.status ??null,
                Notes:this.vehicle.Notes ??null
            })
        }
    },
    props:['vehicle']
}
</script>


