<template>
    <div class="details p-[10px]">
        <div class="flex mb-[10px] flex-wrap gap-10px items-start justify-between">
            <div class="from w-[150px] mb-[20px] mr-[10px]">
                <h6 class="small-text">Pick up</h6>
                <ul>
                    <li class="small-text" style="overflow-wrap: normal">{{ booking.pickUpLocation }}</li>
                    <li class="small-text">
                        {{ new Date(booking.pickUpTime).toLocaleDateString(undefined, app_defaults.dateOption) }}
                    </li>
                    <li class="small-text">
                        {{ new Date(booking.pickUpTime).toLocaleTimeString(undefined, app_defaults.timeOption) }}
                    </li>
                </ul>
            </div>
            <div class="to w-[150px]">
                <h6 class="small-text">Destination</h6>
                <ul>
                    <li class="small-text" style="overflow-wrap: normal">{{ booking.destination }}</li>
                </ul>
            </div>
            <div v-if="booking.returnTime" class="to w-[150px]">
                <h6 class="small-text">Return Time</h6>
                <ul>
                    <li class="small-text" style="overflow-wrap: normal">
                        {{ new Date(booking.returnTime).toLocaleTimeString(undefined, app_defaults.timeOption) }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="details md:w-[50%] w-[100%]">
                <ul class="small-text">
                    <li class="flex">
                        <label class="w-[100px]">ID</label>
                        <p>{{ booking.id }}</p>
                    </li>
                    <li class="flex">
                        <label class="w-[100px]">Amount</label>
                        <p>Ksh {{ app_defaults.currencyFormat.format(booking.price) }}</p>
                    </li>
                    <li class="flex">
                        <label class="w-[100px]">Fueled By</label>
                        <p>{{ booking.fuelCoveredBy }}</p>
                    </li>
<!--                              <li class="flex">-->
                    <!--                                <label class="w-[100px]">Duration</label>-->
                    <!--                                <p>9 hrs</p>-->
                    <!--                              </li>-->
                </ul>
            </div>
            <div class="notes small-text md:w-[50%]  w-[100%]">
                <h5>Notes</h5>
                <p class="p-[10px]">{{ booking.notes }}</p>
            </div>
        </div>
    </div>
</template>
<script>
import {app_defaults} from "../../../appDefaults/config.js";

export default {
    name: 'DetailsComponent',
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    props: ['booking']
}
</script>
