<template>
<section class="relative flex flex-col items-center justify-center w-2/12 shadow-md mt-44 h-72 bg-slate-50 rounded-xl">
    <img class="absolute object-cover w-32 h-32 rounded-full -mt-80" v-bind:src="'../uploads/' + user.image" alt="">
    <div class="flex flex-col items-center gap-6 mt-10">
        <h1 class="text-2xl">{{user.name}} {{user.lastname}}</h1>
        <div class="">
        <div class="flex items-start justify-start gap-4">
            <img class="w-6 " src="../../../assets/icones/icons8-email-80.png" alt="">
            <p>{{user.email}}</p>
        </div>
        <div class="flex items-start gap-4 my-3">
            <img class="w-6" src="../../../assets/icones/icons8-téléphone-80.png" alt="">
            <p>{{user.tele}}</p>
        </div>
        <button @click.prevent="deletUser(user.id)">
            <img class="w-12 mt-12 " src="../../../assets/icones/icons8-supprimer-80.png" alt="">
        </button>
        </div>
    </div>
</section>
</template>

<script>
import axios from 'axios';
export default{
    name: 'UsersAdmin',
    props: ['user'],

    methods:{
        deletUser(){
            const data = new FormData();
            data.append('id', this.user.id);
            axios.post('http://localhost/bestFriendB/MVC/User/deletUser', data)
            // .then(response => {
            // console.log(response.data);
            window.location.reload();
            // })
            
        }
    }
}

</script>