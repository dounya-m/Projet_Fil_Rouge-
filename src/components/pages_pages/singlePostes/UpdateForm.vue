<template>

    <form v-on:submit.prevent="updatePost()">
            <!-- <div class="w-11/12 shadow sm:rounded-md sm:overflow-hidden"> -->
            <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">

                    <div class="flex mt-1 rounded-md shadow-sm">
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
                    class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your description..." >
                    
                    </textarea>
                </div>
                </div>

                <div>
                <div class="px-4 py-1 text-right ">
                    <button type="submit" @click="updatePosteform(a.id_p)"
                    class="flex items-center justify-end p-1 font-semibold text-white rounded-lg bg-emerald-300 hover:bg-emerald-400">
                        <img class="w-8 " src="../../../assets/icones/send.png" alt="">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                        Share
                    </button>
                </div>
            </div>
            </div>
            </form>
</template>

<script>
import axios from 'axios';
export default{
    name: 'UpdateForm',
    props: ['a'],
    data(){
        return{
            update: '',
            selectedFile : [],
        }
    },
    methods:{
        updatePost()
        {
            
            const formData = new FormData();
            formData.append('id_p', this.a.id_p);
            formData.append('image_post', this.selectedFile);
            formData.append('animalName', this.animalName);
            formData.append('discription', this.discription);
            axios.post('http://localhost/bestFriendB/MVC/Post/updatePost', formData)
            .then(response => {
                console.log(response.data);
                this.update = response.data;
                window.location.reload();
            })
            
            
        },
        UploadeImage(event) {
        {
            this.selectedFile = event.target.files[0];
        }
        },
    }
}

</script>