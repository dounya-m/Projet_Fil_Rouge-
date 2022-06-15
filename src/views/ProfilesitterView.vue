<template>


    <div v-for="a in this.sitter" :key="a.id_sitter">

    <section class="pb-32 bg-emerald-50 heder_sitter">
        <div>
            <NavBare/>
        </div>
        <div class="flex flex-col items-center justify-center">
        <img class="object-cover w-56 h-56 my-3 rounded-full" v-bind:src="'../sittersProfile/' + a.ps_profile ">
        <div>
            <p class="font-semibold">{{a.nom}} {{a.prenom}}</p>
            <p class="font-semibold text-gray-500">{{a.email}}</p>
        </div>
        </div>
    </section>

    </div>
</template>

<style scoped>
.heder_sitter{
    background: url("../assets/images/trace.png"), rgba(236, 255, 243, 0.778);
    background-size: cover ;
    background-position: center;
    border-bottom-left-radius: 10rem;
    border-bottom-right-radius: 10rem;
}

</style>

<script>
import axios from 'axios'
import NavBare from '../components/NavBare.vue'
export default {
    name: 'SitterProfile',
    components: {
        NavBare
    },
    data() {
        return {
            sitter: [],
        }
    },
            mounted() {
            const formData = new FormData();
            formData.append('id_sitter', localStorage.getItem('token'));
            axios.post('http://localhost/bestFriendB/MVC/Sitter/profile', formData)
            .then(response => {
                this.sitter = response.data;
                console.log(this.sitter);
            })
        },


}

</script>