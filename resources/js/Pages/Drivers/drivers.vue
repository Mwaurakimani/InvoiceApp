<template>
    <section class="block lg:hidden">
        <h1 class="p-[20px]">Drivers</h1>
        <div class="flex h-[50px] mb-[20px] p-[20px] items-center justify-center">
            <input class="w-[100%]" type="search" placeholder="Search by Name...">
        </div>
        <div class="px-[10px] flex">
        </div>
        <TripsListView v-slot="data" :dataset="drivers" class="p-[10px] mb-[20px]">
            <DriverCard :driver="data.item">
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
        </TripsListView>


        <div class="flex mb-[30px] w-[100%] justify-center">
            <!-- Previous Button -->
            <a href="#" class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                Previous
            </a>
            <a href="#" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </section>

    <section class="hidden lg:block p-[10px]">
        <div class="heading">
            <h1>Drivers</h1>
        </div>
        <div class="flex justify-between py-[10px]">
            <ul>
            </ul>
            <div>
                <input type="search" class="w-[300px]" placeholder="Search by Registration Number">
            </div>
        </div>
        <div>
            <p class="lighter-text mb-[20px] small-text">Total drivers found (100)</p>
        </div>

        <div class="relative app-card mb-[20px] overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-800 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Driver
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Vehicle
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Status
                    </th>
                </tr>
                </thead>
                <tbody>
                <Link :href="route('drivers.ViewDriver',[item.id])" as="tr" class="bg-white border-b" v-for="item in drivers">
                    <td class="px-6 py-3 small-text font-extrabold">
                        <img class="w-[50px]" :src="app_defaults.systemImages+'User.png'" style="border-radius: 5px">
                    </td>
                    <th scope="row" class="px-6 small-text font-medium py-[10px] text-gray-900 whitespace-nowrap">
                        {{ item.first_name }} {{item.last_name}}
                    </th>
                    <td class="px-10 my-10px">
                        {{item.phone}}
                    </td>
                    <td class="px-5 small-text">
                        {{ item.vehicle.length > 0 ? item.vehicle[0].Registration_number : 'N/A' }}
                    </td>
                    <td class="px-5">
                        <div class="pill small-text">
                            <p>Active</p>
                        </div>
                    </td>
                </Link>
                </tbody>
            </table>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-sm">
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700  ">Previous</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800  :text-white">1</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800  :text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 ">3</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 -gray-700 ">4</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 -gray-700 ">5</a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700  -gray-700">Next</a>
                </li>
            </ul>
        </nav>


    </section>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import TripCard from "@/appComponents/TripCard.vue";
import TripsListView from "@/appComponents/TripsListView.vue";
import VehicleCard from "@/appComponents/VehicleCard.vue";
import {app_defaults} from "@/appDefaults/config.js";
import DriverCard from "@/appComponents/DriverCard.vue";

export default {
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    components: {DriverCard, VehicleCard, TripsListView, TripCard},
    layout:DashboardLayout,
    props:['drivers']
}
</script>


<style scoped lang="scss">
@import "../../../scss/defaults";

.heading {
    width: 100%;
    height: 40px;
}

td{
    li{
        display: flex;
        label{
            width: 90px;
            color: dodgerblue;
        }
    }
}

table {
    tbody{
        tr:hover{
            cursor: pointer;
            background-color: #64acf3 !important;
            color: white !important;
            ul{
                label{
                    color: white;
                }
                p{
                    color: white;
                }
            }
            th{
                color: white;
            }
        }
    }
}
</style>
