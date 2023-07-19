<template>
    <section class="block lg:hidden">
        <MobileDashboardSummary class="mb-[10px]"></MobileDashboardSummary>
        <div class="p-[10px] mb-[20px]">
            <h3 class="mb-[20px]">Income in the last 7 days</h3>
            <h5 class="pl-[30px]">Ksh 300,000</h5>
            <hr>
        </div>
        <div class="container mx-w-[1530px] mx-[auto] p-[10px] mb-[30px]">
            <h3 class="mb-[10px]">Active Trips</h3>
            <TripsListView>
                <TripCard/>
            </TripsListView>
        </div>
    </section>
    <section class="hidden desktop-display  lg:block">
        <div class="heading">
            <h1>Dashboard</h1>
        </div>
        <section class="mb-[40px] bg-white">
            <div>
                <h5>Current Status</h5>
            </div>
            <ul class="small-text">
                <li>
                    <h6>Assigned Trips</h6>
                    <h3>1</h3>
                </li>
                <li>
                    <h6>Unassigned Trips</h6>
                    <h3>1</h3>
                </li>
                <li>
                    <h6>In Transit</h6>
                    <h3>1</h3>
                </li>
                <li>
                    <h6>Completed</h6>
                    <h3>1</h3>
                </li>
                <li>
                    <h6>All Trips</h6>
                    <h3>1</h3>
                </li>
            </ul>
        </section>
        <section  class="mb-[40px] bg-white">
            <div class="mb-[20px]" >
                <h5>Periodic</h5>
                <div>
                    <form class="flex w-[400px] justify-around items-center small-text flex-row">
                        <div class="input-group m-[0px] p-[0px] flex">
                            <input type="date" id="From">
                        </div>
                        <label class="lighter-text mr-[15px]">To</label>
                        <div class="input-group m-[0px] p-[0px] flex">
                            <input type="date">
                        </div>
                    </form>
                </div>
            </div>
            <ul class="flex small-text justify-between">
                <li>
                    <h6>Total Mileage</h6>
                    <h3>1</h3>
                </li>
                <li>
                    <h6>Booking</h6>
                    <h3>1</h3>
                </li>
                <li>
                    <h6>Total Earnings</h6>
                    <h3>1</h3>
                </li>
            </ul>
        </section>
        <section>
            <div>
                <h5> Total Mileage (Km) </h5>
            </div>
            <article class="bg-white">
                <div>

                </div>
                <ul>
                    <li>
                        <label>Daily Growth</label>
                        <p>5%</p>
                    </li>
                    <li>
                        <label>Weekly Growth</label>
                        <p>1%</p>
                    </li>
                    <li>
                        <label>Monthly Growth</label>
                        <p>0.5%</p>
                    </li>
                    <li>
                        <label>KPI Growth</label>
                        <p>30%</p>
                    </li>
                </ul>
            </article>
        </section>
    </section>
</template>

<script>
import MobileDashboardSummary from "@/Pages/Dashboard/MobileDashboardSummary.vue";
import TripsListView from "@/appComponents/TripsListView.vue";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import TripCard from "@/appComponents/TripCard.vue";

export default {
    layout: DashboardLayout,
    components: {
        TripCard,
        TripsListView,
        MobileDashboardSummary
    }
}
</script>

<style lang="scss" scoped>
@import "../../../scss/defaults";

.app-card {
    background-color: white;
}

.desktop-display {
    padding: 10px;

    .heading {
        width: 100%;
        height: 40px;
    }

    & > section {
        padding: 15px;

        div {
            justify-content: space-between;
            display: flex;
            height: 50px;
            align-items: center;
        }


        & > ul {
            display: flex;
            gap: 10px;

            li {
                width: 25%;
                @extend .app-card;
                padding: 10px;

                h3 {
                    text-align: right;
                    padding: 10px;
                }
            }
        }

        & > article {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 20px;
            grid-template-areas:
                "sec sec sec dif";

            div {
                grid-area: sec;
                height: 400px;
                background-color: #99f8b7;
            }

            ul {
                grid-area: dif;

                li {
                    display: flex;
                    padding: 10px;

                    label {
                        width: 170px;
                    }
                }
            }
        }
    }
}
</style>

