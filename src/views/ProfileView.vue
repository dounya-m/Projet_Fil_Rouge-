<template>
    <section>
        <PostNav/>
    </section>

    <section class="flex flex-col items-center justify-center mt-8">
        <div class=""> 
            <NewPost/>
        </div>
        <div class="flex flex-wrap gap-8 p-8 mt-4 mb-12 border-2 border-gray-50 rounded-2xl justify-center">
            <UserProfile v-for="a in this.post" :key="a.id" :a="a"/>
        </div>
    </section>

</template>

<script>
import PostNav from '../components/PostNav.vue'
import UserProfile from '../components/UserProfile.vue'
import axios from 'axios';
import NewPost from '../components/pages_pages/NewPost.vue';

export default{
    // name: ProfileView,
    components: {
        PostNav,
        UserProfile,
        NewPost
    },
    data(){
        return{
            // user_id : localStorage.getItem('token'),
            post: []
        }
    },
        async mounted() {
            let id = localStorage.getItem('token');
                const formData = new FormData();
                formData.append('id_user', id);
                await axios({
                    method: 'post',
                    url: 'http://localhost/bestFriendB/MVC/Post/UserPostes',
                    data: formData,
                    })
                .then(response => {
                    this.post = response.data
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                })
        },
}
</script>

<style>

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
        padding-bottom: 8rem;
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