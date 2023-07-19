<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Booking : {{ 'XXXXXXXXXXX' }}</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" href="'/'" class="px-[10px] button-fill-blue ">Edit</Link>
                <Link as="button" href="'/'" class="px-[10px] border-red-400 text-gray-50 bg-red-400">Delete</Link>
            </ul>
        </div>

        <section class="flex flex-wrap md:gap-[20px]">
            <article class="sm:w-[100%] md:w-[300px]">
                <ClientCard :app_defaults="app_defaults">
                </ClientCard>
                <DriverCard :app_defaults="app_defaults">
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
                <VehicleCard :app_defaults="app_defaults"/>
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
                        <DetailsComponent class="w-[100%]" v-if="active_tab === 'Details'"/>
                        <Mileage class="w-[100%]" v-if="active_tab === 'Mileage'"/>
                        <MileageEntry class="w-[100%]" v-if="active_tab === 'MileageEntry'"/>
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
import DetailsComponent from "@/Pages/Trips/Components/DetailsComponent.vue";
import ClientCard from "@/appComponents/ClientCard.vue";
import MileageEntry from "@/Pages/Trips/Components/MileageEntry.vue";

export default {
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
            active_tab: 'Details'
        }
    }
}
</script>


