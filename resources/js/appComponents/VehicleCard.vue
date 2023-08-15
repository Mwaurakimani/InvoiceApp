<template>
  <AppCardHolder :title="title ?? 'Vehicle'" class="mb-[20px] w-[100%]">
    <Link as="div" :href="route('vehicle.ViewVehicle',[vehicle.id])" class="w-[100%] p-[2px] mb-[10px]" style="border-radius: 8px;overflow: hidden">
      <img class="w-[100%]" :src="app_defaults.systemImages+'van.jpg'">
    </Link>
    <ul class="">
      <li class="flex small-text my-[5px]">
        <label class=" w-[120px] font-semibold text-gray-500">Registration:</label>
        <p>{{ vehicle.Registration_number }}</p>
      </li>
      <li class="flex small-text my-[5px]">
        <label class=" w-[120px] font-semibold text-gray-500">Fuel Capacity:</label>
        <p>{{ vehicle.fuel_capacity }} Litres</p>
      </li>
      <li class="flex small-text my-[5px]">
        <label class=" w-[120px] font-semibold text-gray-500">Engine Size:</label>
        <p>{{ vehicle.engine_size }}cc</p>
      </li>
      <li class="flex small-text my-[5px]">
        <label class=" w-[120px] font-semibold text-gray-500">Seats:</label>
        <p>{{ vehicle.seats }}</p>
      </li>
    </ul>
  </AppCardHolder>
</template>
<script>
import AppCardHolder from "@/appComponents/AppCardHolder.vue"

export default {
  name: 'VehicleCard',
    props:['vehicle','title'],
  components: {AppCardHolder},
}
</script>
