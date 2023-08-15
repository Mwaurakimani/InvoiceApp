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
            </tr>
            </thead>
            <tbody>
            <Link :href="route('booking.ViewBooking',[1])" as="tr" class="bg-white small-text py-[10px] border-b"
                  v-for="item in mileages">
                <td class="px-1">
                    <p class="py-2">
                        {{ item.reading }}
                    </p>
                </td>
                <td class="px-1">
                    <p class="py-2">
                        {{item.mileage_at}}
                    </p>
                </td>
                <td class="px-1">
                    <p class="py-2">
                        {{ item.created_at }}
                    </p>
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
    props: ['type','custom','mileages']
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
