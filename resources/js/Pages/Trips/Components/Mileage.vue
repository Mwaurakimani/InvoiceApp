<template>
    <div class="relative mb-[20px] overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-800 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-1 py-3">
                    Current
                </th>
                <th scope="col" class="px-1 py-3">
                    Previous
                </th>
                <th scope="col" class="px-1 py-3">
                    Mileage at
                </th>
                <th scope="col" class=" hidden md:table-cell px-1 py-3">
                    Date
                </th>
                <th scope="col" class="px-1 py-3">
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white small-text py-[10px] border-b" v-for="(item,index) in mileage">
                <td class="px-1">
                    <p class="py-2">
                        {{ item.reading }}
                    </p>
                </td>
                <td class="px-1">
                    <p class="py-2">
                        {{ mileage[index-1] ? mileage[index-1].reading : 'N/A' }}
                    </p>
                </td>
                <td class=" hidden md:table-cell px-1">
                    <p class="py-2">
                        Trip {{ item.mileage_at }}
                    </p>
                </td>
                <td class="px-1">
                    <p class="py-2">
                        {{ new Date(item.created_at).toLocaleDateString(undefined, app_defaults.timeOption)  }}
                    </p>
                </td>
                <td class="px-1 w-[40px]">
                    <div class="flex gap-2">
                        <button @click.prevent.stop="editMileageEntry(item)"  class="px-[3px] button-fill-blue">Edit</button>
                        <button @click.prevent.stop="deleteMileageEntry(item.id)"  class="px-[3px] hover:bg-red-600 border-none active:border-red-400 bg-red-400 text-white">delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import {app_defaults} from "@/appDefaults/config.js";
import {router} from "@inertiajs/vue3";

export default {
    name: 'Mileage',
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    props: ['type','mileage'],
    methods:{
        viewMileageEntry(id){
            console.log("hi")
        },
        editMileageEntry(item){
            this.$emit('editMileageEntry', {
                data:item
            })
        },
        deleteMileageEntry(id){
            router.delete(route('trips.deleteMileage',[id]))
        }
    },
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
