<template>
    <div>
        <NavBare/>
    </div>

    <div v-for="a in this.sitter" :key="a.id_sitter">{{this.sitter.nom}}</div>
</template>

<script>
import axios from 'axios'
import NavBare from '../components/NavBare.vue'
export default {
    name: 'SitterProfile',
    components: {
        NavBare
    },
    data() {
        return {
            sitter: [],
        }
    },
            mounted() {
            const formData = new FormData();
            formData.append('id_sitter', localStorage.getItem('token'));
            axios.post('http://localhost/bestFriendB/MVC/Sitter/profile', formData)
            .then(response => {
                this.sitter = response.data;
                console.log(this.sitter);
            })
        },


}

</script>