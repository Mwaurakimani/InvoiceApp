<template>
    <section class="px-[10px] md:flex flex-wrap justify-between gap-1">
        <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
            <div class="w-[100%]" >
                <img class="w-[100%] h-[auto] mb-[10px]" :src="app_defaults.systemImages+'Van.jpg'">
                <div class="input-group-default">
                    <label>Update Image</label>
                    <input type="file">
                    <span class="text-red-500"></span>
                </div>
            </div>
        </form>
        <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
            <h5>Model</h5>
            <div class="input-group-default">
                <label>Name</label>
                <input type="text"  v-model="vehicleForm.Name">
                <span class="text-red-500">{{ $page.props.errors.Name }}</span>
            </div>
            <div class="input-group-default">
                <label>Registration Number</label>
                <input type="text" v-model="vehicleForm.Registration_number">
                <span class="text-red-500">{{ $page.props.errors.Registration_number }}</span>
            </div>
            <div class="input-group-default">
                <label>Make Year</label>
                <input type="number" v-model="vehicleForm.make">
                <span class="text-red-500">{{ $page.props.errors.make }}</span>
            </div>
        </form>
        <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
            <h5>Attributes</h5>
            <div class="input-group-default">
                <label>Engine Size (cc)</label>
                <input type="number" v-model="vehicleForm.engine_size">
                <span class="text-red-500">{{ $page.props.errors.engine_size }}</span>
            </div>
            <div class="input-group-default">
                <label>Transmission Type</label>
                <select v-model="vehicleForm.transmission">
                    <option value="Automatic" >Automatic</option>
                    <option value="Manual" >Manual</option>
                </select>
                <span class="text-red-500">{{ $page.props.errors.transmission }}</span>
            </div>
            <div class="input-group-default">
                <label>Fuel Capacity</label>
                <input type="number" v-model="vehicleForm.fuel_capacity">
                <span class="text-red-500">{{ $page.props.errors.fuel_capacity }}</span>
            </div>
            <div class="input-group-default">
                <label>Odometer Reading</label>
                <input type="number" v-model="vehicleForm.odometer_reading">
                <span class="text-red-500">{{ $page.props.errors.odometer_reading }}</span>
            </div>
        </form>
        <form @submit.prevent class="p-[10px] mb-[20px] app-card md:w-[48%] ">
            <h5>Features</h5>
            <div class="input-group-default">
                <label>Seats</label>
                <input type="number" v-model="vehicleForm.seats">
                <span class="text-red-500">{{ $page.props.errors.seats }}</span>
            </div>

        </form>
        <form @submit.prevent class="p-[10px] mb-[20px] app-card md:w-[48%] ">
            <h5>Vehicle Management</h5>
            <div class="input-group-default">
                <label>Status</label>
                <select v-model="vehicleForm.status">
                    <option value="Active" >Active</option>
                    <option value="Inactive" >Suspended</option>
                </select>
                <span class="text-red-500">{{ $page.props.errors.status }}</span>
            </div>
            <div class="input-group-default">
                <label>Notes</label>
                <textarea class="h-[100px]" placeholder="Notes" v-model="vehicleForm.Notes"></textarea>
                <span class="text-red-500">{{ $page.props.errors.Notes }}</span>
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
    },
    props:['vehicleForm']
}
</script>
