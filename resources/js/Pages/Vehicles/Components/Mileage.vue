<template>
    <div class="relative mb-[20px] overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-800 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-1 py-3">
                    Current
                </th>
                <th scope="col" class="px-1 py-3">
                    Mileage at
                </th>
                <th scope="col" class="px-1 py-3">
                    Date
                </th>
                <th v-if="custom != 'undefined' && custom.disable_edit == false" scope="col" class="px-1 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <Link :href="route('booking.ViewBooking',[1])" as="tr" class="bg-white small-text py-[10px] border-b"
                  v-for="item in 10">
                <td class="px-1">
                    <p class="py-2">
                        300,000
                    </p>
                </td>
                <td class="px-1">
                    <p class="py-2">
                        Trip Start
                    </p>
                </td>
                <td class="px-1">
                    <p class="py-2">
                        5/12/2023
                    </p>
                </td>
                <td v-if="custom != 'undefined' && custom.disable_edit == false" class="px-1 w-[40px]">
                    <div class="flex gap-2">
                        <button class="px-[3px] button-fill-blue">Edit</button>
                        <button class="px-[3px] button-fill-blue">delete</button>
                    </div>
                </td>
            </Link>
            </tbody>
        </table>
    </div>
</template>
<script>
import {app_defaults} from "@/appDefaults/config.js";

export default {
    name: 'Mileage',
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    props: ['type','custom']
}
</script>

<style lang="scss" scoped >
table {
    tbody{
        tr:hover{
            cursor: pointer;
            background-color: #64acf3 !important;
            color: white !important;
            p{
                color: white;
            }
        }
    }
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
</style>
