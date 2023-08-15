<template>
    <ul>
        <li style="width: 100%" v-for="(item,index) in dataset" :key="index">
            <slot :item="item"></slot>
        </li>
    </ul>
</template>
<script>


export default {
    name: 'TripsListView',
    props:['dataset']
}
</script>

<style lang="scss" scoped>

ul {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(1, 1fr);
}

@media only screen and (min-width: 730px) {
    ul {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Extra Small Devices, Phones */
@media only screen and (min-width: 1080px) {
    ul {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }
}

@media only screen and (min-width: 1430px) {
    ul {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }
}

@media only screen and (min-width: 1780px) {
    ul {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
    }
}

</style>
