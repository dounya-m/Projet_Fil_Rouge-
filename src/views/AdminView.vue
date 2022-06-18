<template>
    <div class="flex ">
        <section class="">
            <SideBare/>
        </section>

        <section class="w-11/12 ">
            <div>
                <StatisticsTop/>
            </div>
        </section>
        
    </div>
</template>


<script>
import SideBare from '../components/admin/SideBare.vue';
import StatisticsTop from '../components/admin/dashboard/StatisticsTop.vue';

export default{
    name: 'AdminView',
    components: {
        SideBare,
        StatisticsTop
    },
}
</script>