<template>
  <AppCardHolder v-slot="data" :data="item"  :title="''" class="mb-[0px] w-[100%]">
    <Link as="div" :href="route('accounts.ViewAccount',[data.data.id])" class="w-[100%] flex mb-[30px]">
      <div style=" width:50px;height:50px;overflow: hidden;border-radius: 50%" class="mr-[10px]">
        <img class="w-[50px] " style="object-fit: cover" :src="app_defaults.systemImages+'user.png'">
      </div>
      <ul class="w-[calc(100%-70px)] flex flex-col px-[10px]">
        <li>{{ data.data.first_name+ " " +data.data.last_name }}</li>
        <li>{{ data.data.phone }}</li>
      </ul>
    </Link>
      <slot></slot>
  </AppCardHolder>
</template>
<script>
import AppCardHolder from "@/appComponents/AppCardHolder.vue"

export default {
  name: 'UserCard',
  components: {AppCardHolder},
    props:['item']
}
</script>
