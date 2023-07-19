<template>
    <section class="px-[10px] md:flex flex-wrap justify-between gap-1">
        <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
            <div class="w-[100%]" >
                <img class="w-[100%] h-[auto] mb-[10px]" :src="app_defaults.systemImages+'Van.jpg'">
                <div class="input-group-default">
                    <label>Update Image</label>
                    <input type="file">
                </div>
            </div>
        </form>
        <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
            <h5>Model</h5>
            <div class="input-group-default">
                <label>Name</label>
                <input type="text">
            </div>
            <div class="input-group-default">
                <label>Registration Number</label>
                <input type="text">
            </div>
            <div class="input-group-default">
                <label>Make Year</label>
                <input type="number">
            </div>
        </form>
        <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
            <h5>Attributes</h5>
            <div class="input-group-default">
                <label>Engine Size</label>
                <input type="number">
            </div>
            <div class="input-group-default">
                <label>Transmission Type</label>
                <input type="number">
            </div>
            <div class="input-group-default">
                <label>Fuel Capacity</label>
                <input type="number">
            </div>
            <div class="input-group-default">
                <label>Odometer Reading</label>
                <input type="number">
            </div>
        </form>
        <form @submit.prevent class="p-[10px] mb-[20px] app-card md:w-[48%] ">
            <h5>Features</h5>
            <div class="input-group-default">
                <label>Seats</label>
                <input type="number">
            </div>

        </form>
        <form @submit.prevent class="p-[10px] mb-[20px] app-card md:w-[48%] ">
            <h5>Vehicle Management</h5>
            <div class="input-group-default">
                <label>Status</label>
                <select>
                    <option>Active</option>
                    <option>Suspended</option>
                </select>
            </div>
            <div class="input-group-default">
                <label>Seats</label>
                <textarea class="h-[100px]" placeholder="Notes"></textarea>
            </div>
        </form>
    </section>
</template>
<script>
import {app_defaults} from "@/appDefaults/config.js";

export default {
    name: 'BookingFrom',
    computed: {
        app_defaults() {
            return app_defaults
        }
    }
}
</script>
