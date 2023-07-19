<template>
    <section class="flex">
        <div class="hidden lg:block w-[50%] h-[100vh]" style="position: relative">
            <img style="object-fit: cover;width: 100%; height: 100%" :src="app_defaults.systemImages+'van.jpg'">
            <div class="w-[100%] h-[100%] flex items-center justify-center" style="position: absolute;top: 0px;left: 0px;background-color: rgba(30,30,30,0.66);z-index: 200"  >
                <div class="logo-display w-[300px] bg-white p-[10px]">
                    <img :src="app_defaults.systemImages+'logo.png'">
                </div>
            </div>
        </div>
        <div class="main w-[100vw] h-[100vh] lg:w-[50%]">
            <div class="logo-display p-[3px]">
                <img :src="app_defaults.systemImages+'logo.png'">
            </div>
            <form action="#" @submit.prevent="logIn">
                <div class="app-card w-[100%] p-[20px]">
                    <h4 class="block w-[100%] mb-[20px] text-left" >Log in</h4>
                    <div class="input-group">
                        <label for="email" class="small-text lighter-text"  >Email</label>
                        <input v-model="loginForm.email" type="email" id="email" placeholder="E-mail">
                    </div>
                    <div class="input-group">
                        <label for="password" class="small-text lighter-text"  >Password</label>
                        <input v-model="loginForm.password" type="password" id="password" placeholder="Password">
                    </div>
                    <div>
                        <button type="submit" class="button-fill-blue px-[10px] py-[5px]">Log In</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>

<script>
import '../../scss/defaults.scss'
import {app_defaults} from "@/appDefaults/config.js";
import {useForm} from "@inertiajs/vue3";
export default {
    computed: {
        app_defaults() {
            return app_defaults
        }
    },

    data(){
        return {
            loginForm:useForm({
                email:null,
                password:null
            })
        }
    },

    methods:{
        logIn(){
            this.loginForm.post('login')
        }
    },
    mounted() {
    }

}
</script>

<style lang="scss" scoped >
.main{
    display: flex;
    flex-direction: column;
    background-color: white;
    align-items: center;
    justify-content: center;

    .logo-display{
        height: 70px;
        width: 70%;
        margin-bottom: 20px;
        img{
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    }

    form{
        width: 100%;
        padding: 20px;
    }
}
.input-group{
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
    label,input{
        margin: 5px;
    }
}
</style>
