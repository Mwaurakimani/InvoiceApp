<script>
import InputError from "@/Components/InputError.vue";
import {useForm} from "@inertiajs/vue3";
import payments from "@/Pages/Booking/Components/Payments.vue";

export default {
    name:"TripFee",
    components: {InputError},
    data(){
        return {
            payment:useForm({
                bookingId:null,
                amount:null,
                paidVia:null,
                referenceType:null,
                reference:null,
                description:null,
            })
        }
    },
    methods:{
        savePayment(){
            this.payment.post(route("finances.payBooking"),{
                onSuccess(){
                    console.log("done")
                }
            })
        }
    }
}
</script>

<template>
    <div >
        <div class="header-controller flex mb-[10px] gap-2 justify-end">
            <button class="px-[10px] button-fill-blue" @click.prevent.stop="savePayment">Save</button>
            <button class="border-red-400 bg-red-400 text-white px-[10px] hover:bg-red-500">Delete</button>
        </div>
        <form>
            <ul v-for="error in $page.props.errors" class="small-text mb-[10px] text-red-400">
                <li>{{ error }}</li>
            </ul>

            <div class="input-group mb-[10px]">
                <input class="container-fluid" placeholder="Booking ID" v-model="payment.bookingId">
            </div>
            <div class="input-group justify-between  flex gap-2 mb-[10px]">
                <input type="number" class="w-[48%]" placeholder="Amount" v-model="payment.amount">
                <input class="w-[48%]" placeholder="Paid Via"  v-model="payment.paidVia">
            </div>
            <div class="input-group justify-between  flex gap-2 mb-[10px]">
                <select name="" id="" v-model="payment.referenceType">
                    <option value="transactionCode">Transaction Code</option>
                    <option value="invoiceNumber">Invoice Number</option>
                </select>
                <input class="w-[48%]" placeholder="Reference" v-model="payment.reference">
            </div>
            <div class="input-group justify-between  flex gap-2 mb-[10px]">
                <textarea class="container-fluid h-[200px]" placeholder="Description" v-model="payment.description" ></textarea>
            </div>
        </form>
    </div>
</template>

<style scoped lang="scss">

input,select{
    height: 32px;
}

input, select,textarea{
    border-radius: 5px !important;
    border: 1px solid #b9b9b9;
}

</style>
