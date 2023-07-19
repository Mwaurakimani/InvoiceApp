<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Add Booking</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('vehicle.ListVehicles')" class="px-[10px] button-fill-blue" >Vehicles</Link>
                <Link as="button" href="'/'" class="px-[10px] button-fill-blue " >Save</Link>
            </ul>
        </div>
    </section>
    <VehicleFrom/>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {app_defaults} from "@/appDefaults/config.js";
import VehicleFrom from "@/Pages/Vehicles/Components/VehicleFrom.vue";
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
    components: {VehicleFrom},
    layout:DashboardLayout,
    data(){
        return{
            active_tab:'Details'
        }
    }
}
</script>


