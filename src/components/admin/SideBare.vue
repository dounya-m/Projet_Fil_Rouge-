<template>
    <div class="flex flex-col h-screen gap-24 pt-4 bg-blue-50 sidebar">
        <section>
        <div class="p-3">
            <img class="w-5/12" src="../../assets/images/bestFriendDashobord.png">
        </div>
    </section>

    <section class="flex flex-col items-start justify-start gap-10 text-lg font-semibold text-blue-900">
        <div class="flex items-center w-full gap-2 px-6 py-4 text-left hover:bg-slate-100 hover:text-blue-700">
            <img class="w-8" src="../../assets/icones/dashboard.png" alt="">
            <router-link to="/admin" active-class="active">
                Dashboard
            </router-link>
        </div>

        <div class="flex items-center w-full gap-2 px-6 py-4 text-left hover:bg-slate-100 hover:text-blue-700">
            <img class="w-8" src="../../assets/icones/users.png" alt="">
            <router-link to="/users" exact-active-class="exact-active">
                Users
            </router-link>
        </div>
        
        <div class="flex items-center w-full gap-2 px-6 py-4 text-left hover:bg-slate-100 hover:text-blue-700">
            <img class="w-8" src="../../assets/icones/sitters.png" alt="">
            <router-link to="/Sittersadmin">
                Sitters
            </router-link>
        </div>
        
        <div class="flex items-center w-full gap-2 px-6 py-4 text-left hover:bg-slate-100 hover:text-blue-700">
            <img class="w-8" src="../../assets/icones/postes.png" alt="">
            <router-link to="">
                All Postes
            </router-link>
        </div>
        
        <div class="flex items-center w-full gap-2 px-6 py-4 text-left hover:bg-slate-100 hover:text-blue-700">
            <img class="w-8" src="../../assets/icones/lastPost.png" alt="">
            <router-link to="">
                Last Postes
            </router-link>
        </div>

        <div class="flex items-center w-full gap-2 px-6 py-4 text-left hover:bg-slate-100 hover:text-blue-700">
            <img class="w-8" src="../../assets/icones/blog.png" alt="">
            <router-link to="/blog">
                Blog
            </router-link>
        </div>
        
    </section>
    </div>
</template>

<script>
export default{
    name: 'SideBare'
}

</script>
<style>
.sidebar{
    width: 16vw;
}
</style>
