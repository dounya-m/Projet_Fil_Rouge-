<template>
    <section class="fixed profil_card"  v-for="a in this.user" :key="a.id">

        <div class="max-w-xs p-10 font-semibold text-center bg-white border shadow-sm rounded-3xl">
            <div class="-mt-24">
                <img class="object-cover w-24 h-24 mx-auto mb-3 rounded-full shadow-sm" v-bind:src="'../uploads/' + this.image"
                alt="product designer">
            </div>
            <div class="my-6 ">
                <h1 class="text-lg text-gray-700"> {{a.name}} {{a.lastname}} </h1>
                <!-- <h3 class="text-sm text-gray-400 "> City </h3> -->
            </div>
            <div class="flex items-center gap-4 mb-4">
                <img class="w-6" src="../../assets/icones/phone.png" alt="">
                <h3 class="text-sm text-gray-400 "> {{a.tele}} </h3>
            </div>
            <div class="flex items-center gap-4">
                <img class="w-6" src="../../assets/icones/email.png" alt="">
                <h3 class="text-sm text-gray-400 "> {{a.email}} </h3>
            </div>
            <div class="mt-12">
                <router-link to="/profile" 
                class="px-8 py-2 mt-16 font-semibold tracking-wide text-white uppercase rounded-lg bg-amber-400">
                My Profile
                </router-link>
            </div>
        </div>

    </section>
</template>


<script>
import axios from 'axios';

export default {
    
    name: 'ProfiCard',
    
        data()
    {
        return{
            image: localStorage.getItem('image'),
            user: []
        }
    },
    
        methods:{
        
    },
        async mounted() {
            await axios.get(`http://localhost/bestFriendB/MVC/User/getOneUser/${localStorage["token"]}`)	
                .then(response => {
                    this.user = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
                
        },
}

</script>