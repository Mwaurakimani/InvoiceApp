<template>
  <Link as="li" v-for="navLink in navLinks" :href="navLink.path">
    <p class="w-[100%] h-[100%]" :class="{'active-link':$page.url.startsWith(navLink.path)}">{{ navLink.name }}</p>
  </Link>
</template>
<script>
export default {
  name: 'NavLinks',
  props: {
    navLinks: {}
  }
}
</script>
<style scoped lang="scss">
@import "../../scss/defaults";

body {
  overflow: hidden;
}

.active-link {
  background-color: dodgerblue;
  color: white;
}

section {
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  display: grid;
}

li {
    display: flex;
    align-items: center;
    height: 40px;
    p{
        line-height: 40px;
        padding-left: 20px;
        &:hover{
            background-color: #88caf6;
            color: white;
        }
        &:active{
            background-color: #5eb9f6;
            color: white;
        }
    }
}
</style>
