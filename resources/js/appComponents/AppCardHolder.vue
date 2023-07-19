<template>
    <div class="holding-card p-[10px] app-card bg-white">
        <div class="card-heading flex mb-[10px] items-center justify-between">
            <h6 class="">{{ title }}</h6>
            <div v-if="pill" class="pill"><p>{{ pill }}</p></div>
        </div>
        <slot></slot>
    </div>
</template>
<script>
export default {
    name: 'AppCardHolder',
    props: ['title', 'pill']
}
</script>
<style scoped lang="scss">
@import "../../scss/defaults";
</style>
