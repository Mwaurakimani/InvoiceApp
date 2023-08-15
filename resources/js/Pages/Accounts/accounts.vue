<template>
    <section class="block lg:hidden">
        <h1 class="p-[20px]">Vehicles</h1>
        <div class="flex h-[50px] mb-[20px] p-[20px] items-center justify-center">
            <input class="w-[100%]" type="search" placeholder="Search...">
        </div>
        <div class="px-[10px] flex">
            <Link as="button" :href="route('accounts.CreateAccount')" class="px-[10px]">Add User</Link>
        </div>
        <TripsListView v-slot="data" :dataset="accounts" class="p-[10px] mb-[20px]">
            <UserCard :item="data.item"></UserCard>
        </TripsListView>


        <div class="flex mb-[30px] w-[100%] justify-center">
            <!-- Previous Button -->
            <a href="#"
               class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                Previous
            </a>
            <a href="#"
               class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </section>

    <section class="hidden lg:block p-[10px]">
        <div class="heading">
            <h1>Accounts</h1>
        </div>
        <div class="flex justify-between py-[10px]">
            <ul>
                <Link as="button" :href="route('accounts.CreateAccount')" class="button-fill-blue px-[10px]">Add
                    Account
                </Link>
            </ul>
            <div>
                <input type="search" placeholder="Search...">
            </div>
        </div>
        <div>
            <p class="lighter-text mb-[20px] small-text">Total Users fount (100)</p>
        </div>

        <div class="relative app-card mb-[20px] overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-800 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        User ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Designation
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Status
                    </th>
                </tr>
                </thead>
                <tbody>
                <Link :href="route('accounts.ViewAccount',[item.id])" as="tr" class="cursor-pointer hover:text-white hover:bg-blue-500 border-b" v-for="item in accounts">
                    <th scope="row" class="px-6 small-text font-medium whitespace-nowrap">
                        {{ item.id }}
                    </th>
                    <td class="px-6 small-text font-extrabold py-3">
                        {{ item.first_name +" "+ item.last_name }}
                    </td>
                    <td class="px-10 my-10px">
                        {{ item.email }}
                    </td>
                    <td class="px-5 small-text">
                        {{ item.designation[0].name }}
                    </td>
                    <td class="px-5">
                        <div class="pill w-[100%] flex small-text" style="justify-content: center">
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
                    <a href="#"
                       class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700  ">Previous</a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800  :text-white">1</a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800  :text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page"
                       class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 ">3</a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 -gray-700 ">4</a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 -gray-700 ">5</a>
                </li>
                <li>
                    <a href="#"
                       class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700  -gray-700">Next</a>
                </li>
            </ul>
        </nav>


    </section>
</template>
<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import TripsListView from "@/appComponents/TripsListView.vue";
import TripCard from "@/appComponents/TripCard.vue";
import UserCard from "@/appComponents/UserCard.vue";

export default {
    name: "accounts",
    components: {TripCard, TripsListView, UserCard},
    layout: DashboardLayout,
    props: ['accounts']
}
</script>
<style scoped lang="scss">

</style>
