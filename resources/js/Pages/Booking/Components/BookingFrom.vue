<template>
  <section class="px-[10px] md:flex flex-wrap justify-between gap-1">
    <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
      <h5>Client Details</h5>
      <div class="input-group-default">
        <label>Client Name</label>
        <input type="text">
      </div>
      <div class="input-group-default">
        <label>Client Phone Number</label>
        <input type="tel">
      </div>
      <div class="input-group-default">
        <label>Client Email</label>
        <input type="tel">
      </div>
    </form>
    <form @submit.prevent class="mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]">
      <h5>Trip Details</h5>
      <div class="input-group-default">
        <label>Pick Up Location</label>
        <textarea class="h-[100px]">

                </textarea>
      </div>
      <div class="input-group-default">
        <label>Pick Up Time</label>
        <input type="datetime-local">
      </div>
      <div class="input-group-default">
        <label>Destination</label>
        <textarea class="h-[100px]">

                </textarea>
      </div>

      <div class="input-group-default">
        <label>Return Time</label>
        <input type="datetime-local">
      </div>
    </form>
    <form @submit.prevent class="p-[10px] mb-[20px] app-card md:w-[48%] ">
      <h5>Vehicle Details</h5>
      <div class="input-group-default">
        <label>Vehicle Registration</label>
        <input type="text">
      </div>
      <div class="input-group-default">
        <label>Vehicle Registration</label>
        <select>
          <option value="Company">Company</option>
          <option value="Driver">Driver</option>
          <option value="Client">Client</option>
        </select>
      </div>
      <div class="input-group-default">
        <label>Price</label>
        <input type="text">
      </div>
    </form>
    <form @submit.prevent class="p-[10px] mb-[20px] app-card md:w-[48%] ">
      <h5>Booking Details</h5>
      <div class="input-group-default">
        <label>Notes</label>
        <textarea class="h-[100px]">

                </textarea>
      </div>
    </form>
  </section>
</template>
<script>
export default {
  name: 'BookingFrom'
}
</script>