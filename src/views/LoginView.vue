<template >
<body class="flex flex-row-reverse flex-wrap gap-x-72">
    <section class="items-center justify-center w-1/4 ">
        <img src="../assets/images/dogLogin.png" alt="">
    </section>

    <section class="flex flex-col items-center justify-center login">
    <div class="mb-10 mt-11 login_title">
        <h1 class="text-center ">Let's Have Some Friends</h1>
    </div>
    <section class="h-screen p-12">
        <form v-on:submit.prevent="login()" class="flex flex-col items-center gap-6 form_content">
        <div class="w-40 ">
            <router-link to="/">
                <img src="../assets/images/logo.png" alt="">
            </router-link>
        </div>
    <div class="grid gap-6 mb-6 lg:grid-raw-2">
            <div class="flex flex-col">
                <label class="text-left text-indigo-900 " for="email">Your email</label>
                <input class="h-1 p-4 border rounded-lg w-72 " type="email" v-model="email" name="email" required>
            </div>
            <div class="flex flex-col">
                <label class="text-left text-indigo-900 " for="password">Password</label>
                <input class="h-1 p-4 border rounded-lg w-72 " type="password" v-model="password" name="password" required>
            </div>
            
    </div>
    <button type="submit" class="w-3/4 h-10 text-white rounded-lg bg-emerald-300 hover:bg-emerald-400 ">Let's Discover</button>
    <p>Don't have an account yet? <router-link class="font-semibold text-blue-900" to="/signing">Sign up.</router-link> </p>
    </form>
    </section>
    
</section>
</body>
</template>

<script>
// import axios from 'axios'
export default {
    name: 'LoginPage',
    data()
    {
        return{
            email: '',
            password: ''
        }
    },
        methods :{
            async login()
            {
                await fetch("http://localhost/bestFriendB/MVC/User/loginUser", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        email: this.email,
                        password: this.password
                    })
                }).then(res=> res.json())
                    .then(data=> {
                        if(data)
                        {
                            localStorage.setItem('token', data[0].id)
                            localStorage.setItem('image', data[0].image)
                            this.$router.push('/post')
                        }
                        else
                        {
                            this.data == false,
                            alert('Wrong Email or Password')
                        }
                    });
            }
        }


        
}

</script>
<style>
/* .login_title{
    border: solid 1px rgb(218, 207, 5);
    padding: 3rem;
    transition: border-width 0.2s linear;
    border-radius: 60% 40% 40% 20% / 70% 50% 30% 25%;
} */
</style>