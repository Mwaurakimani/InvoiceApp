<template>
    <Link as="div" :href="route('booking.ViewBooking',[1])" class="trip-holder app-card">
        <p class="trip-id">ID: {{ trip.id }}</p>
        <div class="pill"><p>Active</p></div>
        <div class="driver">Client Name:{{ trip.clientName }}</div>
        <ul class="card-body small-text flex">
            <li class="flex">
                <label>From:</label>
                <p>{{ trip.pickUpLocation }}</p>
            </li>
            <li class="flex">
                <label>To:</label>
                <p>{{ trip.destination }}</p>
            </li>
            <li class="flex">
                <label>Date:</label>
                <p>{{ trip.pickUpTime }}</p>
            </li>
            <li class="flex">
                <label>Return:</label>
                <p>{{ trip.returnTime }}</p>
            </li>
        </ul>
        <p class="cash">{{currency.format(trip.price)}}</p>
    </Link>
</template>
<script>
export default {
    setup(){
        let currency = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'Ksh',
        });

        return {
            currency
        }
    },
    name: 'TripCard',
    props: ['trip'],
}
</script>

<style lang="scss" scoped>
@import "../../scss/defaults";

.trip-holder {
    padding: 10px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: 30px 30px 120px 30px;
    grid-template-areas:
    "head head pill pill"
    "driver driver driver driver"
    "body body body body"
    "empty cash cash cash";

    .trip-id {
        grid-area: head;
    }

    .pill {
        grid-area: pill;
        display: flex;
        justify-content: right;

        p {
            background-color: #3ed77c;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px 3px;
            border-radius: 7px;
            @extend .small-text;
        }
    }

    .driver {
        grid-area: driver;
        color: dodgerblue;
        @extend .small-text;
        font-weight: bolder;

    }

    .card-body {
        grid-area: body;
        flex-direction: column;
        padding-left: 20px;

        label {
            width: 100px;
            color: dodgerblue;
        }
    }

    .cash {
        grid-area: cash;
        display: grid;
        justify-content: right;
        font-weight: bolder;
    }
}


</style>
