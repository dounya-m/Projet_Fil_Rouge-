<template>
<main class="flex">
    <section>

            <SideBare/>
</section>
    <section class="w-11/12 h-screen p-4 mt-16">
        <form v-on:submit.prevent="add()" class="flex flex-col gap-7">

            <select class="w-3/12 h-12 p-2 bg-transparent border-b-2 border-slate-100" name="" id="" v-model="about">
                <option value="" selected>Select a category</option>
                <option value="dog">Dog </option>
                <option value="cat">Cat</option>
                <option value="others">Others</option>
            </select>
            <label class="flex flex-col text-left" for="">
                Your Title
                <input v-model="titre" class="w-5/12 h-12 p-2 border-b-2 border-slate-100" type="text" name="" id="" placeholder="Title">
            </label>
            <label class="flex flex-col w-full text-left" for="">
                Your Content
                <textarea v-model="content" class="w-10/12 p-2 bg-slate-50" name="" id="" cols="30" rows="10" placeholder="Write Your Content here..."></textarea>
            </label>
            <label class="block">
                <span class="sr-only">Choose File</span>
                <input ref="file"  type="file" v-on:change="uploadFile()" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
            </label>
            <button class="w-1/12 p-2 text-white bg-blue-800 rounded-lg hover:bg-blue-600">Send</button>

        </form>
    </section>
</main>
</template>

<script>
import SideBare from '../components/admin/SideBare.vue';
import axios from 'axios';
// import { FOR_INIT_KEYS } from '@babel/types';

export default{
    name: 'BlogView',
    components:{
        SideBare
    },
    data(){
        return{
            blog:[]
        }
    },
    methods:{
        uploadFile() {
            this.image = this.$refs.file.files[0];
            console.log(this.image);
        },
        add(){
            const data = new FormData();
            data.append('about',this.about);
            data.append('titre',this.titre);
            data.append('content',this.content);
            data.append('image',this.image);
            axios.post('http://localhost/bestFriendB/MVC/Blog/addBlog', data)
            .then(response => {
                // console.log(response.data);
                this.blog = response.data;
                window.location.reload();
            })
        }
    }
}

</script>