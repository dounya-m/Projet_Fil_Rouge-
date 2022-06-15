<template >
    <div>
        <form class="flex items-center justify-center ">
            
        <section class="absolute z-20 hidden comment_user" :id="'commentPost'+a.id_p">
            <button @click="showComments(a.id_p)" class="w-10 h-10 p-2 mb-2 font-normal text-gray-300 border-2 border-gray-300 rounded-full hover:border-red-500 hover:text-red-500">
                    X
            </button>
            <CommentPost :a="a"/>
            </section>

        
        <section class="flex flex-col justify-center mb-24 card_userProfile">

        <div class="flex items-center gap-6 mt-6 justify-items-stretch user_info">

            <img class="object-cover w-16 h-16 ml-6 rounded-full" v-bind:src="'../uploads/' + a.image" alt="">

        <div class="flex-col">
            <div class="flex gap-2">
                <h4 class="text-base font-bold text-black font-bmold">{{a.name}} {{a.lastname}},</h4>
                <h4 class="text-base font-bold text-black"> {{a.type}}</h4>
                <h4 class="text-sm font-normal text-amber-400">{{a.animalName}}</h4>
            </div>
            <div class="flex gap-1 mt-2">
                <p class="text-xs font-normal text-gray-500">{{a.date}}</p>
                <p class="text-xs font-extrabold text-gray-500">.</p>
                <p class="text-xs font-normal text-gray-500">{{a.ville}}</p>
            </div>

        </div> 

    </div>

    <div class="flex flex-col mx-6 Post_discription">
        <p class="w-9/12 my-4 text-base font-normal text-left text-gray-400 mr-9">
            {{a.discription}}
        </p>
        <img class="w-1/6 h-2/4 userImages" v-bind:src="'../images/' + a.image_post"  alt="">        
    </div>

    <div class="flex justify-center gap-5 elementUser">
        <div class="flex items-center gap-3 " v-if="jaime == 0" >
            <button @click.stop.prevent="like(a.id_p)" class="p-2 border-2 border-white rounded-full ">
                <img class="w-6 " src="../assets/icones/likes.png" alt="">
            </button>
            <p class="font-medium text-white ">{{allLikes}}</p>
        </div>
        <div class="flex items-center gap-3 " v-else >
            <button @click.stop.prevent="deleteLike(a.id_p)" 
            class="p-2 border-2 border-red-500 rounded-full ">
                <img class="w-6 " src="../assets/icones/likesRed.png" alt="">
            </button>
            <p class="font-medium text-white ">{{allLikes}}</p>
        </div>
        
        
        <div class="flex items-center gap-3">
            <button @click="showComments(a.id_p)" class="p-2 border-2 border-white rounded-full wx-10">
                <img class="w-6 " src="../assets/icones/comment.svg" alt="">
            </button>
            <p class="font-medium text-white ">{{allComments}}</p>
        </div>

        <button class="p-2 border-2 border-white rounded-full">
                <img class="w-6 " src="../assets/icones/star.svg" alt="">
        </button>
        
        <button @click="updatePosteform(a.id_p)"  class=" justify-self-end">
            <img class="w-6" src="../assets/icones/update.png" alt="">
        </button>
        
        <button @click.prevent="deletepost(a.id_p)"  class="justify-self-end ">
            <img class="w-8" src="../assets/icones/deleteWhite.png" alt="">
        </button>
        
    </div>
</section>
            <section  class="absolute hidden formUbdate" :id="'formupdate'+a.id_p" >
            <button @click="updatePosteform(a.id_p)" class="w-10 h-10 p-2 mb-2 font-normal text-gray-100 border-2 border-gray-100 rounded-full hover:border-red-500 hover:text-red-500">
                    X
            </button>
            <div>
                <UpdateForm :a="a"/>
            </div>
            </section>

</form>
    </div>
</template>

<script>
import UpdateForm from './pages_pages/singlePostes/UpdateForm.vue'
import CommentPost from './pages_pages/singlePostes/CommentPost.vue'
import axios from 'axios';
    export default{
        name: 'UserProfile',
        components:{
            UpdateForm,
            CommentPost,
        },
        props: ['a'],

        data(){
            return{
                user_id: localStorage.getItem('token'),
                jaime : null,
                allLikes : null,
            }
        },
        methods:{
                showComments(id){
                const commnet = document.getElementById('commentPost'+id);
                commnet.classList.toggle('hidden');
                },
                updatePosteform(id){
                const commnet = document.getElementById('formupdate'+id);
                commnet.classList.toggle('hidden');
                },
            
            deletepost(id){
                const data = new FormData();
                data.append('id_p', id);
                    axios.post('http://localhost/bestFriendB/MVC/Post/deletePost',data)
                    .then(response => {
                        console.log(response.data);
                        window.location.reload();
                    })

        },


        like(id){
                const data = new FormData();
                data.append('user_id', this.user_id);
                data.append('post_id', id);
                axios.post('http://localhost/bestFriendB/MVC/Likes/addLike', data)
                .then(response => {
                    console.log(response.data);
                    // window.location.reload();
                    this.jaime += 1;
                })
                .catch(error => {
                    console.log(error);
                });
                
            },
            deleteLike(id){
                const data = new FormData();
                data.append('user_id', this.user_id);
                data.append('post_id', id);
                axios.post('http://localhost/bestFriendB/MVC/Likes/deletLike', data)
                .then(response => {
                    console.log(response.data);
                    // window.location.reload();
                    this.jaime -= 1;
                })
            },
        },
        mounted(){
            const data = new FormData();
            data.append('user_id', this.user_id);
            data.append('post_id', this.a.id_p);
            axios.post('http://localhost/bestFriendB/MVC/Likes/checklike', data)
            .then(response => {
                console.log(response.data);
                this.jaime = response.data;
            })
        },
        updated(){
            const data = new FormData();
            // data.append('user_id', this.user_id);
            data.append('post_id', this.a.id_p);
            axios.post('http://localhost/bestFriendB/MVC/Likes/countLikes', data)
            .then(response => {
                console.log(response.data);
                this.allLikes = response.data;
                
            })
        },
            beforeMount(){
            const data = new FormData();
            data.append('id_po', this.a.id_p);
            axios.post('http://localhost/bestFriendB/MVC/Comments/countComment', data)
            .then(response => {
                console.log(response.data);
                this.allComments = response.data;
            })
            
        },


}
</script>

<style scoped>
    .form{
        height: 20rem;
        width: 20rem;
    }

    .board{
    display: flex !important;
    }
    .card_userProfile{
    width: 25rem;
    height: 100%;
    border: 3px solid rgba(240, 240, 240, 0.535);
    border-radius: 1rem;
    position: relative;
    }
    .elementUser{
    backdrop-filter: blur(15px) grayscale(40%); 
    position: absolute;
    padding: 2vw;
    margin-top: 30rem;
    width: 100%;
    }
    .userImages{
    width: 50rem;
    height: 25rem;
    object-fit: cover;
    border-radius: 0.5rem;
    background-position: center;
    
}

</style>