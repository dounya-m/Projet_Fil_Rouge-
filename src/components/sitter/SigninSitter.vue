<template>
    <div class="mt-12">

        <form class="flex flex-col items-center justify-center" v-on:submit.prevent="Add()">

        <div class="flex gap-3">
            <routerLink to="/allsitter" class="p-2 text-white rounded-lg w-36 bg-emerald-300 hover:bg-emerald-500"> see all sitter</routerLink>
            <routerLink to="/loginsitter" class="p-2 border-2 rounded-lg w-36 text-emerald-300 border-emerald-300 hover:bg-emerald-50"> get login</routerLink>
        </div>

                <section class="flex flex-col gap-6 p-10 my-4 border-2 shadow-lg w-fit border-gray-50 border-collaps rounded-3xl form_sitter">
        <div class="flex gap-6 row_table ">
            
            <div class="flex flex-col items-start ">
                <label for="">First Name</label>
                <input v-model="nom" class="border-b-2 input_row" type="text">
            </div>
            <div class="flex flex-col items-start">
                <label for="">Last Name</label>
                <input v-model="prenom" class="border-b-2 input_row" type="text">
            </div>
            
        </div>

        <div class="flex gap-6 row_table">
            
            <div class="flex flex-col items-start">
                <label for="">Your Email</label>
                <input v-model="email" class="border-b-2 input_row" type="email" required>
            </div>
            <div class="flex flex-col items-start">
                <label for="">Your Number</label>
                <input v-model="tel" class="border-b-2 input_row" type="number" required>
            </div>
            
        </div>

        <div>
            <select class="block w-auto py-2 text-sm text-gray-800 bg-transparent border-0 border-b-2 border-gray-200 input_col appearan ce-none dark:text-gray-400 dark:border-gray-200 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                name="ville" id="" v-model="ville" ref="">
                <option value="" selected>Your City</option>
                <option  v-for="i in data" :key="i.city" :value="i.city">{{i.city}}</option>
            </select>
        </div>
        
        <div class="flex flex-col items-start">
            <label for="">Your Adress</label>
            <input v-model="adress" class="border-b-2 input_col" type="text" required>
        </div>

        <div class="flex flex-col items-start">
            <label for="about" class="block text-sm font-medium text-gray-700">
                Description
            </label>
            <textarea id="about" name="about" v-model="description" required rows="3" cols="50" maxlength="250"
            class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your description...">
            </textarea>
        </div>

        <div class="flex gap-6">
            <div class="flex flex-col items-start">
                <label for="">Password</label>
                <input v-model="password" class="border-b-2 input_row" type="password" required>
            </div>
            <div class="flex flex-col items-start">
                <label for="">Confirm Password</label>
                <input  class="border-b-2 input_row" type="password" required>
            </div>
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
                    <input id="file-upload"  ref="file"  type="file" v-on:change="uploadFile()" name="ps_profile"  class="sr-only" required>
                    </label>
                    <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">
                    PNG, JPG, GIF up to 10MB
                </p>
                </div>
            </div>
        </div>

            <div class="w-full p-2 font-semibold text-white bg-yellow-400 rounded-lg hover:bg-yellow-500">
                <button type="submit" class="">
                    Share
                </button>
            </div>
            <p>I have account ? <router-link to="/loginsitter" class="font-semibold text-amber-500">get login.</router-link> </p>
    </section>
    </form>
    </div>
</template>

<script>
import axios from 'axios';
import jsonData from '../../assets/city.json';

export default {
    name: 'SigninSitter',
    data() {
        return {
            data: jsonData,
            sitter: [],
            nom: '',
            prenom: '',
            email: '',
            phone: '',
            ps_profile: '',
            ville: '',
            adress: '',
            description: '',
            password: '',
        }
    },

    methods: {
        uploadFile() {
            this.ps_profile = this.$refs.file.files[0];
            // console.log(this.ps_profile);
        },

        Add(){
            const formData = new FormData();
            formData.append('nom', this.nom);
            formData.append('prenom', this.prenom);
            formData.append('email', this.email);
            formData.append('phone', this.phone);
            formData.append('ps_profile', this.ps_profile);
            formData.append('ville', this.ville);
            formData.append('adress', this.adress);
            formData.append('description', this.description);
            formData.append('password', this.password);
            axios({
                method: 'post',
                url: 'http://localhost/bestFriendB/MVC/Sitter/addSitter',
                data: formData,
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
            })
            .then(Response => {
                    console.log(Response.status);
                    this.sitter = Response.data;  
                {
                    if(Response.data == true){
                    this.$router.push('/allsitter');
                    }else{
                    this.data == false,
                    alert('Please select file');
                    }
                }
                })

            
            
        }
    }

}
</script>