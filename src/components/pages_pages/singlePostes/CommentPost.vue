<template>

<div class="flex flex-col items-start justify-center gap-6 p-6 rounded-2xl bg-slate-50 form">

    <div  class="comment_form h-9/12">
            <form v-for="i in this.all" :key="i" :i="i">
        
        <section class="flex items-start mb-3 gap-7 ">
            <div>
            <img class="w-10 rounded-full " v-bind:src="'../uploads/' + i.image" alt="">
            </div>
            <div class="text-left ">
                <p class="font-bold">{{i.name}}{{i.lastname}}</p>
                <p class="text-xs font-light text-gray-600">{{i.date_comment}}</p>
                <p class="w-4/5 text-base">{{i.post_comment}}</p>
            </div>
        </section>
    </form>
    </div>

    <section class="flex flex-wrap justify-center gap-2 inpute_comment">
        <img class="object-cover w-12 h-12 rounded-full" v-bind:src="'../uploads/' + this.image" alt="">
        <input class="p-1 border-b-2 bg-gray-50 input_com w-[20rem]" type="text" name="comment" v-model="comment" placeholder="Creat Your comment here..." required>
        <button @click.prevent="addComment(a.id_p)">send</button>
    </section>
    
</div>

</template>

<script>
import axios from 'axios';
export default{
    name: 'CommentPost',
    props: ['a'],
    data(){
        return{
            user_id : localStorage.getItem('token'),
            comment : '',
            all: [],
            image:  localStorage.getItem('image')

        }
    },
    methods:{
        addComment(id){
            const data = new FormData();
            data.append('id_us', this.user_id);
            data.append('id_po', id);
            data.append('post_comment', this.comment);
            console.log(this.id)
            axios.post('http://localhost/bestFriendB/MVC/Comments/addComment', data)
            .then(response => {
                this.all = response.data;
                // console.log(response.data);
                // console.log(this.all);
                window.location.reload();
                
            })
            .catch(error => {
                console.log(error);
            });
        },
        
    },
    async mounted() {
        const id = this.a.id_p;
        const data = new FormData();
        data.append('id_po', id);
        await axios.post('http://localhost/bestFriendB/MVC/Comments/allComment', data)
        .then(response => {
            this.all = response.data;
            // console.log(this.all);
            })
            .catch(error => {
                console.log(error);
            });
        }
    }


</script>

<style scoped>
.form{
    height: 40rem;
    width: 40rem;
}
.comment_form{
    overflow-y: overlay;
    width:  100%;
}


</style>