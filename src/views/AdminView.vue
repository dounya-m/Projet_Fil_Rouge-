<template>
    <div class="flex ">
        <section class="">
            <SideBare/>
        </section>

        <section class="w-11/12 ">
            <div>
                <StatisticsTop/>
            </div>
            <div>
                <LastPostes/>
            </div>
        </section>
        
    </div>
</template>


<script>
import SideBare from '../components/admin/SideBare.vue';
import StatisticsTop from '/src/components/admin/dashboard/StatisticsTop.vue';
import LastPostes from '../components/admin/dashboard/LastPostes.vue';

export default{
    name: 'AdminView',
    components: {
        SideBare,
        StatisticsTop,
        LastPostes
    },
}
</script>