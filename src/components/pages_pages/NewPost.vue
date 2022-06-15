<template>

    <div class="newPost_section">
    <div class="mb-10 ">
        <div class="mt-5 md:mt-0 md:col-span-2">

        <form  v-on:submit.prevent="Add()">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">

                    <div class="flex mt-1 rounded-md shadow-sm">
                    <select  class="py-2 text-sm text-gray-800 bg-transparent border-0 border-b-2 border-gray-200 w-26 appearan ce-none dark:text-gray-400 dark:border-gray-200 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                            name="type" id="type" v-model="type">
                            <option value="" selected>Animal Type</option>
                            <option value="dog">Dog</option>
                            <option value="Cat">Cat</option>
                            <option value="other">Other</option>
                    </select>
                    <input type="text" v-model="animalName"
                    class="flex-1 block w-full ml-8 border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm" placeholder="Your pet Name">

                    </div>
                </div>
                </div>

                <div>
                <label for="about" class="block text-sm font-medium text-gray-700">
                    Description
                </label>
                <div class="mt-1">
                    <textarea id="about" name="about" rows="3" v-model="discription"
                    class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your description...">
                    </textarea>
                </div>
                </div>


                <div class="flex items-center mt-1">
                    <img class="w-10 mr-4" src="../../assets/icones/position2.png" alt="">

                        <select class="block w-auto py-2 text-sm text-gray-800 bg-transparent border-0 border-b-2 border-gray-200 appearan ce-none dark:text-gray-400 dark:border-gray-200 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                        name="ville" id="" v-model="ville">
                            <option value="" selected>Your City</option>
                            <option  v-for="i in data" :key="i.city" :value="i.city">{{i.city}}</option>
                        </select>
                    
                </div>


                <div>
                <label class="block text-sm font-medium text-gray-700">
                    Cover photo
                </label>
                <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="True">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative font-medium text-green-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span>Upload a file</span>
                        <input id="file-upload" ref="file"  type="file" v-on:change="uploadFile()" name="image_post"  class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG, GIF up to 10MB
                    </p>
                    </div>
                </div>
                </div>
                
            </div>
            <div class="px-4 py-3 text-right ">

                    <button type="submit" class="flex items-center justify-end p-1 font-semibold text-white rounded-lg bg-emerald-300 hover:bg-emerald-400">
                        <img class="w-8 " src="../../assets/icones/send.png" alt="">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                        Share
                    </button>
            </div>
            
            </div>
        </form>


        </div>
    </div>
    </div>

</template>


<style>

    .newPost_section{
        /* padding-top: 2rem ; */

        width: 49rem;

    }
</style>

<script>
import jsonData from '../../assets/city.json';
import axios from 'axios';
export default{
    name: 'NewPost',
    data()
    {
        return{
            image: localStorage.getItem('image'),
            post: [],
            data: jsonData,
            image_post: '',
            type: '',
            animalName: '',
            ville: '',
            discription: '',
            id_user: localStorage.getItem('token'),
        }
    },

    methods:{
        uploadFile() {
            this.image_post = this.$refs.file.files[0];
            console.log(this.image_post);
        },
        Add(){
        
            const formData = new FormData();
            formData.append('image_post', this.image_post);
            formData.append('type', this.type);
            formData.append('animalName', this.animalName);
            formData.append('ville', this.ville);
            formData.append('discription', this.discription);
            formData.append('id_user', this.id_user);
            axios({
                method: 'post',
                url: 'http://localhost/bestFriendB/MVC/Post/newPost',
                data: formData,
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
            })
            .then(Response => {
                    console.log(Response.status);
                    console.log(Response.data);
                {
                window.location.reload();
                }
                })
                .catch(error => {
                    console.log(error);
                });

        },
        UploadeImage(event) {
        {
            this.selectedFile = event.target.files[0];
        }
        },
        
    },
            async mounted() {
            await axios.get(`http://localhost/bestFriendB/MVC/User/getOneUser/${localStorage["token"]}`)	
                .then(response => {
                    this.user = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
}
</script>

<!-- <style> -->
    /* <!-- <div>
        <form class="flex flex-col justify-center"  v-on:submit.prevent="Add()">
        
            <div class="flex items-center w-11/12 gap-6 card_firstPart">
                <img class="w-16 h-16 rounded-full" v-bind:src="'../uploads/' + this.image">
                <textarea class="w-5/12 p-4 rounded-md resize-none h-36 bg-slate-50"  placeholder="Text..." v-model="discription"></textarea>
        </div>
        -->
        <!-- <div class="flex flex-col items-center justify-center w-7/12 w-11/12 card_secondPart">
            
                <input class="block py-2 text-sm text-gray-800 bg-transparent border-0 border-b-2 border-gray-200 w-26 appearan ce-none dark:text-gray-400 dark:border-gray-200 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                type="text" v-model="animalName" placeholder="Your Animal Name"> -->


            <!-- <select  class="block py-2 text-sm text-gray-800 bg-transparent border-0 border-b-2 border-gray-200 w-26 appearan ce-none dark:text-gray-400 dark:border-gray-200 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
            name="type" id="type" v-model="type">
                <option value="" selected>Animal Type</option>
                <option value="dog">Dog</option>
                <option value="Cat">Cat</option>
                <option value="other">Other</option>
            </select> -->


<!-- 

        <label for="dropzone-file" class="flex flex-col items-center justify-center rounded-lg cursor-pointer ">
                <span class="flex items-center w-20 h-20 px-2 text-green-300 transition duration-300 ease-out rounded-full cursor-pointer hover:bg-secondary-brn hover:text-green-400 bg-primary-btn">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" 
                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                </span>
                <input type="file" ref="file" id="dropzone-file" v-on:change="uploadFile()" name="image_post" class="hidden">
                </label> -->
            <!-- <input class="bg-white border-0" type="file" ref="file" id="" v-on:change="uploadFile()" name="image_post"> -->
<!-- 
                <button type="submit" class="flex items-center p-1 font-semibold text-white rounded-lg bg-emerald-300 hover:bg-emerald-400">
                     <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"> -->
                    <!-- <img class="w-8 " src="../../assets/icones/send.png" alt="">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    Share
                </button> -->
        <!-- </div>
        </form>
    </div>  -->
<!-- //testing new style --> */
