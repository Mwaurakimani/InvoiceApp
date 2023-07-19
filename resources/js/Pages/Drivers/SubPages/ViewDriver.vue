<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Driver : {{ 'XXXXXXXXXXX' }}</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('vehicle.CreateVehicle')" class="px-[10px] button-fill-blue">Add New
                </Link>
                <Link as="button" :href="route('vehicle.EditVehicle',[1])" class="px-[10px] button-fill-blue">Edit
                </Link>
                <Link as="button" href="'/'" class="px-[10px] border-red-400 text-gray-50 bg-red-400">Delete</Link>
            </ul>
        </div>
        <section class="flex flex-wrap md:gap-[20px]">
            <article class="w-[100%] flex flex-wrap xl:w-[68%] ">
                <AppCardHolder :title="'About'" class="w-[100%] mb-[20px]">
                    <div class="flex flex-wrap gap-3">
                        <form @submit.prevent class="p-[10px] w-[100%] md:w-[200px]">
                            <div class="w-[100%]">
                                <img class="w-[100%] h-[auto] mb-[10px]" :src="app_defaults.systemImages+'User.png'">
                                <div class="input-group-default">
                                    <label>Update Image</label>
                                    <input type="file">
                                </div>
                            </div>
                        </form>
                        <form @submit.prevent class="mb-[20px] w-[100%] md:w-[420px] lg:w-[48%]">
                            <div class="md:flex md:gap-1">
                                <div class="input-group-default">
                                    <label>First Name</label>
                                    <input type="text">
                                </div>
                                <div class="input-group-default">
                                    <label>Last Name</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="md:flex gap-1">
                                <div class="input-group-default">
                                    <label>National ID</label>
                                    <input type="text">
                                </div>
                                <div class="input-group-default">
                                    <label>Phone</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="input-group-default">
                                <label>Email</label>
                                <input type="email">
                            </div>

                        </form>
                    </div>
                </AppCardHolder>
                <AppCardHolder :title="'Vehicle'" class="w-[100%] mb-[20px] md:m-[0px] ">
                    <div class="flex flex-wrap">
                        <div class="md:w-[49%]">
                            <form @submit.prevent class="p-[10px] w-[100%] md:w-[290px]">
                                <div class="w-[100%]">
                                    <div class="input-group-default">
                                        <label>Vehicle Registration</label>
                                        <input type="text">
                                        <!--                                        <div class="w-[100%]" >-->
                                        <!--                                            <ul class="bg-gray-100" >-->
                                        <!--                                                <li>KAG 000Y</li>-->
                                        <!--                                                <li>KAG 000Y</li>-->
                                        <!--                                                <li>KAG 000Y</li>-->
                                        <!--                                                <li>KAG 000Y</li>-->
                                        <!--                                                <li>KAG 000Y</li>-->
                                        <!--                                                <li>KAG 000Y</li>-->
                                        <!--                                            </ul>-->
                                        <!--                                        </div>-->
                                    </div>
                                </div>
                                <button class="px-[10px] button-fill-blue">Assign</button>
                            </form>
                        </div>
                        <div class="md:w-[49%]">
                            <VehicleCard></VehicleCard>
                        </div>
                    </div>
                </AppCardHolder>
                <!--                <AppCardHolder :title="'Review'" class="w-[100%] " >-->

                <!--                </AppCardHolder>-->
            </article>
            <article class="w-[100%] xl:w-[28%]">
                <AppCardHolder :title="'Stats'" class="w-[100%] mb-[20px] ">
                    <ul class="w-[100%]">
                        <li class="flex small-text my-[5px] w-[100%]">
                            <label class=" w-[120px] font-semibold text-gray-500">Total Trips:</label>
                            <p>23</p>
                        </li>
                        <li class="flex small-text my-[5px] w-[100%]">
                            <label class=" w-[120px] font-semibold text-gray-500">Rating:</label>
                            <p>5</p>
                        </li>
                        <li class="flex small-text my-[5px] w-[100%]">
                            <label class=" w-[120px] font-semibold text-gray-500">Last Trip Date:</label>
                            <p>5/3/2023</p>
                        </li>
                    </ul>
                </AppCardHolder>
                <!--                <AppCardHolder :title="'Manage'" class="w-[100%]" >-->

                <!--                </AppCardHolder>-->
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
import DetailsComponent from "@/Pages/Booking/Components/DetailsComponent.vue";
import Trips from "@/Pages/Vehicles/Components/Trips.vue";
import Mileage from "@/Pages/Vehicles/Components/Mileage.vue";

export default {
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    components: {Mileage, Trips, DetailsComponent, DriverCard, VehicleCard, AppCardHolder},
    layout: DashboardLayout,
    data() {
        return {
            active_tab: 'Details'
        }
    }
}
</script>

<style lang="scss" scoped>
ul {
    li {
        padding-left: 5px;
        cursor: pointer;

        &:hover {
            background-color: dodgerblue;
            color: white;
        }
    }
}

@media (min-width: 1366px) {

}
</style>


