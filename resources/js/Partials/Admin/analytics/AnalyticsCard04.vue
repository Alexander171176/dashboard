<script>
import {ref} from 'vue'
import BarChart from '@/Charts/BarChart04.vue'

// Import utilities
import {tailwindConfig} from '../../../../utils/Utils.js'

export default {
    name: 'AnalyticsCard04',
    components: {
        BarChart,
    },
    setup() {
        const chartData = ref({
            labels: [
                '02-01-2021', '03-01-2021', '04-01-2021', '05-01-2021',
            ],
            datasets: [
                // Blue bars
                {
                    label: 'New Visitors',
                    data: [
                        8000, 3800, 5350, 7800,
                    ],
                    backgroundColor: tailwindConfig().theme.colors.indigo[500],
                    hoverBackgroundColor: tailwindConfig().theme.colors.indigo[600],
                    categoryPercentage: 0.66,
                },
                // Light blue bars
                {
                    label: 'Returning Visitors',
                    data: [
                        4000, 6500, 2200, 5800,
                    ],
                    backgroundColor: tailwindConfig().theme.colors.sky[400],
                    hoverBackgroundColor: tailwindConfig().theme.colors.sky[500],
                    categoryPercentage: 0.66,
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
    <div class="flex flex-col col-span-full sm:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
        <header class="px-5 py-4 border-b border-slate-100">
            <h2 class="font-semibold text-slate-800">Audience Overview</h2>
        </header>
        <!-- Chart built with Chart.js 3 -->
        <!-- Change the height attribute to adjust the chart height -->
        <BarChart :data="chartData" width="595" height="248"/>
    </div>
</template>


