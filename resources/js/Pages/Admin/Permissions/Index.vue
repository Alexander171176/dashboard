<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import TitlePage from "@/Components/Admin/Headlines/TitlePage.vue";
import Datepicker from '@/Components/Admin/Datepicker.vue'
import DefaultButton from "@/Components/Admin/Buttons/DefaultButton.vue";
import PermissionsTable from "@/Components/Admin/Permissions/PermissionsTable.vue"
import {Head} from '@inertiajs/vue3'
import { defineProps } from 'vue'

const props = defineProps(['permissions'])
</script>

<template>
    <Head title="Разрешения"/>

    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Add permissions button -->
                <DefaultButton :href="route('permissions.create')">
                    <template #icon>
                        <!-- Ваш SVG -->
                        <i class="fas fa-plus"></i>
                    </template>
                    Добавить Разрешение
                </DefaultButton>

                <!-- Left: Title -->
                <TitlePage>Разрешения</TitlePage>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>

                </div>

            </div>

            <!-- Page Intro -->
            <PermissionsTable :permissions="permissions" />

        </div>
    </AdminLayout>
</template>
