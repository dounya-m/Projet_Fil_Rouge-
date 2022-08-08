<template>

<header  class="flex items-center justify-end object-top">


<section class="relative block w-full h-auto py-6 leading-10 text-center text-lime-900 bg-Lime-50 md:py-2 ">

    <!-- Right Light Blue Background -->
    <!-- <div class="absolute top-0 right-0 w-1/2 h-full transform opacity-50 bg-lime-50"></div> -->

    <div class="flex items-center w-full h-full px-4 mx-auto leading-10 text-center md:h-24 md:px-4 lg:px-6 max-w-7xl navbar_initialle ">
        <div class="flex flex-col items-center justify-between w-full h-full text-blue-900 md:flex-row">
            <div class="relative z-10 flex items-center w-auto px-4 leading-10 lg:flex-grow-0 lg:flex-shrink-0 lg:text-left">
                <a href="/" class="inline-block font-sans text-3xl font-black tracking-tight text-left text-transparent no-underline bg-transparent cursor-pointer w-36 bg-clip-text bg-gradient-to-r from-lime-100 to-lime-100 focus:no-underline">
                    <img src="../assets/images/logo.png" alt="">
                </a>
            </div>
            <div class="relative left-0 z-0 flex items-center justify-center w-full h-full px-4 my-5 space-x-5 text-lg font-medium leading-10 md:text-base lg:text-lg md:space-x-6 md:my-0 lg:w-full md:mt-0 md:absolute lg:space-x-12 md:text-left lg:text-center">
                <router-link to="/" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" 
                class="relative inline-block font-semibold text-center text-blue-900 no-underline bg-transparent cursor-pointer hover:text-lime-300 focus:no-underline">
                    <span class="block">Home</span>
                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 mt-0.5 overflow-hidden rounded-full">
                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-lime-600" x-transition:enter="transition origin-center ease-out duration-200" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition ease-out origin-center duration-200" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;"></span>
                    </span>
                </router-link>

                <routerLink to="/sitter" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-semibold text-center text-blue-900 no-underline bg-transparent cursor-pointer hover:text-lime-300 focus:no-underline">
                    <span class="block">Sitter</span>
                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 mt-0.5 overflow-hidden rounded-full">
                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-lime-600" x-transition:enter="transition origin-center ease-out duration-200" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition ease-out origin-center duration-200" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;"></span>
                    </span>
                </routerLink>
                <!-- <routerLink v-if="isLogin" to="/allsitter" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-semibold text-center text-blue-900 no-underline bg-transparent cursor-pointer hover:text-lime-300 focus:no-underline">
                    <span class="block">Sitter</span>
                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 mt-0.5 overflow-hidden rounded-full">
                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-lime-600" x-transition:enter="transition origin-center ease-out duration-200" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition ease-out origin-center duration-200" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;"></span>
                    </span>
                </routerLink> -->

                <routerLink v-if="isLogin" to="/siiterprofile" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-semibold text-center text-blue-900 no-underline bg-transparent cursor-pointer hover:text-lime-300 focus:no-underline">
                    <span class="block">My profile</span>
                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 mt-0.5 overflow-hidden rounded-full">
                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-lime-600" x-transition:enter="transition origin-center ease-out duration-200" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition ease-out origin-center duration-200" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;"></span>
                    </span>
                </routerLink>

                
                <router-link to="/post" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-semibold text-center text-blue-900 no-underline bg-transparent cursor-pointer hover:text-lime-300 focus:no-underline">
                    <span class="block">Postes</span>
                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 mt-0.5 overflow-hidden rounded-full">
                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-lime-600" x-transition:enter="transition origin-center ease-out duration-200" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition ease-out origin-center duration-200" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;"></span>
                    </span>
                </router-link>
                
                <router-link to="/bloguser" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-semibold text-center text-blue-900 no-underline bg-transparent cursor-pointer hover:text-lime-300 focus:no-underline">
                    <span class="block">blog</span>
                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 mt-0.5 overflow-hidden rounded-full">
                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-lime-600" x-transition:enter="transition origin-center ease-out duration-200" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition ease-out origin-center duration-200" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;"></span>
                    </span>
                </router-link>                
            </div>
            
        <section v-if="isLoggedIn" class="flex items-center gap-16" >
            <div v-for="a in this.post" :key="a.id" class="flex items-center gap-4 ">
                <router-link to="/profile">
                <img class="object-cover w-16 h-16 rounded-full" v-bind:src="'../uploads/' + this.image"  alt="">
                </router-link>
                <routerLink to="/profile" class="text-lg font-bold"> {{a.name}} {{a.lastname}}</routerLink>
            </div>
            <button @click="logout()" class="z-50 w-20 h-12 text-white rounded-lg btn bg-amber-400 hover:bg-amber-500">Logout</button>
        </section>
        <section v-else class="z-40 flex gap-6">
            <router-link to="login" class="relative inline-block font-semibold text-center text-blue-900 no-underline bg-transparent cursor-pointer hover:text-lime-300 focus:no-underline">
                <span class="block">Login</span>
            </router-link>
            <router-link to="/signing" class="inline-flex items-center justify-center px-5 py-3 text-base font-bold text-white uppercase whitespace-no-wrap bg-yellow-300 rounded-md hover:bg-yellow-400">
                    Sign up
            </router-link>
        </section>
    </div>            
</div>

<!-- nav responsive -->
    <span class="nav_reponsive">
        <button class="items-start w-2/12" @click="showmenu()" >
            <img class="" src="../assets/icones/menu.png" alt="">
        </button>
        <div class="flex-col items-center justify-center hidden w-7/12 p-5 mx-6 bg-white rounded-lg shadow-lg " id="nav">
            <button @click="showmenu()" class="text-3xl">
                x
            </button>
            <img class="w-6/12" src="../assets/images/logo.png" alt="">
                <div class="flex flex-col gap-3 mb-5">
                    <router-link class="text-xl font-semibold text-gray-400 hover:text-lime-400" to="/">Home</router-link>    
                    <routerLink v-if="isLogin" to="/siiterprofile"  class="text-xl font-semibold">
                    My profile
                    </routerLink>        
                    <router-link class="text-xl font-semibold text-gray-400 hover:text-lime-400" to="/sitter">Sitter</router-link>
                    <router-link class="text-xl font-semibold text-gray-400 hover:text-lime-400" to="/post">Postes</router-link>
                    <router-link class="text-xl font-semibold text-gray-400 hover:text-lime-400" to="/bloguser">blog</router-link>
                </div>
            <div>
            </div>
                <div v-if="isLoggedIn" class="relative w-full px-4 space-x-5 text-lg font-medium leading-10 md:space-x-3 md:text-base lg:text-lg lg:space-x-12 sm:w-auto">
                <button @click="logout()" 
                class="inline-flex items-center justify-center px-3 py-2 text-sm font-normal text-yellow-300 uppercase whitespace-no-wrap border-2 border-yellow-300 rounded-md shadow-sm md:text-sm lg:text-base hover:bg-yellow-400 hover:text-white hover:border-yellow-400">
                    Sign out
                </button>
            </div>
            
            <div v-else class="relative flex flex-col w-full gap-2 px-4 space-x-5 text-lg font-medium leading-10 md:space-x-3 md:text-base lg:text-lg lg:space-x-12 sm:w-auto">
                <router-link to="login" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-semibold text-center text-blue-900 no-underline bg-transparent cursor-pointer hover:text-lime-300 focus:no-underline">
                    <span class="block">Login</span>
                </router-link>
                <router-link to="/signing" class="items-center justify-center px-5 py-3 text-base font-bold text-white uppercase whitespace-no-wrap bg-yellow-300 rounded-md shadow-sm w-inline-flex md:text-sm lg:text-base">
                    Sign up
                </router-link>
            </div>
            </div>

            </span>

        </section>


    </header>

</template>

<script>

import axios from 'axios';

export default
{
    name: 'PostNav',
    data()
    {
        return{
            isLoggedIn: localStorage.getItem('token') ?true : false,
            image: localStorage.getItem('image'),
            post: [],
            isLogin: localStorage.getItem('id_sitter') ?true : false,
            }
        },
        created() {
        this.isLogin = localStorage.getItem('id_sitter') ? true : false
        },
        beforecreated() {
        this.isLoggedIn = localStorage.getItem('token') ? true : false
        },
    
        methods:{
    logout(){
            console.log("hello")
            localStorage.removeItem('token')
            localStorage.removeItem('image')

                        console.log(typeof localStorage['token']);
                        if(!localStorage['token']){
                        this.ifLogin=false;
            }
            this.$router.push('/')
            console.log("hello")
        },
    showmenu(){
        const commnet = document.getElementById('nav');
        commnet.classList.toggle('hidden');
        },
        
        
    },
        async mounted() {
            await axios.get(`http://localhost/bestFriendB/MVC/User/getOneUser/${localStorage["token"]}`)	
                .then(response => {
                    this.post = response.data;
                })
                .catch(error => {
                
                    console.log(error);
                })
                
        },
        

    }


</script>
<style>
@media only screen and (max-width: 850px){
    .navbar_initialle{
    display: none;
}
}

</style>
