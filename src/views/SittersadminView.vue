<template>
<div class="flex flex-row">
    <section class="fixed z-30 h-full">
        <SideBare/>
    </section>

    <section class="flex flex-wrap justify-center gap-8 pl-[20rem]">
        <SittersAdmin  v-for="sitter in this.sitters" :key="sitter" :sitter="sitter" />
    </section>
</div>
</template>


<script>
import axios from 'axios'
import SideBare from '../components/admin/SideBare.vue'
import SittersAdmin from '/src/components/admin/sitters/Sittersadmin.vue'
export default{
    name: 'UsersView',
    components: {
        SideBare,
        SittersAdmin
    },
    data(){
        return{
            sitters : [],
        }
    },
    
    mounted(){
            axios.get('http://localhost/bestFriendB/MVC/Sitter/allSitters')
            .then(response => {
                this.sitters = response.data;
                // console.log(this.sitters);
            })
        
    }
}
</script>