<template>
    <div class="relative mb-[20px] pt-[20px] overflow-x-auto">
        <form @submit.prevent class="mb-[20px] p-[10px] md:w-[100%] lg:w-[48%]">
            <h5>Update Mileage</h5>
            <div class="input-group-default">
                <label>Current Reading (km)</label>
                <input type="number" v-model="mileage.current_reading">
            </div>
            <div class="input-group-default">
                <label>Mileage At</label>
                <select v-model="mileage.mileage_at">
                    <option value="Start" >Trip Start</option>
                    <option value="Pause" >Trip Paused</option>
                    <option value="Resume" >Trip Resumed</option>
                    <option value="End" >Trip End</option>
                </select>
            </div>
            <div v-if="mileage.date_created" class="input-group-default">
                <label>Current Time</label>
                <input type="datetime-local" v-model="mileage.date_created">
            </div>
            <div class="pt-[20px]">
                <button v-if="mileage.id != null" class="px-[10px]" @click.prevent.stop="updateEntry" >Update</button>
                <button v-else  class="px-[10px]" @click.prevent.stop="saveEntry" >Save</button>
            </div>
        </form>
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
    props: ['type','mileage'],
    methods:{
        saveEntry(){
            this.$emit('saveEntry')
        },
        updateEntry(){
            this.$emit('updateEntry')
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
