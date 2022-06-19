<template>
<div class="flex">
    <section>
        <SideBare/>
    </section>

    <section class="flex flex-wrap justify-center gap-3">
        <UsersAdmin  v-for="user in this.users" :key="user" :user="user" />
    </section>
</div>
</template>


<script>
import axios from 'axios'
import SideBare from '../components/admin/SideBare.vue'
import UsersAdmin from '/src/components/admin/users/Usersadmin.vue'
export default{
    name: 'UsersView',
    components: {
        SideBare,
        UsersAdmin
    },
    data(){
        return{
            users : [],
        }
    },
    
    mounted(){
            axios.get('http://localhost/bestFriendB/MVC/User/getAlluser')
            .then(response => {
                this.users = response.data;
                // console.log(this.users);
            })
        
    }
}
</script>