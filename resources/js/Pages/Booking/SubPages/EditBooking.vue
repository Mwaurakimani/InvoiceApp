<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Edit Booking</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" href="'/'" class="px-[10px] button-fill-blue" >Add Booking</Link>
                <Link as="button" href="'/'" class="px-[10px] button-fill-blue " >Save Booking</Link>
            </ul>
        </div>
    </section>
    <BookingFrom/>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {app_defaults} from "@/appDefaults/config.js";
import BookingFrom from "@/Pages/Booking/Components/BookingFrom.vue";

export default {
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


