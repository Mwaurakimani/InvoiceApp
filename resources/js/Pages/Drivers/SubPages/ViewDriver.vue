<template>
    <section class="p-[10px]">
        <div class="heading my-[10px] md:my-[0px]">
            <h1>Driver : {{ driver.id }}</h1>
        </div>
        <div class="flex mb-[20px] py-[10px]">
            <ul class="flex gap-3">
                <Link as="button" :href="route('accounts.EditAccount',[driver.id])" class="px-[10px] button-fill-blue">
                    Edit
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
                            </div>
                        </form>
                        <form @submit.prevent class="mb-[20px] w-[100%] md:w-[420px] lg:w-[48%]">
                            <div class="md:flex md:gap-1">
                                <div class="w-[50%] input-group-default">
                                    <label>First name</label>
                                    <p>{{ driver.first_name }}</p>
                                </div>
                                <div class="w-[50%] input-group-default">
                                    <label>Last name</label>
                                    <p>{{ driver.last_name }}</p>
                                </div>
                            </div>
                            <div class="md:flex gap-1">
                                <div class=" w-[50%] input-group-default">
                                    <label>National ID</label>
                                    <p class="">{{ driver.national_id }}</p>
                                </div>
                                <div class="w-[50%] input-group-default">
                                    <label>Phone</label>
                                    <p class="">{{ driver.phone }}</p>
                                </div>
                            </div>
                            <div class="input-group-default">
                                <label>Email</label>
                                <p class="">{{ driver.email }}</p>
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
                                        <input type="text" v-model="vehicle" @keyup.prevent.stop="getVehicle">
                                        <div class="w-[100%]">
                                            <ul v-if="foundVehicles.length > 0 " class="bg-gray-100">
                                                <li @click.prevent.stop="bindVehicle(item)"
                                                    v-for="item in foundVehicles">{{ item.Registration_number }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <button @click.prevent.stop="assignVehicle" class="px-[10px] mx-[5px] button-fill-blue">Assign</button>
                                <button v-if="boundVehicle" @click.prevent.stop="un_assignVehicle" class="px-[10px] bg-red-400 text-gray-50 border-1 border-red-400">Remove</button>
                            </form>
                        </div>
                        <div v-if="boundVehicle"  class="md:w-[49%]">
                            <VehicleCard :vehicle="boundVehicle" :title="boundVehicle.name"></VehicleCard>
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
import _ from 'lodash';

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
            active_tab: 'Details',
            vehicle: null,
            foundVehicles: [],
            boundVehicle: this.driver.vehicle.length > 0 ? this.driver.vehicle[0] : null,
        }
    },
    props: ['driver'],
    methods: {
        getVehicle: _.throttle(function () {

            axios.post(route('drivers.get_vehicle'), {
                reg_no: this.vehicle
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
            this.boundVehicle = item

            this.clearVehicle()
            this.vehicle = null
        },
        assignVehicle(){
            if(this.boundVehicle == null){
                alert("No selected Vehicle")
                return
            }

            axios.post(route('drivers.assign_vehicle'), {
                driver: this.driver.id,
                vehicle: this.boundVehicle.id
            }).then((response) => {
                alert("Assigned")
            }).catch((error) => {
                alert("Unable to assign")
            })
        },
        un_assignVehicle(){
            axios.post(route('drivers.un_assignVehicle'), {
                driver: this.driver.id,
                vehicle: this.boundVehicle.id
            }).then((response) => {
                alert("Removed")
                window.location.reload()
            }).catch((error) => {
                alert("Unable to assign")
            })
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


