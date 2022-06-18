<template>
    <header class="flex flex-wrap items-center gap-4 justify-evenly">
        <section class="relative flex items-center w-3/12 p-5 shadow-md mt-44 bg-white-50 h-72 rounded-xl">
            <div class="flex flex-col items-center justify-center gap-1">
                <h2 class=" text-2xlfont-emibold">Users</h2>
                <p class="w-2/3 text-slate-400">the number of users you have on your website</p>
                <p class="font-semibold text-blue-600">{{this.users}} user</p>
            </div>
            <div class="absolute -mt-36 ">
                <img class="w-full " src="../../../assets/images/Saly-6.png" alt="">
            </div>
        </section>

            <section class="relative flex items-center w-3/12 p-5 shadow-md mt-44 h-72 rounded-xl bg-white-50">
            <div class="flex flex-col items-center justify-center gap-1">
                <h2 class="text-green-500 text-2xlfont-emibold">Sitters</h2>
                <p class="w-2/3 text-slate-400">the number of Sitters you have on your website</p>
                <p class="font-semibold text-green-400">{{this.sitters}} Sitter</p>
            </div>
            <div class="absolute -mt-36 ">
                <img class="w-full " src="../../../assets/images/Sally-4.png" alt="">
            </div>
        </section>

            <section class="relative flex items-center w-3/12 p-5 shadow-md mt-44 h-72 rounded-xl bg-white-50">
            <div class="flex flex-col items-center justify-center gap-1">
                <h2 class="text-yellow-500 text-2xlfont-emibold">Postes</h2>
                <p class="w-2/3 text-slate-400">the number of Postes you have on your website</p>
                <p class="font-semibold text-yellow-400">{{this.postes}} Post</p>
            </div>
            <div class="absolute -mt-52 ">
                <img class="w-9/12 ml-40 " src="../../../assets/images/Saly-18.png" alt="">
            </div>
        </section>
    </header>
</template>

<script>
import axios from 'axios';
export default{
    name: 'StatisticsTop',
    data(){
        return{
            users: 0,
            sitters: 0,
            postes: 0
        }
    },
    mounted(){
        axios.get('http://localhost/bestFriendB/MVC/User/countUsers')
        .then(response => {
            this.users = response.data;
        })
    },
    beforeMount(){
        axios.get('http://localhost/bestFriendB/MVC/Sitter/countSitters')
        .then(response => {
            this.sitters = response.data;
        })
    },
    created(){
        axios.get('http://localhost/bestFriendB/MVC/Post/countPostes')
        .then(response => {
            this.postes = response.data;
        })
    },
    
        
    

}
</script>