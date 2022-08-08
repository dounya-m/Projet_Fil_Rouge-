<template>
    <div class="flex">
    <section class="fixed ">
        <SideBare/>
    </section>

    <section class="flex flex-wrap justify-center gap-4 ml-9 pl-[14rem] mb-8">
        <AllPostesadmin v-for="post in this.postes" :key="post.id_p" :post="post"/>
    </section>
    </div>
</template>
<script>
import axios from 'axios';
import SideBare from '../components/admin/SideBare.vue';
import AllPostesadmin from '../components/admin/posts/AllPostsadmin.vue';
export default{
    name: 'PostadminView',
    components: {
        SideBare,
        AllPostesadmin
    },
    data(){
        return{
            postes: [],
        }
    },
    mounted() {
        axios.get('http://localhost/bestFriendB/MVC/Post/geAlltPosts')
        .then(response => {
            this.postes = response.data;
            console.log(this.postes);
        })
    },

}
</script>