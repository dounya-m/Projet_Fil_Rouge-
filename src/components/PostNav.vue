<template>

<header class="flex items-center justify-end object-top " v-for="a in this.post" :key="a.id">


    <section class="basis-1/4" >
        <img class="w-32" src="../assets/images/logo.png" alt="">
    </section>


    <section class="basis-2/5">
        <div class="flex items-center gap-16">
        <div class="flex gap-6">
            <routerLink to="/post">
                <img class="w-10 p-2 rounded-full bg-violet-100 " src="../assets/icones/home.png" alt="">
            </routerLink>
            <router-link to="/allsitter">
                <img class="w-10 p-2 rounded-full bg-violet-100 " src="../assets/icones/doctor.png" alt="">
            </router-link>
        </div>
        <div class="">
                <input type="text" class="h-10 p-2 rounded-md w-96 bg-slate-50 placeholder-emerald-800 " placeholder="Search....">
        </div>
        </div>
    </section>


    <section class="flex items-center gap-16 basis-1/4">
        <div class="flex items-center gap-4 ">
            <router-link to="/profile">
            <img class="object-cover w-16 h-16 rounded-full" v-bind:src="'../uploads/' + this.image"  alt="">
            </router-link>
            <routerLink to="/profile" class="text-lg font-bold"> {{a.name}} {{a.lastname}}</routerLink>
        </div>
            <button @click="logout()" class="w-20 h-12 text-white rounded-lg btn bg-amber-400 hover:bg-amber-500"   >Logout</button>
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
            post: []
        }
    },
        beforecreated() {
        this.isLoggedIn = localStorage.getItem('token') ? true : false
        },
    
        methods:{
    logout(){
        localStorage.removeItem('token')
                    console.log(typeof localStorage['token']);
                    if(!localStorage['token']){
                    this.ifLogin=false;
        }
        // console.log(this.ifLogin)
        this.$router.push('/')
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

