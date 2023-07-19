<template>
  <Link as="div" :href="route('notifications.ViewNotification',[1])" class="notification-card w-[100%] md:w-[300px]" style="background-color: white">
      <AppCardHolder :title="'title'">
          <p class="p-[10px] small-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium ad aliquid architecto aut beatae consequatur, cupiditate debitis, delectus id labore natus omnis quam quas sit sunt vel voluptate voluptatem.</p>
      </AppCardHolder>
  </Link>
</template>
<script>
import AppCardHolder from "@/appComponents/AppCardHolder.vue";

export default {
  name: 'NotificationCard',
    components: {AppCardHolder}
}
</script>
