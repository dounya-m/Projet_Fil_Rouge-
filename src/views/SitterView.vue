<template>
 <header class="h-screen header_sitter">
    <div class="absolute z-10 w-screen">
        <NavBare/>
    </div>
    <section class="flex">

        <div class="w-1/2 ">
            
        </div>

        <div class="right-0 flex flex-col items-center justify-center object-right w-1/2 gap-4 bg-white background_heaer">
            <h1 class="font-extrabold text-yellow-400"> Pet sitters </h1>
            <h3 class="text-5xl font-bold leading-tight">here you find who takes care of your animal</h3>
            <p class="text-blue-900 ">we have many profiles many opinions just make the best choice 
                and choose who will take care of your pet contact him for more information, 
                if you are a sitter join our community and create your profile here
            </p>
            <div class="flex flex-wrap items-center justify-start gap-2">
                <router-link to="/allsitter" class="w-32 p-2 text-white bg-yellow-400 rounded-lg">I need sitter</router-link>
                <router-link to="/form" class="w-32 p-2 text-yellow-400 border-2 border-yellow-400 rounded-lg">I'm sitter </router-link>
            </div>
        </div>
        
    </section>
</header>


</template>

<style scoped>
h1{
    width: 25rem;
}
p{
    width: 27rem;
}
h3{
    width: 27rem;
}
.header_sitter{
    background: url("../assets/images/header.jpg");
    width: 100%;
    height: 100vh;
    background-position: center;
    background-repeat: no-repeat; ;
    background-size: cover;
/* height: 100%; */
}
.background_heaer{
    height: 100vh;
    padding: 22rem;
    -moz-border-radius-bottomleft: 25rem 75rem;
    border-bottom-left-radius: 25rem 50rem;
    box-shadow: -12px 1px 20px 0px #0000001c;

}

</style>

<script>
import NavBare from '../components/NavBare.vue';
    export default{
        name: 'SitterView',
        components: {
            NavBare
        },
    }

</script>