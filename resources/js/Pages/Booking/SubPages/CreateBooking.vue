<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Booking</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('booking.ListBookings')" class="px-[10px] button-fill-blue">Bookings
                </Link>
                <Link as="button" :href="route('booking.CreateBooking')" class="px-[10px] button-fill-blue">Add New
                </Link>
                <button v-if="booking == null" @click.prevent.stop="postBooking" class="px-[10px] button-fill-blue ">
                    Save Booking
                </button>
                <button v-else @click.prevent.stop="putBooking" class="px-[10px] button-fill-blue ">Update Booking
                </button>
            </ul>
        </div>
    </section>
    <BookingFrom :bookingFrom="bookingFrom"/>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {app_defaults} from "@/appDefaults/config.js";
import BookingFrom from "@/Pages/Booking/Components/BookingFrom.vue";
import {router, useForm} from "@inertiajs/vue3";

export default {
    props: ['booking'],
    methods: {
        postBooking() {
            this.bookingFrom.post(route('booking.PostBooking'))
        },
        putBooking() {
            this.bookingFrom.post(route('booking.PutBooking', [this.booking.id]))
        },
        dateFormat(data) {
            const parsedDateTime = new Date(data);

            function padNumberWithZeros(num, length) {
                return num.toString().padStart(length, '0');
            }

            return `${parsedDateTime.getFullYear()}-${padNumberWithZeros(parsedDateTime.getMonth() + 1, 2)}-${padNumberWithZeros(parsedDateTime.getDate(), 2)}T${padNumberWithZeros(parsedDateTime.getHours(), 2)}:${padNumberWithZeros(parsedDateTime.getMinutes(), 2)}`;

        }
    },
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    components: {BookingFrom},
    layout: DashboardLayout,
    data() {
        return {
            active_tab: 'Details',
            bookingFrom: useForm({
                clientName: this.booking != null ? this.booking.clientName : "sdcscd",
                clientNumber: this.booking != null ? this.booking.clientNumber : "08989898989",
                clientEmail: this.booking != null ? this.booking.clientEmail : "client@email.com",
                pickUpLocation: this.booking != null ? this.booking.pickUpLocation : "Kiambu Road",
                pickUpTime: this.booking != null ? this.dateFormat(this.booking.pickUpTime) : null,
                destination: this.booking != null ? this.booking.destination : "destination",
                returnTime: this.booking != null ? this.dateFormat(this.booking.returnTime) : null,
                vehicle: this.booking != null ? this.booking.vehicle.id != null ? this.booking.vehicle.Registration_number : null : null,
                fuelCoveredBy: this.booking != null ? this.booking.fuelCoveredBy : null,
                price: this.booking != null ? this.booking.price : null,
                notes: this.booking != null ? this.booking.notes : null,
            }),
        }
    },
    mounted() {
        console.log(this.bookingFrom.pickUpTime)
    }
}
</script>


