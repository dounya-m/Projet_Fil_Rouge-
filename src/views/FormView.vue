<template>
<main class="main">
    <div class="">
        <NavBare/>
    </div>

        <section>
            <div class="">
                <SigninSitter/>
            </div>
        </section>
    

</main>

</template>



<script>
import NavBare from '../components/NavBare.vue';
import SigninSitter from '../components/sitter/SigninSitter.vue';

export default{



    name: 'FormView',
    components: {
    NavBare,
    SigninSitter,
        },
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
    .form_sitter{
        backdrop-filter: blur(20px) grayscale(60%);
    }
</style>