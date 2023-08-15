<template>
    <AppCardHolder :driver="driver" :title="'Driver'" class="mb-[20px] w-[100%]">
        <Link as="div" :href="route('drivers.ViewDriver',[driver.id])" class="w-[100%] flex mb-[30px]">
            <div style=" width:50px;height:50px;overflow: hidden;border-radius: 50%" class="mr-[10px]">
                <img class="w-[50px] " style="object-fit: cover" :src="app_defaults.systemImages+'user.png'">
            </div>
            <ul class="w-[calc(100%-70px)] flex flex-col px-[10px]">
                <li>{{ driver.first_name +" "+driver.last_name }}</li>
                <li>{{ driver.phone }}</li>
            </ul>
        </Link>
        <slot :test="test"></slot>
    </AppCardHolder>
</template>
<script>
import AppCardHolder from "@/appComponents/AppCardHolder.vue"

export default {
    name: 'DriverCard',
    props: ['driver'],
    data(){
      return {
          test:"test"
      }
    },
    components: {AppCardHolder},
}
</script>
