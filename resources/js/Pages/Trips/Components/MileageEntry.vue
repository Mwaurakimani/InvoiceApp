<template>
    <div class="relative mb-[20px] pt-[20px] overflow-x-auto">
        <form @submit.prevent class="mb-[20px] p-[10px] md:w-[100%] lg:w-[48%]">
            <h5>Update Mileage</h5>
            <div class="input-group-default">
                <label>Previous Reading (km)</label>
                <input type="number">
            </div>
            <div class="input-group-default">
                <label>Current Reading (km)</label>
                <input type="number">
            </div>
            <div class="input-group-default">
                <label>Mileage At</label>
                <select>
                    <option>Trip Start</option>
                    <option>Trip Paused</option>
                    <option>Trip Resumed</option>
                    <option>Trip End</option>
                </select>
            </div>
            <div class="input-group-default">
                <label>Client Name</label>
                <input type="datetime-local">
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
    props: ['type']
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
