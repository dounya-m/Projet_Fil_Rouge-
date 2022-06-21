<template>

<section class="object-cover header_blog">
    <div>
        <NavBare/>
    </div>
    <div class="flex">
        <section class="w-7/12 ">
            
        </section>
        <section class="flex flex-col items-center justify-center mt-28">
            <h1 class="text-white">Take Care Of Your Pet</h1>
            <p>Pets need care and attention to keep them healthy, happy, and safe</p>
        </section>
    </div>

</section>

    <div class="-mt-24 blog_navbar">
        <SingleBlogue/>
    </div>
</template>

<style scoped>
.header_blog{
    background: url('../assets/images/dogpng_Plan.jpg');
    background-size: cover;
    background-position: center;
    height: 45vw;
}
.blog_navbar{ 
    padding-top: 1rem;
    backdrop-filter: blur(15px) grayscale(40%); 

}


</style>
<script>
import SingleBlogue from '../components/blog/SingleBlogue.vue'
import NavBare from '@/components/NavBare.vue'
export default{
    name: 'BlooguserView',
    components:{
    SingleBlogue,
    NavBare
}
}

</script>