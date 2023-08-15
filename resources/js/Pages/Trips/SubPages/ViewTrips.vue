<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Trip : {{ trips.id }}</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" method="delete" :href="route('trips.deleteTrip',[trips.id])" class="px-[10px] border-red-400 text-gray-50 bg-red-400">Delete</Link>
            </ul>
        </div>

        <section class="flex flex-wrap md:gap-[20px]">
            <article class="sm:w-[100%] md:w-[300px]">
                <ClientCard :app_defaults="app_defaults" :booking="trips.booking" >
                </ClientCard>
                <DriverCard :driver="trips.driver"  :app_defaults="app_defaults">
                    <ul class="">
                        <li class="flex small-text my-[5px]">
                            <label class=" w-[120px] font-semibold text-gray-500">Total Trips:</label>
                            <p>23</p>
                        </li>
                        <li class="flex small-text my-[5px]">
                            <label class=" w-[120px] font-semibold text-gray-500">Rating:</label>
                            <p>5</p>
                        </li>
                        <li class="flex small-text my-[5px]">
                            <label class=" w-[120px] font-semibold text-gray-500">Last Trip Date:</label>
                            <p>5/3/2023</p>
                        </li>
                    </ul>
                </DriverCard>
                <VehicleCard :vehicle="trips.vehicle" :app_defaults="app_defaults"/>
            </article>
            <article class="w-[100%] md:w-[calc(100%-320px)]">
                <AppCardHolder :title="'Trip Details'" :pill="'Active'" class="w-[100%]">
                    <ul class="flex gap-[5px]">
                        <button class="px-[5px]" :class="{ 'button-fill-blue':active_tab === 'Details' }"
                                @click.prevent.stop="active_tab = 'Details' ">Details
                        </button>
                        <button class="px-[5px]" :class="{ 'button-fill-blue':active_tab === 'Mileage' }"
                                @click.prevent.stop="active_tab = 'Mileage' ">Mileage
                        </button>
                        <button class="px-[5px]" :class="{ 'button-fill-blue':active_tab === 'MileageEntry' }"
                                @click.prevent.stop="active_tab = 'MileageEntry' ">Update Mileage</button>
                    </ul>
                    <div class="w-[100%]">
                        <DetailsComponent class="w-[100%]" :booking="trips.booking" v-if="active_tab === 'Details'"/>
                        <Mileage v-on:editMileageEntry="editMileageEntry" class="w-[100%]" v-if="active_tab === 'Mileage' && trips && trips.mileage" :mileage="trips.mileage" />
                        <MileageEntry v-on:saveEntry="saveEntry" v-on:updateEntry="updateEntry" :mileage="mileage" class="w-[100%]" v-if="active_tab === 'MileageEntry'"/>
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
import Mileage from "@/Pages/Trips/Components/Mileage.vue";
import ClientCard from "@/appComponents/ClientCard.vue";
import MileageEntry from "@/Pages/Trips/Components/MileageEntry.vue";
import DetailsComponent from "@/Pages/Booking/Components/DetailsComponent.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    props:['trips'],
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    components: {
        ClientCard,
        Mileage,
        DetailsComponent,
        DriverCard,
        VehicleCard,
        AppCardHolder,
        MileageEntry
    },
    layout: DashboardLayout,
    data() {
        return {
            mileage:useForm({
                id:null,
                current_reading:null,
                mileage_at:null,
                date_created: null
            }),
            active_tab: 'Mileage'
        }
    },
    methods:{
        saveEntry(){
            this.mileage.post(route('trips.postMileage',[this.trips.id]), {
                onSuccess: () => {
                    this.active_tab = 'Mileage'
                }
            })
        },
        updateEntry(){
            console.log("here")
            this.mileage.put(route('trips.putMileage',[this.mileage.id]), {
                onSuccess: () => {
                    this.active_tab = 'Mileage'
                }
            })
        },
        editMileageEntry(data){
            this.mileage.id = data.data.id
            this.mileage.current_reading = data.data.reading
            this.mileage.mileage_at = data.data.mileage_at
            this.mileage.date_created = this.dateFormat(data.data.created_at)
            this.active_tab = 'MileageEntry'
        },
        dateFormat(data) {
            const parsedDateTime = new Date(data);

            function padNumberWithZeros(num, length) {
                return num.toString().padStart(length, '0');
            }

            return `${parsedDateTime.getFullYear()}-${padNumberWithZeros(parsedDateTime.getMonth() + 1, 2)}-${padNumberWithZeros(parsedDateTime.getDate(), 2)}T${padNumberWithZeros(parsedDateTime.getHours(), 2)}:${padNumberWithZeros(parsedDateTime.getMinutes(), 2)}`;

        }
    },
    mounted() {
        this.active_tab = 'Mileage'
    }
}
</script>


