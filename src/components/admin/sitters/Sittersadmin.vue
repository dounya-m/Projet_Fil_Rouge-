<template>
<section class="relative flex flex-col items-center justify-center w-2/12 shadow-md mt-44 h-80 rounded-xl">
    <img class="absolute object-cover w-32 h-32 rounded-full -mt-80" v-bind:src="'../sittersProfile/' + sitter.ps_profile" alt="">
    <div class="flex flex-col items-center gap-6 mt-28">
        <h1 class="text-2xl text-green-600">{{sitter.nom}} {{sitter.prenom}}</h1>
        <div class="">
        <div class="flex items-start justify-start gap-4">
            <img class="w-6 " src="../../../assets/icones/icons8-email-80green.png" alt="">
            <p>{{sitter.email}}</p>
        </div>
        <div class="flex items-start gap-4 my-3">
            <img class="w-6" src="../../../assets/icones/icons8-téléphone-80green.png" alt="">
            <p>{{sitter.phone}}</p>
        </div>
        <div class="flex items-start gap-4 my-3">
            <img class="w-6" src="../../../assets/icones/location.png" alt="">
            <p>{{sitter.ville}}</p>
        </div>
        <div class="flex items-start gap-4 my-3">
            <img class="w-6" src="../../../assets/icones/icons8-stars-60.png" alt="">
            <p>{{sitter.adress}}</p>
        </div>
        <button class="p-2 bg-white rounded-full shadow-md hover:bg-slate-50" @click.prevent="deletSitter(sitter.id)">
            <img class="w-12 " src="../../../assets/icones/icons8-supprimer-80green.png" alt="">
        </button>
        </div>
    </div>
</section>
</template>

<script>
    import axios from 'axios';
export default{
    name: 'SittersAdmin',
    props: ['sitter'],
        methods:{
        deletSitter(){
            const data = new FormData();
            data.append('id_sitter', this.sitter.id_sitter);
            axios.post('http://localhost/bestFriendB/MVC/Sitter/deletSit', data)
            // .then(response => {
            // console.log(response.data);
            window.location.reload();
            // })
            
        }
    }
}

</script>