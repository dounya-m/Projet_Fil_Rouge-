<template>
    <div>

        <NavBare/>

    </div>
    <div>
        <input type="recherche" placeholder="put your city here" v-model="this.search" 
        class="w-2/12 p-2 border-b-2">
    </div>
    <div class="flex flex-wrap justify-center gap-4 mx-10 mt-48">

        <SiterCard v-for="a in filterCard" :key="a.id" :a="a"/>

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
        SiterCard,
       
    },
    data(){
        return{
            card: [],
            search : ''
        }
    },
    mounted(){
            axios.get('http://localhost/bestFriendB/MVC/Sitter/allSitters')
            .then(response => {
                this.card = response.data;
                console.log(this.card);
            })
    },
    computed:{
    // function to filtre 
    filterCard : function(){
        return this.card.filter((car)=>{
            return car.ville.match(this.search)
        });
    },
}
}

</script>