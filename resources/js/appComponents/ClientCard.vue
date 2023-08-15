<template>
  <AppCardHolder :title="'Client'" class="mb-[20px] w-[100%]">
    <div class="w-[100%] flex mb-[30px]">
      <ul class="w-[calc(100%-70px)] flex flex-col px-[10px]">
        <li>Name : {{ booking.clientName }}</li>
        <li>Phone : {{ booking.clientNumber }}</li>
        <li>Email : {{ booking.clientEmail }}</li>
      </ul>
    </div>
      <slot></slot>
  </AppCardHolder>
</template>
<script>
import AppCardHolder from "@/appComponents/AppCardHolder.vue"

export default {
    name: 'ClientCard',
    props:['booking'],
    components: {AppCardHolder},
}
</script>
