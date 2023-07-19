<template>
  <AppCardHolder :title="'Client'" class="mb-[20px] w-[100%]">
    <div class="w-[100%] flex mb-[30px]">
      <div style=" width:50px;height:50px;overflow: hidden;border-radius: 50%" class="mr-[10px]">
        <img class="w-[50px] " style="object-fit: cover" :src="app_defaults.systemImages+'user.png'">
      </div>
      <ul class="w-[calc(100%-70px)] flex flex-col px-[10px]">
        <li>Username</li>
        <li>+254 700 000 000</li>
      </ul>
    </div>
      <slot></slot>
  </AppCardHolder>
</template>
<script>
import AppCardHolder from "@/appComponents/AppCardHolder.vue"

export default {
  name: 'ClientCard',
  components: {AppCardHolder},
}
</script>
