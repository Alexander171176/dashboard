<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import WelcomeBanner from '@/Partials/Admin/dashboard/WelcomeBanner.vue'
import DashboardAvatars from '@/Partials/Admin/dashboard/DashboardAvatars.vue'
import FilterButton from '@/Components/Admin/DropdownFilter.vue'
import Datepicker from '@/Components/Admin/Datepicker.vue'
import DashboardCard01 from '@/Partials/Admin/dashboard/DashboardCard01.vue'
import DashboardCard02 from '@/Partials/Admin/dashboard/DashboardCard02.vue'
import DashboardCard03 from '@/Partials/Admin/dashboard/DashboardCard03.vue'
import DashboardCard04 from '@/Partials/Admin/dashboard/DashboardCard04.vue'
import DashboardCard05 from '@/Partials/Admin/dashboard/DashboardCard05.vue'
import DashboardCard06 from '@/Partials/Admin/dashboard/DashboardCard06.vue'
import DashboardCard07 from '@/Partials/Admin/dashboard/DashboardCard07.vue'
import DashboardCard08 from '@/Partials/Admin/dashboard/DashboardCard08.vue'
import DashboardCard09 from '@/Partials/Admin/dashboard/DashboardCard09.vue'
import DashboardCard10 from '@/Partials/Admin/dashboard/DashboardCard10.vue'
import DashboardCard11 from '@/Partials/Admin/dashboard/DashboardCard11.vue'
import DashboardCard12 from '@/Partials/Admin/dashboard/DashboardCard12.vue'
import DashboardCard13 from '@/Partials/Admin/dashboard/DashboardCard13.vue'
import {Head} from '@inertiajs/vue3'
</script>

<template>
    <Head>
        <title>Панель Администратора</title>
        <meta name="keywords" content="Приложение">
        <meta name="description" content="Сервис">
    </Head>

    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Welcome banner -->
            <WelcomeBanner/>

            <!-- Dashboard actions -->
            <div class="sm:flex sm:justify-between sm:items-center mb-8">

                <!-- Left: Avatars -->
                <DashboardAvatars/>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Filter button -->
                    <FilterButton align="right"/>
                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>
                    <!-- Add view button -->
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                        <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                            <path
                                d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"/>
                        </svg>
                        <span class="hidden xs:block ml-2">Add view</span>
                    </button>
                </div>

            </div>

            <!-- Cards -->
            <div class="grid grid-cols-12 gap-6">

                <!-- Line chart (Acme Plus) -->
                <DashboardCard01/>
                <!-- Line chart (Acme Advanced) -->
                <DashboardCard02/>
                <!-- Line chart (Acme Professional) -->
                <DashboardCard03/>
                <!-- Bar chart (Direct vs Indirect) -->
                <DashboardCard04/>
                <!-- Line chart (Real Time Value) -->
                <DashboardCard05/>
                <!-- Doughnut chart (Top Countries) -->
                <DashboardCard06/>
                <!-- Table (Top Channels) -->
                <DashboardCard07/>
                <!-- Line chart (Sales Over Time) -->
                <DashboardCard08/>
                <!-- Stacked bar chart (Sales VS Refunds) -->
                <DashboardCard09/>
                <!-- Card (Customers)  -->
                <DashboardCard10/>
                <!-- Card (Reasons for Refunds)   -->
                <DashboardCard11/>
                <!-- Card (Recent Activity) -->
                <DashboardCard12/>
                <!-- Card (Income/Expenses) -->
                <DashboardCard13/>

            </div>

        </div>
    </AdminLayout>
</template>
