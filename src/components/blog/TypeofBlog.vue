<template>
    <div  class="flex flex-col items-center mb-12 border-b-2 border-gray-100 border-b-gray-100">
        <h1 class="mt-6 text-3xl capitalize "> {{blog.titre}}</h1>
        <img class="my-6 image_blog" v-bind:src="'../blog/' + blog.image" alt="">
        <p class="text-left text-gray-600 content">
            {{blog.content.slice(0,100)}}<span class="dots" v-show="!more">...</span>
            <span class="text-gray-800 more" v-show="more">{{blog.content}}</span>
        </p>
        <button href="#" @click="showMore()" class="p-2 text-blue-700">Show More</button>
    </div>
</template>

<style>
.image_blog{
    width: 60%;
}
.content{
    margin-inline: 1rem;
    text-indent: 3rem;
    line-height: 1.8;
}
</style>

<script>
export default{
    name: 'BlogType',
    props: ['blog'],

        data(){
        return{
            more: false,
        }
        
    },

    methods:{
        showMore(){
            this.more = !this.more;
        }
    },
        // computed: {
        //     buttonText: function () {
        //         return this.more ? 'Show Less' : 'Show More';
        //     }
        // }



    
}


</script>