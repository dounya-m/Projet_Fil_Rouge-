<template>
    <main class="main">
        <section>
            <NavBare/>
        </section>
        <section>
            <!-- <div>
                <h1>Welcome to your space</h1>
            </div> -->
    <form class="" v-on:submit.prevent="login()">
    <div class="flex flex-col items-center justify-center min-h-screen gap-3 ">

        <div class="flex gap-3">
            <routerLink to="/allsitter" class="p-2 text-white rounded-lg w-36 bg-emerald-300 hover:bg-emerald-500"> see all sitter</routerLink>
            <routerLink to="/form" class="p-2 border-2 rounded-lg w-36 text-emerald-300 border-emerald-300 hover:bg-emerald-50"> Sign In </routerLink>
        </div>

	<div class="z-20 px-12 py-12 shadow-xl rounded-2xl login_flou">
		<div>
			<h1 class="mb-4 text-3xl font-bold text-center cursor-pointer">Your Sitter Account</h1>
			<p class="mb-8 text-sm font-semibold tracking-wide text-center text-gray-700 cursor-pointer w-80">
				Welcom to Your own space!</p>
		</div>
		<div class="space-y-4">
			<input type="email" v-model="email" name="email"
            placeholder="Email Addres" class="block w-full px-4 py-3 text-sm border rounded-lg outline-none" />
			<input type="password" v-model="password" name="password"
            placeholder="Password" class="block w-full px-4 py-3 text-sm border rounded-lg outline-none" />
    </div>
			<div class="mt-6 text-center">
				<button type="submit" class="w-64 py-3 text-xl text-white bg-yellow-400 rounded-2xl">Sign In</button>
				<p class="mt-4 text-sm">Don't have Account <router-link to="/form" class="font-semibold text-blue-900 underline cursor-pointer"> Sign Up</router-link>
				</p>
			</div>
		</div>

	</div>

        </form>
        </section>
    </main>
</template>

<script>
import NavBare from '../components/NavBare.vue';
import axios from 'axios'; 
export default{
    components: {
        NavBare,
    },
    data(){
        return{
            data: '',
        }
    },
methods :{
            login(){
                const formData = new FormData();
                formData.append('email', this.email);
                formData.append('password', this.password);
                axios.post('http://localhost/bestFriendB/MVC/Sitter/login', formData)
                .then(response=>
                {
                    // console.log(response.data);
                    this.data = response.data;
                    // console.log(this.data);
                    if(response.data.length > 0){
                        // localStorage.setItem('ps_profile', this.ps_profile);
                        localStorage.setItem('id_sitter', this.data[0].id_sitter);
                        this.$router.push('/siiterprofile');
                    }else{
                        this.data == false,
                        alert('Wrong Email or Password');
                    }
                })
                
            }
        }

    
    }
</script>

<style>
    .main{
        background: url('../assets/images/bg-01.png') , rgba(244, 245, 247, 0.797);
        background-size: cover;
        padding: 10rem;
        padding-top: 0 !important;
    }
    .input_row{
        width: 100%;
        background: none;
    }
    .input_col{
        width: 98%;
        background: none;
    }
    .row_table{
        width: 100;
    }
    .login_flou{
        backdrop-filter: blur(20px) grayscale(60%);
    }

</style>