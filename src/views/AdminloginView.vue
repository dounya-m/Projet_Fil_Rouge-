<template>
    <!-- component -->
<div class="flex items-center justify-center min-h-screen min-w-screen">

    <form v-on:submit.prevent="login()">
    <div class="z-20 px-12 py-12 bg-white shadow-xl rounded-2xl">
		<div class="flex flex-col items-center justify-center">
            <img class="w-28" src="../assets/images/logo.png" alt="">
			<h1 class="mb-4 text-3xl font-bold text-center cursor-pointer">Admin Space</h1>
			<p class="mb-8 text-sm font-semibold tracking-wide text-center text-gray-700 cursor-pointer w-80">you can manage your website here</p>
		</div>
		<div class="space-y-4">
			<input type="text" v-model="name" name="name" placeholder="Email Addres" class="block w-full px-4 py-3 text-sm border rounded-lg outline-none" />
			<input type="password" v-model="password" name="password" placeholder="Password" class="block w-full px-4 py-3 text-sm border rounded-lg outline-none" />
    </div>
			<div class="mt-6 text-center">
				<button type="submit" name="submit" class="w-64 py-3 text-xl text-white bg-emerald-300 rounded-2xl">Create Account</button>

			</div>
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