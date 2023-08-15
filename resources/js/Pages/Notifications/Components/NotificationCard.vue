<template>
    <Link as="div" :href="route('notifications.ViewNotification',[item.item.id])" class="notification-card w-[100%] md:w-[300px]"
          style="background-color: white">
        <AppCardHolder class="card-holder-main" :title="item.item.title">
            <p class="p-[10px] small-text">{{ item.item.message }}</p>
        </AppCardHolder>
    </Link>
</template>
<script>
import AppCardHolder from "@/appComponents/AppCardHolder.vue";

export default {
    name: 'NotificationCard',
    props:['item'],
    components: {AppCardHolder}
}
</script>

<style lang="scss" scoped>
.card-holder-main{
    cursor: pointer;
    transition: all ease-in 100ms;

    &:hover{
        transform: scale(1.05);
    }
}
</style>
