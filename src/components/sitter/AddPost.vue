<template>
    <form v-on:submit.prevent="Add()">
        <div class="flex flex-col items-center w-8/12 gap-5 px-10 m-auto -mt-16 bg-white shadow-md rounded-2xl shadow-slate-200 py-7">
    <label class="block">
      <span class="sr-only">Choose File</span>
      <input type="file" ref="file"  v-on:change="uploadFile()"
      class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"/>
    </label>
    <div class="w-full mx-22">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your Descriotion</label>
        <textarea id="message" rows="4" v-model="discription"
        class="block p-2.5 w-full text-sm text-gray-700 bg-gray-50 rounded-lg border border-gray-100 " placeholder="Write here..."></textarea>
    </div>
    <button class="w-24 p-2 text-white bg-indigo-900 rounded-lg hover:bg-indigo-800" name="submit" type="submit">Send</button>
    </div>
    </form>
</template>

<script>
import axios from 'axios';
export default{
    name: 'AddPost',
    data(){
        return{
            post: [],
        }
        
    },
    methods:{
        uploadFile() {
            this.image = this.$refs.file.files[0];
            console.log(this.image);
        },
        Add(){
        const formData = new FormData();
        formData.append('id_sit', localStorage.getItem('id_sitter'));
        formData.append('discription', this.discription);
        formData.append('image', this.image);
        axios.post('http://localhost/bestFriendB/MVC/Sitterpost/addPost', formData)
        .then(res=>{
            if(res.data.success){
            this.post = res.data;
            window.location.reload()
            
            }else{
                this.post == false,
                alert('error');
            }
        })
        
        
    }
}





}
</script>