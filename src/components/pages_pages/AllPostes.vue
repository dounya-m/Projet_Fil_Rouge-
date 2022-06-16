<template>
    <div class="w-full">
        <section class="flex justify-between mx-5 font-semibold my-7 categries_nav">
            <router-link  @click="getAll()" class="p-2 roouterLink text-slate-400 hover:text-slate-500" to="/allpost" class-active="active">All Post</router-link>
            <router-link  @click="getLast()" class="p-2 roouterLink text-slate-400 hover:text-slate-500" to="/last" class-active="active">Last Post</router-link>
            <router-link  @click="getDog()" class="p-2 roouterLink text-slate-400 hover:text-slate-500" to="" class-active="active">Dog</router-link>
            <router-link  @click="getCat()" class="p-2 roouterLink text-slate-400 hover:text-slate-500" to="" class-active="active">Cat</router-link>
            <router-link  @click="getOthers  ()" class="p-2 roouterLink text-slate-400 hover:text-slate-500" to="" class-active="active">Others</router-link>
        </section>
    </div>





<SinglePost v-for="a in this.post" :key="a.id" :a="a"/>

</template>

    
<script>
import axios from 'axios';
import SinglePost from './singlePostes/SinglePost.vue';

    export default
    {
        name: 'AllPostes',
        components: {
            SinglePost,
        },
        data(){
            return{
                post : [],
                user_id : localStorage.getItem('token'),
                underLine : ''
            }
        },

        mounted() {
             this.getAll()
                
        },
        methods:{
            getAll(){
                    axios.get('http://localhost/bestFriendB/MVC/Post/geAlltPosts')
                    .then(response => {
                        this.post = response.data;
                        console.log(this.post);
                    })
                    .catch(error => {
                        console.log(error);
                    })
                    this.underLine = 'all'
            },
            getLast(){
                    axios.get('http://localhost/bestFriendB/MVC/Post/lastPost')
                    .then(response => {
                        this.post = response.data;
                        console.log(this.post);
                    })
                    .catch(error => {
                        console.log(error);
                    })
                    this.underLine = 'last'
            },
            getDog(){
                    axios.get('http://localhost/bestFriendB/MVC/Post/dogPost')
                    .then(response => {
                        this.post = response.data;
                        console.log(this.post);
                    })
                    .catch(error => {
                        console.log(error);
                    })
                    this.underLine = 'dog'
            },
            getCat(){
                    axios.get('http://localhost/bestFriendB/MVC/Post/catPost')
                    .then(response => {
                        this.post = response.data;
                        console.log(this.post);
                    })
                    .catch(error => {
                        console.log(error);
                    })
                    this.underLine = 'cat'
            },
            getOthers(){
                    axios.get('http://localhost/bestFriendB/MVC/Post/otherPost')
                    .then(response => {
                        this.post = response.data;
                        console.log(this.post);
                    })
                    .catch(error => {
                        console.log(error);
                    })
                    this.underLine = 'other'
            },
        }


    }

</script>




<style>
    .roouterLink:hover{
        border-bottom: solid 4px #DBF6E9;
    }


</style>