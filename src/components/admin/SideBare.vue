<template>
    <div class="flex flex-col h-screen gap-24 pt-4 sidebar">
        <section>
        <div class="p-3">
            <img class="w-5/12" src="../../assets/images/bestFriendDashobord.png">
        </div>
    </section>

    <section class="flex flex-col items-start justify-start gap-10 text-lg font-semibold text-blue-900">
        
    <router-link class="flex items-center w-full gap-2 px-6 py-4" to="/admin" active-class="active">
        <img class="w-8" src="../../assets/icones/dashboard.png" alt="">
        <span class="text-left text-slate-500 hover:text-slate-700">
                Dashboard
        </span>
        </router-link>

    <router-link class="flex items-center w-full gap-2 px-6 " to="/users" active-class="active">
            <img class="w-8" src="../../assets/icones/users.png" alt="">
            <span class="flex items-center w-full gap-2 px-6 py-4 text-left hover:text-blue-400">
                    Users
            </span>
        </router-link>
        
        <router-link to="/Sittersadmin" class="flex items-center w-full gap-2 px-6 " active-class="active"> 
            <img class="w-8" src="../../assets/icones/sitters.png" alt="">
            <span class="flex items-center w-full gap-2 px-6 py-4 text-left text-green-500 hover:text-green-400">
                    Sitters
            </span>
        </router-link>
        
        <router-link to="/allpostadmin" class="flex items-center w-full gap-2 px-6 " active-class="active">
            <img class="w-8" src="../../assets/icones/postes.png" alt="">
            <span class="flex items-center w-full gap-2 px-6 py-4 text-left text-yellow-500 hover:text-yellow-400">
                    All Postes
            </span>
        </router-link>
        
        <router-link to="/blog" class="flex items-center w-full gap-2 px-6 " active-class="active">
            <img class="w-8" src="../../assets/icones/blog.png" alt="">
            <span class="flex items-center w-full gap-2 px-6 py-4 text-left text-purple-600 hover:text-violet-500">
                    Blog
            </span>
        </router-link> 
    </section>
    <section>
        <button  @click="logout()" class="flex items-center gap-2 ml-6">
            <img class="w-10" src="../../assets/icones/logout.png" alt="">
            <span>Logout</span>
        </button>
    </section>
    </div>
</template>

<script>
export default{
    name: 'SideBare',
    data(){
        return{
            adminLogin: localStorage.getItem('admin_id') ?true : false,
        }
    },
    beforecreated() {
        this.adminLogin = localStorage.getItem('admin_id') ? true : false
        },
         methods:{
    logout(){
            console.log("hello")
            localStorage.removeItem('admin_id')
        
                        console.log(typeof localStorage['admin_id']);
                        if(!localStorage['admin_id']){
                        this.ifLogin=false;
            }
            this.$router.push('/')
        },
    }
}

</script>
<style scoped>

.active {
    background: rgba(235, 248, 255, 0.76);
    box-shadow: -11px 9px 16px 0px #ddeaff8a;
    border-top-right-radius:3rem ;
    border-bottom-left-radius:3rem ;
}
.sidebar{
    width: 16vw;
    background: rgb(244, 250, 255);
}
</style>
