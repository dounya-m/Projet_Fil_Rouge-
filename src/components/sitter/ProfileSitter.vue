<template>
    <div>
        
    <section class="pb-32 heder_sitter">
        <div>
            <NavBare/>
        </div>
        <div v-for="i in this.b" :key="i.id_sit" class="flex flex-col items-center justify-center">
        <img v-bind:src="'../sittersProfile/'+i.ps_profile" class="object-cover w-56 h-56 my-3 rounded-full" >
        <div>
            <p class="font-semibold">{{i.nom}} {{i.prenom}}</p>
            <p class="font-normal">{{i.email}}</p>
            <p class="font-normal">{{i.phone}}</p>
            <p class="font-normal">{{i.adress}}</p>
            <p class="font-normal">{{i.description}}</p>
        </div>

        <div  v-if="jaime == 0" >
        <button @click.stop.prevent="like()">
            <img src="../../assets/icones/likesitter.png" alt="">
        </button>
        </div>
        
        <div v-else>
        <button  @click.stop.prevent="deleteLike()">
            <img src="../../assets/icones/ressitterLike.png" alt="">
        </button>
        </div>

            <p class="font-medium ">{{allLikes}}</p>
        </div>
    </section>

<section>
    <h1></h1>
    <div v-for="e in this.a" :key="e.id_sit"
    class="flex flex-col justify-center w-4/12 mx-auto my-20 bg-white shadow-sm rounded-2xl shadow-slate-300/60">
        <!-- img -->
        <div class="p-4">
        <small class="text-xs text-blue-400">{{e.date_post}}</small>
        <h1 class="pb-2 text-2xl font-medium text-slate-600"></h1>
        <p class="text-xl font-light leading-6 tracking-tight text-slate-400">{{e.discription}}</p>
        </div>
        <img  v-bind:src="'../sitterPost/' + e.image" class="object-cover object-center w-full aspect-video rounded-b-2xl"/>

    </div>
</section>
    
    </div>
</template>

<script>
import NavBare from '../NavBare.vue';
import axios from 'axios';

export default{
    name: 'SitProfile',
    components:{
        NavBare,
    },

    data(){
        return{
            a: [],
            b: [],
            jaime : null,
            allLikes : null,
        }
    },
    beforeCreate(){
        const formData = new FormData();
        formData.append('id_sitter', this.$route.params.id_sitter);
        axios.post('http://localhost/bestFriendB/MVC/Sitter/profile', formData)
        .then(response => {
            // console.log(response.data);
            this.b = response.data;
        })
    },

    created(){
        // this.$route.params.id_sitter
        const formData = new FormData();
        formData.append('id_sit', this.$route.params.id_sitter);
        axios.post('http://localhost/bestFriendB/MVC/Sitterpost/sitterPostes', formData)
        .then(response => {
            // console.log(response.data);
            this.a = response.data;
        })
    },
        mounted(){
            const data = new FormData();
            data.append('id_user', localStorage.getItem('id_sitter'));
            data.append('id_profile', this.$route.params.id_sitter);
            axios.post('http://localhost/bestFriendB/MVC/Siiterlike/checklike', data)
            .then(response => {
                // console.log(response.data);
                this.jaime = response.data;
            })
        },
        updated(){
            const data = new FormData();
            // data.append('user_id', this.user_id);
            data.append('id_profile', this.$route.params.id_sitter);
            axios.post('http://localhost/bestFriendB/MVC/Siiterlike/couontLike', data)
            .then(response => {
                console.log(response.data);
                this.allLikes = response.data;
                
            })
        },
    methods:{
            like(){
                const data = new FormData();
                data.append('id_user', localStorage.getItem('token'));
                data.append('id_profile', this.$route.params.id_sitter);
                axios.post('http://localhost/bestFriendB/MVC/Siiterlike/addlike', data)
                .then(response => {
                    console.log(response.data);
                    // window.location.reload();
                    this.jaime += 1;
                })
                .catch(error => {
                    console.log(error);
                });
                
            },
            deleteLike(){
                const data = new FormData();
                data.append('id_user', localStorage.getItem('token'));
                data.append('id_profile', this.$route.params.id_sitter);
                axios.post('http://localhost/bestFriendB/MVC/Siiterlike/deleteLike', data)
                .then(response => {
                    console.log(response.data);
                    // window.location.reload();
                    this.jaime -= 1;
                })
            },
    }
}
</script>

<style scoped>
.heder_sitter{
    background: url("../../assets/images/trace.png"), rgba(239, 251, 243, 0.778);
    background-size: cover ;
    background-position: center;
    border-bottom-left-radius: 20rem;
    border-bottom-right-radius: 20rem;
}

</style>