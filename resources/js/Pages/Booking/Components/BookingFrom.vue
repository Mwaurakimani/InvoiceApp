<template>
    <section class="px-[10px] md:flex flex-wrap justify-between gap-1">
        <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
            <h5>Client Details</h5>
            <div class="input-group-default">
                <label>Client Name</label>
                <input type="text" v-model="bookingFrom.clientName">
                <span class="text-red-500" >{{ $page.props.errors.clientName }}</span>
            </div>
            <div class="input-group-default">
                <label>Client Phone Number</label>
                <input type="tel" v-model="bookingFrom.clientNumber">
                <span class="text-red-500" >{{ $page.props.errors.clientNumber }}</span>
            </div>
            <div class="input-group-default">
                <label>Client Email</label>
                <input type="tel" v-model="bookingFrom.clientEmail">
                <span class="text-red-500" >{{ $page.props.errors.clientEmail }}</span>
            </div>
        </form>
        <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
            <h5>Trip Details</h5>
            <div class="input-group-default">
                <label>Pick Up Location</label>
                <textarea class="h-[100px]" v-model="bookingFrom.pickUpLocation"></textarea>
                <span class="text-red-500" >{{ $page.props.errors.pickUpLocation }}</span>
            </div>
            <div class="input-group-default">
                <label>Pick Up Time</label>
                <input type="datetime-local" v-model="bookingFrom.pickUpTime">
                <span class="text-red-500" >{{ $page.props.errors.pickUpTime }}</span>
            </div>
            <div class="input-group-default">
                <label>Destination</label>
                <textarea class="h-[100px]" v-model="bookingFrom.destination"></textarea>
                <span class="text-red-500" >{{ $page.props.errors.destination }}</span>
            </div>

            <div class="input-group-default">
                <label>Return Time</label>
                <input type="datetime-local" v-model="bookingFrom.returnTime">
                <span class="text-red-500" >{{ $page.props.errors.returnTime }}</span>
            </div>
        </form>
        <form @submit.prevent class="p-[10px] mb-[20px] app-card md:w-[48%] ">
            <h5>Vehicle Details</h5>
            <div class="input-group-default">
                <label>Vehicle Registration</label>
                <input type="text" v-model="bookingFrom.vehicle" @keyup.prevent.stop="getVehicle">
                <div class="w-[100%]">
                    <ul v-if="foundVehicles.length > 0 " class="bg-gray-100">
                        <li @click.prevent.stop="bindVehicle(item)"
                            v-for="item in foundVehicles">{{ item.Registration_number }}
                        </li>
                    </ul>
                </div>
                <span class="text-red-500" >{{ $page.props.errors.vehicle }}</span>
            </div>
            <div class="input-group-default">
                <label>Fuel Covered by</label>
                <select v-model="bookingFrom.fuelCoveredBy">
                    <option value="Company">Company</option>
                    <option value="Driver">Driver</option>
                    <option value="Client">Client</option>
                </select>
                <span class="text-red-500" >{{ $page.props.errors.fuelCoveredBy }}</span>
            </div>
            <div class="input-group-default">
                <label>Price</label>
                <input type="number" v-model="bookingFrom.price">
                <span class="text-red-500" >{{ $page.props.errors.price }}</span>
            </div>
        </form>
        <form @submit.prevent class="p-[10px] mb-[20px] app-card md:w-[48%] ">
            <h5>Booking Details</h5>
            <div class="input-group-default">
                <label>Notes</label>
                <textarea class="h-[100px]" v-model="bookingFrom.notes"></textarea>
                <span class="text-red-500" >{{ $page.props.errors.notes }}</span>
            </div>
        </form>
    </section>
</template>
<script>
import _ from "lodash";
import {useForm} from "@inertiajs/vue3";

export default {
    name: 'BookingFrom',
    props:['bookingFrom'],
    data() {
        return {
            foundVehicles: [],
            boundVehicle:null
        }
    },
    methods: {
        getVehicle: _.throttle(function () {
            axios.post(route('drivers.get_vehicle'), {
                reg_no: this.bookingFrom.vehicle
            }).then((response) => {
                this.foundVehicles = response.data
            }).catch((error) => {
                console.log("error: " + error)
            })

        }, 500),
        clearVehicle: _.throttle(function (response) {
            this.foundVehicles = []
        }, 2000),
        bindVehicle(item) {
            this.bookingFrom.vehicle = item.Registration_number
            this.clearVehicle()
        },
    }
}
</script>
