<script>
import {ref} from 'vue'
import DoughnutChart from '@/Charts/DoughnutChart.vue'

// Import utilities
import {tailwindConfig} from '../../../../utils/Utils.js'

export default {
    name: 'AnalyticsCard08',
    components: {
        DoughnutChart,
    },
    setup() {
        const chartData = ref({
            labels: ['Desktop', 'Mobile', 'Tablet'],
            datasets: [
                {
                    label: 'Sessions By Device',
                    data: [
                        12, 50, 38,
                    ],
                    backgroundColor: [
                        tailwindConfig().theme.colors.indigo[500],
                        tailwindConfig().theme.colors.sky[400],
                        tailwindConfig().theme.colors.indigo[800],
                    ],
                    hoverBackgroundColor: [
                        tailwindConfig().theme.colors.indigo[600],
                        tailwindConfig().theme.colors.sky[500],
                        tailwindConfig().theme.colors.indigo[900],
                    ],
                    hoverBorderColor: tailwindConfig().theme.colors.white,
                },
            ],
        })

        return {
            chartData,
        }
    }
}
</script>

<template>
    <div
        class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100">
            <h2 class="font-semibold text-slate-800">Sessions By Device</h2>
        </header>
        <!-- Chart built with Chart.js 3 -->
        <!-- Change the height attribute to adjust the chart height -->
        <DoughnutChart :data="chartData" width="389" height="260"/>
    </div>
</template>


