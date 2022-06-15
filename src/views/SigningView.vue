<template>

    <div class="flex items-center mt-20 gap-60 signing">
        <div>
            <img class=" dog" src="../assets/images/dogDoudi.png" alt="">
        </div>
        <form class="flex flex-col items-center gap-14" v-on:submit.prevent="Add()">
            <router-link to="/" class="w-40 ">
                <img src="../assets/images/logo.png" alt="">
            </router-link>
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div class="flex flex-col">
                    <label class="text-left text-indigo-900 " for="firstname">First name</label>
                    <input class="h-1 p-4 border rounded-lg w-72 " type="text" name="name" v-model="name" required>
                </div>
                <div class="flex flex-col">
                    <label class="text-left text-indigo-900 " for="firstname">Last name</label>
                    <input class="h-1 p-4 border rounded-lg w-72 " type="text" name="lastname" v-model="lastname" required>
                </div>

                <div class="flex flex-col">
                    <label class="text-left text-indigo-900 " for="firstname">Phone number</label>
                    <input class="h-1 p-4 border rounded-lg w-72 " type="number" name="tele" v-model="tele" required>
                </div>
                <div class="flex flex-col">
                    <label class="text-left text-indigo-900 " for="firstname">Email</label>
                    <input class="h-1 p-4 border rounded-lg w-72 " type="email" name="email" v-model="email" required>
                </div>
                <div class="flex flex-col">
                    <label class="text-left text-indigo-900 " for="firstname">Password</label>
                    <input class="h-1 p-4 border rounded-lg w-72 " type="password" id="myInput" name="password" v-model="password" required>
                    <input type="checkbox" onclick="myFunction()">Show Password
                </div>
                <div class="flex flex-col">
                    <label class="text-left text-indigo-900 " for="firstname">Confirm password</label>
                    <input class="h-1 p-4 border rounded-lg w-72 " type="password" id="myInput" required>
                    <input type="checkbox" onclick="myFunction()">Show Password
                </div>
                <!-- <div class="flex flex-col">
                    <label class="text-left text-indigo-900 " for="firstname">Image</label>
                    <input class="h-2 p-6 border rounded-lg w-72 " type="file" id="file" ref="file"
                        v-on:change="uploadFile()" name="iamge">
                </div> -->

                    <label class="block">
                        <span class="sr-only">Choose File</span>
                        <input type="file" id="file" ref="file" v-on:change="uploadFile()" name="iamge" 
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-500 hover:file:bg-emerald-100"/>
                    </label>
                
            </div>
            <button type="submit" class="w-3/4 h-10 text-white rounded-lg bg-emerald-300 hover:bg-emerald-400 ">Create
                account</button>
                <p>Already have account? <router-link class="font-semibold text-blue-900" to="/login">Sign In.</router-link> </p>
        </form>
    </div>
</template>


<script>
import axios from 'axios';
// import swal from 'sweetalert'
export default {
    name: 'SigningView',
    date() {
        return {
            name: '',
            lastname: '',
            tele: '',
            Images: '',
            email: '',
            password: ''
        }
    },

    methods:
    {
        uploadFile() {
            this.Images = this.$refs.file.files[0];
            console.log(this.Images);
        },
        Add() {
            const formData = new FormData();
            formData.append('image', this.Images);
            formData.append('name', this.name);
            formData.append('lastname', this.lastname);
            formData.append('tele', this.tele);
            formData.append('email', this.email);
            formData.append('password', this.password);
            axios({
                method: 'post',
                url: 'http://localhost/bestFriendB/MVC/User/addUsers',
                data: formData,
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(Response => {
                    console.log(Response.status);
                    console.log(Response.data);
                    this.$router.push('/login');
                })
                .catch(error => {
                    console.log(error);
                    this.$swal("Yours Account Created Successfully");
                });
            // {
            //   // localStorage.setItem('id',this.id);
            // this.$router.push('/post');
            // }

        },

        UploadeImage(event) {
        {
            this.selectedFile = event.target.files[0];
        }

        },

    },
}
</script>