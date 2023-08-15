<template>
    <section>
        <h1 class="p-[20px]">Finance</h1>
        <div class="container md:grid gap-6 md:grid-cols-2 mb-[20px] lg:grid-cols-4">
            <div v-for="header_dum in header_data" :key="header_dum.title" class="app-card mb-[10px] p-[10px] bg-white">
                <h6 class="small-text">{{ header_dum.title }}</h6>
                <div class="w-[100%] flex items-end h-[50px]">
                    <p>Ksh {{ header_dum.amount }}</p>
                </div>
            </div>
        </div>
        <section>
<!--            <div class="heading_section flex justify-between  p-[10px] flex-col md:flex-row">-->
<!--                <h6 class="mb-[10px]">Details</h6>-->
<!--                <div class="flex items-center gap-1">-->
<!--                    <input type="search">-->
<!--                    <button class="button-fill-blue px-[5px]">Search</button>-->
<!--                </div>-->
<!--            </div>-->
            <article class="flex gap-6 justify-center items-start flex-col p-[10px] lg:flex-row ">
                <div class="app-card bg-white w-[100%]">
                    <div class="p-[10px]">
                        <ul @click.prevent.stop="changeTab" id="entry-navigation" class="flex  gap-1">
                            <li class="active">Trip Fee</li>
                            <li>Fuel & Maintenance</li>
                            <li>Salary</li>
                            <li>Other</li>
                        </ul>
                    </div>
                    <component class="p-[10px]" v-if="loaded" :is="active_tab"></component>
                </div>
                <div class="app-card w-[100%]">
                    <section class="mobile-transaction-display p-[10px] md:hidden">
                        <div v-for="(i,index) in accounts" :key="index" class="border-bottom py-[10px] ">
                            <div class=" mb-[10px] flex justify-between ">
                                <p class="small-text font-bold">ID: {{ i.id }}</p>
                                <p class="small-text">Ksh {{ i.amount }}</p>
                            </div>
                            <div class=" flex justify-between">
                                <p class="small-text font-bold">{{ i.transaction_type }}</p>
                                <p class="small-text">{{ returnDate(i.created_at) }}</p>
                            </div>
                        </div>
                    </section>
                    <table class=" hidden md:table w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-800 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                            <th scope="col" class="px-10 py-3">
                                Amount
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-5 py-3">
                                Date
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item,index) in accounts" :key="index" class="bg-white border-b">
                            <td class="px-6 py-3 small-text font-extrabold">
                                {{ item.id }}
                            </td>
                            <th scope="row"
                                class="px-6 small-text font-medium py-[10px] text-gray-900 whitespace-nowrap">
                                {{ item.transaction_type }}
                            </th>
                            <td class="px-10 my-10px">
                                {{ item.amount }}
                            </td>
                            <td class="px-5 small-text">
                                {{ item.description }}
                            </td>
                            <td class="px-5">
                                {{ returnDate(item.created_at) }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </section>
    </section>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import TripsListView from "@/appComponents/TripsListView.vue";
import NotificationCard from "@/Pages/Notifications/Components/NotificationCard.vue";
import TripFee from "@/Pages/Finances/SubComponents/TripFee.vue";
import FuelForm from "@/Pages/Finances/SubComponents/FuelForm.vue";
import OtherFees from "@/Pages/Finances/SubComponents/OtherFees.vue";
import Salary from "@/Pages/Finances/SubComponents/Salary.vue";

export default {
    setup(){

        function returnDate(data){
            const dateObject = new Date(data);
            const formattedDate = dateObject.toISOString().split('T')[0];
            return formattedDate
        }


        return {
            returnDate
        }
    },
    name: "finances",
    props: ['notifications','accounts','summary'],
    methods:{
        changeTab(){
            let clicked = $(event.target)

            if (!clicked.is('li')){
                return
            }

            let elem = $('#entry-navigation li')

            elem.each((index,item)=>{
                $(item).removeClass('active')
            })

            clicked.addClass('active')

            this.active_tab = this.active_form_tab($('#entry-navigation .active').text())
        },
        active_form_tab(tab = 'Trip Fee') {
            switch (tab) {
                case 'Trip Fee':
                    return 'TripFee'
                    break
                case 'Fuel & Maintenance':
                    return 'FuelForm'
                    break
                case 'Salary':
                    return 'Salary'
                    break
                case 'Other':
                    return 'OtherFees'
                    break
                default:
                    this.loaded = false
            }
        }
    },
    components: {
        NotificationCard,
        TripsListView,
        TripFee,
        FuelForm,
        OtherFees,
        Salary
    },
    data() {
        return {
            loaded: false,
            header_data: [
                {
                    title: "Total Revenue",
                    amount: this.summary.revenue
                },
                {
                    title: "Total Expenses",
                    amount: this.summary.expense
                },
                {
                    title: "Balance",
                    amount: this.summary.balance
                },
            ],
            active_tab:'TripFee'
        }
    },
    mounted() {
        this.loaded = true
    },
    layout: DashboardLayout
}
</script>


<style lang="scss" scoped>
@import "../../../scss/defaults";

#entry-navigation {
    li {
        padding: 4px;
        border-radius: 5px;
        font-size: small;

        &:hover {
            cursor: pointer;
            background-color: dimgrey;
            color: white;
        }
    }

    .active {
        @extend .button-fill-blue
    }
}

</style>
