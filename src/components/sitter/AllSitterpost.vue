<template>

  <!-- card -->
  <div class="flex flex-col justify-center w-5/12 mx-auto my-20 bg-white shadow-sm rounded-2xl shadow-slate-300/60">
    <!-- img -->
    <img class="object-cover object-center w-full aspect-video rounded-t-2xl" 
     v-bind:src="'../sitterPost/'+i.image" />
    <div class="p-4">
      <small class="text-xs text-blue-400">{{i.date_post}}</small>
      <h1 class="pb-2 text-2xl font-medium text-slate-600"></h1>
      <p class="text-2xl font-light leading-6 tracking-tight text-slate-400">{{i.discription}}</p>
      <img @click="deletepost()" src="../../assets/icones/deleteSiter.png" alt="">
    </div>
  </div>

</template>

<script>
    import axios from 'axios'

export default{
    name: 'SitterPoste',
    props: ['i'],
    
    methods:{
        deletepost(){
            const formData = new FormData();
            formData.append('id_post', this.i.id_post);
            axios.post('http://localhost/bestFriendB/MVC/Sitterpost/deletePost', formData)
            .then(response => {
                console.log(response.data);
                window.location.reload()
            })
            
        }
    }
}

</script>