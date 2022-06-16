<template>


    <div v-for="a in this.sitter" :key="a.id_sitter">

    <section class="pb-32 heder_sitter">
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

    <section class="">
        <AddPost/>
    </section>

    <section>
        <SitterPoste v-for="i in this.potes" :key="i.id" :i="i">
        </SitterPoste>
    </section>


    </div>
</template>

<script>
import axios from 'axios'
import NavBare from '../components/NavBare.vue'
import AddPost from '../components/sitter/AddPost.vue'
import SitterPoste from '../components/sitter/AllSitterpost.vue'
export default {
    name: 'SitterProfile',
    components: {
        NavBare,
        AddPost,
        SitterPoste
    },
    data() {
        return {
            sitter: [],
            potes: [],
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
            created(){
                let id_sit = localStorage.getItem('token');
                console.log(id_sit)
                const formData = new FormData();
                formData.append('id_sit', id_sit);
                axios.post('http://localhost/bestFriendB/MVC/Sitterpost/getAllPost', formData)
                .then(res=>{
                    this.potes = res.data;
                    console.log(this.potes);
                })
        }


}

</script>

<style scoped>
.heder_sitter{
    background: url("../assets/images/trace.png"), rgba(239, 251, 243, 0.778);
    background-size: cover ;
    background-position: center;
    border-bottom-left-radius: 20rem;
    border-bottom-right-radius: 20rem;
}

</style>