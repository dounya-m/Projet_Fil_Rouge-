<template>
<form class="flex flex-col items-center justify-center">
        <section class="absolute z-20 hidden" :id="'commentPost'+a.id_p">
            <button  @click="showComments(a.id_p)" 
            class="w-10 h-10 p-2 mb-2 font-normal text-gray-200 border-2 border-gray-200 rounded-full hover:text-red-600 hover:border-red-600">
                    X
            </button>
            <CommentPost :a="a"/>
        </section>
        
        <section  v-if="hover"  class="absolute z-10 ">
            <UserCard :a="a"/>
        </section>
        
        <section class="flex flex-col justify-center mb-24 card_section">
            
        <div class="flex items-center gap-3 mt-6 user_info">

            <img
            @mouseenter="hover = true"
            @mouseleave="hover = false"
            class="object-cover w-16 h-16 ml-6 rounded-full { 'div-hover': hover }" 
            v-bind:src="'../uploads/' + a.image" alt="">

        <div class="flex-col">
            <div class="flex gap-2">
                <h3 class="text-lg font-bold text-black">{{a.name}} {{a.lastname}},</h3>
                <h3 class="text-lg font-bold text-black"> {{a.type}}</h3>
                <h3 class="text-lg font-normal text-amber-400">{{a.animalName}}</h3>
            </div>
            <div class="flex gap-1 mt-2">
                <p class="text-sm font-normal text-gray-500">{{a.date}}</p>
                <p class="text-sm font-extrabold text-gray-500">.</p>
                <p class="text-sm font-normal text-gray-500">{{a.ville}}</p>
            </div>

        </div> 

    </div>

    <div class="flex flex-col mx-6 Post_discription">
        <p class="w-9/12 my-4 text-lg font-medium text-left text-gray-400 mr-9">
            {{a.discription}}
        </p>
        <img class="w-1/2 h-3/4 photo" v-bind:src="'../images/' + a.image_post"  alt="">        
    </div>

    <div class="flex element justify-evenly">
        <div class="flex items-center gap-3 ">
            <button v-if="jaime == 0" @click.stop.prevent="like(a.id_p)" class="p-2 border-2 border-white rounded-full ">
                <img class="w-10 " src="../../../assets/icones/likes.png" alt="">
            </button>
            <button v-else @click.stop.prevent="deleteLike(a.id_p)" class="p-2 border-2 border-red-500 rounded-full ">
                <img class="w-10 " src="../../../assets/icones/likesRed.png" alt="">
            </button>
            <p class="font-medium text-white ">{{allLikes}} Like</p>
        </div>

        
        <div class="flex items-center gap-3">
            <button @click="showComments(a.id_p)" class="p-2 border-2 border-white rounded-full wx-10">
                <img class="w-10 " src="../../../assets/icones/comment.svg" alt="">
            </button>
            <p class="font-medium text-white ">{{allComments}} Comment</p>
        </div>

        <!-- <button class="p-2 border-2 border-white rounded-full">
                <img class="w-10 " src="../../../assets/icones/star.svg" alt="">
        </button> -->
    </div>
</section>

</form>


</template>


<script>
import axios from 'axios';
import CommentPost from './CommentPost.vue';
import UserCard from './UserCard.vue';

export default {
    name: 'SinglePost',
    components: {
        CommentPost,
        UserCard
    },
    props: ['a'],
    data(){
        return{
            hover: false,
            user_id : localStorage.getItem('token'),
            jaime : null,
            allLikes : null,
            allComments: null,
        }
    },
            methods:{
                showComments(id){
                const commnet = document.getElementById('commentPost'+id);
                commnet.classList.toggle('hidden');
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
    .photo{
        width: 60rem;
        height: 40rem;
        object-fit: cover;
        border-radius: 0.5rem;
        background-position: center;
        
    }

    .card_section{
        /* padding-top: 2rem ; */
        /* padding: 2rem; */
        padding-bottom: 2rem;
        width: 49rem;
        border: 3px solid rgba(240, 240, 240, 0.535);
        border-radius: 1rem;
        position: relative;
    }
    .element{
        backdrop-filter: blur(15px) grayscale(40%); 
        position: absolute;
        padding: 2vw;
        margin-top: 46rem;
        width: 100%;
        ;
    }
</style>