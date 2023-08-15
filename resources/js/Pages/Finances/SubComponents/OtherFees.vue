<script>
export default {
    name:"OtherFees"
}
</script>

<template>
    <div >
        <div class="header-controller flex mb-[10px] gap-2 justify-end">
            <button class="px-[10px] button-fill-blue" >Save</button>
            <button class="px-[10px] button-fill-blue" >Update</button>
            <button class="border-red-400 bg-red-400 text-white px-[10px] hover:bg-red-500">Delete</button>
        </div>
        <form>
            <div class="input-group mb-[10px]">
                <select>
                    <option value="none" disabled selected>Transition type</option>
                    <option value="Revenue">Revenue</option>
                    <option value="Expense">Expense</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="input-group justify-between  flex gap-2 mb-[10px]">
                <input type="number" class="w-[48%]" placeholder="Amount" >
                <input class="w-[48%]" placeholder="Paid Via" >
            </div>
            <div class="input-group justify-between  flex gap-2 mb-[10px]">
                <input class="w-[48%]" placeholder="Reference type" >
                <input class="w-[48%]" placeholder="Reference" >
            </div>
            <div class="input-group justify-between  flex gap-2 mb-[10px]">
                <textarea class="container-fluid h-[200px]" placeholder="Description"></textarea>
            </div>
        </form>
    </div>
</template>

<style scoped lang="scss">

input,select{
    height: 100%;
}

select{
    width: 100%;
    height: 40px;
}

input,select,textarea{
    border-radius: 5px !important;
    border: 1px solid #b9b9b9;
}

</style>
