<template>

    <div class="w-full">
        <section class="flex mx-5 font-semibold justify-evenly my-7 categries_nav">
            <router-link  @click="getAll()" class="p-1 all roouterLink text-slate-800 :hover:text-slate-500 hover:border-b-4 hover:border-b-sky-500" to="" class-active="active">All Articeles</router-link>
            <router-link  @click="lastBlog()" class="p-1 roouterLink text-slate-800 :hover:text-slate-500 hover:border-b-4 hover:border-b-sky-500" to="" class-active="active">Last Articeles</router-link>
            <router-link  @click="dogBlog()" class="p-1 roouterLink text-slate-800 :hover:text-slate-500 hover:border-b-4 hover:border-b-sky-500" to="" class-active="active">About dog</router-link>
            <router-link  @click="catBlog()" class="p-1 roouterLink text-slate-800 :hover:text-slate-500 hover:border-b-4 hover:border-b-sky-500" to="" class-active="active">About Cat</router-link>
            <router-link  @click="othersBlog()" class="p-1 roouterLink text-slate-800 :hover:text-slate-500 hover:border-b-4 hover:border-b-sky-500" to="" class-active="active">About Others</router-link>
        </section>
        <section class="flex flex-col justify-center mt-6">
            <BlogType v-for="blog in this.blog" :key="blog" :blog="blog"/>
        </section>
    </div>

</template>

<script>
import axios from 'axios';
import BlogType from './TypeofBlog.vue';
export default{
    name: 'SingleBlogue',
    components:{
        BlogType,
    },
        data(){
        return{
            blog: [],
            more: false,
        }
        
    },
    methods:{
        getAll(){
            axios.get('http://localhost/bestFriendB/MVC/Blog/allBlog')
            .then(res=>{
                this.blog = res.data;
            })
        },
        lastBlog(){
            axios.get('http://localhost/bestFriendB/MVC/Blog/lastBlog')
            .then(res=>{
                this.blog = res.data;
            })
        },
        dogBlog(){
            axios.get('http://localhost/bestFriendB/MVC/Blog/dogBlog')
            .then(res=>{
                this.blog = res.data;
            })
        },
        catBlog(){
            axios.get('http://localhost/bestFriendB/MVC/Blog/catBlog')
            .then(res=>{
                this.blog = res.data;
            })
        },
        othersBlog(){
            axios.get('http://localhost/bestFriendB/MVC/Blog/othersBlog')
            .then(res=>{
                this.blog = res.data;
            })
        },
    }
}

</script>