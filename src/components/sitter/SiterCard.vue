<template>

<section class="shadow-md sitter_card rounded-xl mb-28">
<div role="listitem" class="relative ">
    <div class="overflow-hidden bg-white ">
        <div class="absolute flex justify-center w-full -mt-20">
            <div class="w-32 h-32">
                <img class="object-cover w-full h-full rounded-full shadow-md" 
                v-bind:src="'../sittersProfile/' + a.ps_profile"/>
            </div>
        </div>
        <div class="flex flex-col items-center px-6 mt-16">
            <h1 class="mb-1 text-3xl font-bold text-center">{{a.nom}} {{a.prenom}}</h1>
            <p class="text-sm text-center text-gray-800">{{a.ville}}</p>
            <p class="text-sm text-center text-gray-800">{{a.adress}}</p>
            <p class="pt-3 text-base font-normal text-center text-gray-600 discription">
                {{a.description}}
            </p>
            <div class="flex items-center justify-center p-2 my-4 text-white bg-green-300 rounded-md w-28 hover:bg-green-200">
                <a :href="'/siterpro/'+a.id_sitter">Show Profile</a>
            </div>
        </div>
    </div>
</div>
</section>

</template>
<style scoped>
.discription{
    height: 6rem;
}
    .sitter_card{
        width: 20rem;
        height: 20rem ;
    }
</style>
<script>
export default{
    name: 'SiterCard',
    props: ['a'],
        data(){
    return{
        
        };
    },
    methods:{
    
      
    },
}
</script>