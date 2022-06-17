<template>
    <!-- component -->
<div class="flex items-center justify-center min-h-screen min-w-screen">
	<div class="absolute z-0 hidden transform rotate-45 bg-purple-300 w-60 h-60 rounded-xl -top-5 -left-16 md:block">
	</div>
	<div class="absolute hidden w-48 h-48 transform bg-purple-300 rounded-xl -bottom-6 -right-10 rotate-12 md:block">
	</div>
    <form v-on:submit.prevent="login()">
    <div class="z-20 px-12 py-12 bg-white shadow-xl rounded-2xl">
		<div>
			<h1 class="mb-4 text-3xl font-bold text-center cursor-pointer">Create An Account</h1>
			<p class="mb-8 text-sm font-semibold tracking-wide text-center text-gray-700 cursor-pointer w-80">Create an
				account to enjoy all the services without any ads for free!</p>
		</div>
		<div class="space-y-4">
			<input type="text" v-model="name" name="name" placeholder="Email Addres" class="block w-full px-4 py-3 text-sm border rounded-lg outline-none" />
			<input type="password" v-model="password" name="password" placeholder="Password" class="block w-full px-4 py-3 text-sm border rounded-lg outline-none" />
    </div>
			<div class="mt-6 text-center">
				<button type="submit" name="submit" class="w-64 py-3 text-xl text-white bg-purple-400 rounded-2xl">Create Account</button>
				<p class="mt-4 text-sm">Already Have An Account? <span class="underline cursor-pointer"> Sign In</span>
				</p>
			</div>
		</div>
		<div class="absolute top-0 hidden w-40 h-40 bg-purple-300 rounded-full right-7 md:block"></div>
		<div
			class="absolute hidden w-20 h-40 transform rotate-45 bg-purple-300 rounded-full bottom-20 left-10 md:block">
		</div>
    </form>
	</div>
</template>

<script>
import axios from 'axios';
export default{

    name: 'LoginAdmin',

    data()
    {
        return{
            data: [],
            name: '',
            password: ''
        }
    },
        methods :{
            login(){
                const formData = new FormData();
                formData.append('name', this.name);
                formData.append('password', this.password);
                axios.post('http://localhost/bestFriendB/MVC/Admin/loginAdmin', formData)
                .then(response=>
                {
                    console.log(response.data);
                    this.data = response.data;
                    // console.log(this.data);
                    if(response.data.length > 0){
                        localStorage.setItem('admin_id', this.data[0].admin_id);
                        this.$router.push('/admin');
                    }else{
                        this.data == false,
                        alert('Wrong Email or Password');
                    }
                })
                
            }
}
}
</script>