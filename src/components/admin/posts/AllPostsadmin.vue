<template>
<main class="relative flex flex-col gap-2 mt-10 main">
    <section class="flex items-center gap-3 first_section">
        <img class="object-cover w-16 h-16 rounded-full" v-bind:src="'../uploads/' + post.image" alt="">
        <div>
            <div class="flex items-center gap-2">
                <p class="text-lg font-bold">{{post.name}} {{post.lastname}}</p>
                <p class="text-sm font-bold text-yellow-500">{{post.type}},</p>
                <p class="text-sm font-light ">{{post.animalName}}</p>
            </div>
            <div class="flex items-center gap-2">
                <p class="text-xs ">{{post.date}}</p>
                <p class="text-sm ">{{post.ville}}</p>
            </div>
        </div>
    </section>
    <section>
        <p class="text-left">{{post.discription}}</p>
    </section>
    <section class="">
        <img class="petImage" v-bind:src="'../images/' + post.image_post" alt="">
    </section>
    <section class="absolute flex items-center reaction_bar justify-evenly">
        <div class="flex items-center justify-center gap-2">
            <img class="w-10" src="../../../assets/icones/likes.png" alt="">
            <p class="text-lg font-normal text-white">{{this.allLikes}},like</p>
        </div>        
        <div class="flex items-center justify-center gap-2">
            <img class="w-12" src="../../../assets/icones/comment.svg" alt="">
            <p class="text-lg font-normal text-white">{{this.allComments}},comment</p>
        </div>
        <button @click.prevent="deletepost()" class="flex items-center justify-center gap-2">
            <img class="w-12" src="../../../assets/icones/deleteWhite.png" alt="">
        </button>
    </section>
</main>
</template>

<script> 
import axios from 'axios';
export default{
    name: 'AllPostesadmin',
    props: ['post'],
    data(){
        return{
            allLikes : null,
            allComments: null,
        }
    },
        beforeMount(){
            const data = new FormData();
            data.append('id_po', this.post.id_p);
            axios.post('http://localhost/bestFriendB/MVC/Comments/countComment', data)
            .then(response => {
                // console.log(response.data);
                this.allComments = response.data;
            })
            
        },
        updated(){
            const data = new FormData();
            // data.append('user_id', this.user_id);
            data.append('post_id', this.post.id_p);
            axios.post('http://localhost/bestFriendB/MVC/Likes/countLikes', data)
            .then(response => {
                // console.log(response.data);
                this.allLikes = response.data;
                
            })
        },
        methods:{
            deletepost(){
                const data = new FormData();
                data.append('id_p', this.post.id_p);
                axios.post('http://localhost/bestFriendB/MVC/Post/deletePost',data)
                .then(response => {
                    console.log(response.data);
                    window.location.reload();
                })

            },
        }
}

</script>

<style scoped>

.reaction_bar{
        margin-top: 30rem;
        backdrop-filter: blur(15px) grayscale(40%); 
        position: absolute;
        padding: 1vw;
        width: 100%;
        border-radius: 20px;
}
.main{
    height: 35rem;
    padding-bottom: 4rem;
    width: 30rem;
    border: solid 2px rgba(214, 214, 214, 0.561);
    border-radius: 20px;
}
.petImage{
    width: 35rem;
    height: 26rem;
    object-fit: cover;
}
.first_section{
    margin: 1rem;
}
</style>