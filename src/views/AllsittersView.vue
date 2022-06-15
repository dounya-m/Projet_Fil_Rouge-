<template>
    <div>

        <NavBare/>

    </div>

    <div class="flex flex-wrap justify-center gap-4 mx-10 mt-48">

        <SiterCard v-for="a in this.card" :key="a.id" :a="a"/>

    </div>
</template>

<script>
import axios from 'axios';
import NavBare from '../components/NavBare.vue';
import SiterCard from '../components/sitter/SiterCard.vue' 
export default{
    name: 'AllsittersView',
    components:{
        NavBare,
        SiterCard
    },
    data(){
        return{
            card: []
        }
    },
    mounted(){
            axios.get('http://localhost/bestFriendB/MVC/Sitter/allSitters')
            .then(response => {
                this.card = response.data;
                console.log(this.card);
            })
    }
}

</script>