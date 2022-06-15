<template>

    <PostNav/>
<main class="flex m-16 justify-evenly my-36 post_pages ">
    
    <section class="">
        
    </section>


<!-- main where we showe the posts -->

    <section class="flex flex-col items-center justify-center ">
        <NewPost/>
        <AllPostes/>
    </section>


    
    <!-- side bare fore profile card -->
    <section class="" >
            <ProfiCard/>
    </section>
</main>

</template>


<script>
import PostNav from '../components/PostNav.vue';
import ProfiCard from '../components/pages_pages/ProfilCard.vue';
import NewPost from '../components/pages_pages/NewPost.vue';
import AllPostes from '../components/pages_pages/AllPostes.vue';

export default {
    name: 'PostView',
    components: 
    {
        PostNav,
        ProfiCard,
        NewPost,
        AllPostes
    },
}
</script>