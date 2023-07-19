<template>
  <AppCardHolder :title="'Vehicle'" class="mb-[20px] w-[100%]">
    <div class="w-[100%] p-[2px] mb-[10px]" style="border-radius: 8px;overflow: hidden">
      <img class="w-[100%]" :src="app_defaults.systemImages+'van.jpg'">
    </div>
    <ul class="">
      <li class="flex small-text my-[5px]">
        <label class=" w-[120px] font-semibold text-gray-500">Registration:</label>
        <p>KDA 000A</p>
      </li>
      <li class="flex small-text my-[5px]">
        <label class=" w-[120px] font-semibold text-gray-500">Fuel Capacity:</label>
        <p>75 Litres</p>
      </li>
      <li class="flex small-text my-[5px]">
        <label class=" w-[120px] font-semibold text-gray-500">Engine Size:</label>
        <p>2500cc</p>
      </li>
      <li class="flex small-text my-[5px]">
        <label class=" w-[120px] font-semibold text-gray-500">Seats:</label>
        <p>14</p>
      </li>
    </ul>
  </AppCardHolder>
</template>
<script>
import AppCardHolder from "@/appComponents/AppCardHolder.vue"

export default {
  name: 'VehicleCard',
  components: {AppCardHolder},
}
</script>
