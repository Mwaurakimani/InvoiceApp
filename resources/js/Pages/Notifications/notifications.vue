<template>
    <section class="block lg:hidden">
        <div class="flex h-[50px] mb-[20px] p-[20px] items-center justify-center">
            <input class="w-[100%]" type="search" placeholder="Search...">
        </div>
        <div class="px-[10px] flex">
            <Link as="button" :href="route('notifications.CreateNotifications')" class="px-[10px]">Add Notification</Link>
        </div>
        <TripsListView class="p-[10px] mb-[20px]">
            <NotificationCard/>
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
            <h1>Notification</h1>
        </div>
        <div class="flex justify-between py-[10px]">
            <ul>
                <Link as="button" :href="route('notifications.CreateNotifications')" class="button-fill-blue px-[10px]" >Add Notification</Link>
            </ul>
            <div>
                <input type="search" placeholder="Search...">
            </div>
        </div>
        <TripsListView class="p-[10px] mb-[20px]">
            <NotificationCard/>
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
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import TripsListView from "@/appComponents/TripsListView.vue";
import NotificationCard from "@/Pages/Notifications/Components/NotificationCard.vue";

export default {
    name: "notifications",
    components: {NotificationCard, TripsListView},
    layout:DashboardLayout
}
</script>

