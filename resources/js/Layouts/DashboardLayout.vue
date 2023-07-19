<template>
    <teleport to="body">
        <div class="mobile-menu" @click="closeMenuBar">
            <div class="menu-items-holder" @click.prevent.stop>
                <div class="top-bar">
                    <img class="w-[30px] h-[30px]" :src="app_defaults.systemImages +'user.png'">
                    <img @click.prevent.stop="closeMenuBar" class="w-[30px] h-[30px]"
                         :src="app_defaults.systemImages +'back.png'">
                </div>
                <ul @click="closeMenuBar">
                    <NavLinks :nav-links="navLinks"/>
                </ul>
                <div class="bottom-bar">
                    <ul class="w-[100%] px-[10px]  h-[100%] flex items-center justify-between">
                        <Link class="button-fill-blue p-[5px]" as="button" :href="'/logout'" method="post">Log Out
                        </Link>
                    </ul>
                </div>
            </div>
        </div>
    </teleport>
    <section>
        <div class="hidden shadow-sm desktop-heading justify-between items-center p-[20px] bg-white lg:flex">
            <div class="search w-[200px]">

            </div>
            <div class="common flex gap-6">
                <div class="notifications-holder w-[40px] h-[40px] grid place-content-center" >
                    <img class="w-[30px] h-[30px]" :src="app_defaults.systemImages +'bell.png'">
                </div>
                <div class="user flex space-x-4 items-center">
                    <img class="w-[30px] h-[30px]" :src="app_defaults.systemImages +'user.png'">
                    <p>Username</p>
                </div>
                <div class="user flex space-x-4 items-center">
                    <Link as="button" :href="'/logout'" method="post" class="button-fill-blue px-[10px]" >Log out</Link>
                </div>
            </div>
        </div>
        <div class="hidden shadow-sm desktop-sidebar bg-white lg:block">
            <div class="logo-section mb-[40px] p-[15px] flex justify-center w-[100%] h-[100px]">
                <img class="h-[100%]" :src="app_defaults.systemImages+'logo.png'">
            </div>
            <ul @click="closeMenuBar">
                <NavLinks :nav-links="navLinks"/>
            </ul>
        </div>
        <div class="content-provider">
            <div class="mobile-nav h-[60px] shadow-sm flex justify-between items-center lg:hidden">
                <div class="logo pl-[20px]">
                    <div class="logo-display w-[80px] p-[5px]">
                        <img :src="app_defaults.systemImages+'logo.png'">
                    </div>
                </div>
                <div @click.prevent="openMenu" class="logo pl-[20px]">
                    <div class="logo-display w-[40px] p-[5px]">
                        <img :src="app_defaults.systemImages+'menu.png'">
                    </div>
                </div>
            </div>

            <slot></slot>
        </div>
    </section>
</template>

<script>
import {app_defaults} from "@/appDefaults/config.js";
import NavLinks from "@/Layouts/NavLinks.vue";

export default {
    components: {NavLinks},
    computed: {
        app_defaults() {
            return app_defaults
        }
    },
    methods: {
        closeMenuBar() {
            $('.mobile-menu').fadeOut('slow')
            $('.menu-items-holder').animate({
                left: '-300px'
            }, 200, () => {
            })

        },
        openMenu() {
            $('.mobile-menu').fadeIn('fast')
            $('.menu-items-holder').animate({
                left: '0px'
            }, 200, () => {
            })

        }
    },
    data() {
        return {
            navLinks: [
                {
                    name: "Dashboard",
                    path: "/dashboard"
                },
                {
                    name: "Bookings",
                    path: "/Booking"
                },
                {
                    name: "Trips",
                    path: "/Trips"
                },
                {
                    name: "Notifications",
                    path: "/Notifications"
                },
                {
                    name: "Vehicles",
                    path: "/Vehicles"
                },
                {
                    name: "Finances",
                    path: "/Finances"
                },
                {
                    name: "Drivers",
                    path: "/Drivers"
                },
                {
                    name: "Accounts",
                    path: "/Accounts"
                },
            ]
        }
    }
}
</script>

<style scoped lang="scss">
@import "../../scss/defaults";

body {
    overflow: hidden;
}

.mobile-menu {
    display: none;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.45);
    position: fixed;
    top: 0px;
    left: 0px;

    .menu-items-holder {
        position: relative;
        width: 300px;
        height: 100%;
        background-color: white;
        display: grid;
        row-gap: 20px;
        grid-template-rows: 45px 1fr 40px;

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 10px;
        }

        ul {

        }
    }
}

.mobile-nav {
    position: sticky;
    top: 0px;
    background-color: white;
}

section {
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    display: grid;

    .content-provider {
        overflow-y: auto;
    }
}

@media only screen and (min-width: 1024px) {
    section {
        background-color: #f3f3f3;
        grid-template-columns: 250px 1fr 1fr 1fr;
        grid-template-rows: 55px 1fr;
        gap: 10px;
        grid-template-areas:
        "sidebar heading heading heading"
        "sidebar body body body";

        .desktop-heading {
            grid-area: heading;
        }

        .desktop-sidebar {
            grid-area: sidebar;
        }

        .content-provider {
            grid-area: body;
        }
    }
}

</style>

