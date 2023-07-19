<template>
  <div class="mobile-display-dashboard-summary sm:flex lg:hidden w-[100%]">
    <h3 class="white-text">Welcome</h3>
    <h2 class="white-text mb-[20px]">Username</h2>
    <div class="grid-summary-card-holder">
      <div class="summary-card">
        <p>Assigned Trips</p>
        <h5>1</h5>
      </div>
      <div class="summary-card">
        <p>Assigned Trips</p>
        <h5>1</h5>
      </div>
      <div class="summary-card">
        <p>Assigned Trips</p>
        <h5>1</h5>
      </div>
      <div class="summary-card">
        <p>Assigned Trips</p>
        <h5>1</h5>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'MobileDashboardSummary'
}
</script>

<style lang="scss" scoped >
@import "../../../scss/defaults";

.mobile-display-dashboard-summary{
    width: 100%;
    height: 400px;
    padding: 20px;
    background-image: linear-gradient(180deg, #1f9ff5, #186fa9);
    flex-direction: column;
    justify-content: center;

    .grid-summary-card-holder{
        display: grid;
        gap: 10px;
        grid-template-columns: repeat(2,1fr);

        .summary-card{
            height: 100px;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            p{
                padding: 10px;
            }

            h5{
                padding-right: 20px;
                text-align: right;
            }
        }
    }
}
</style>
