<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import TitlePage from "@/Components/Admin/Headlines/TitlePage.vue";
import Datepicker from '@/Components/Admin/Datepicker.vue'
import DefaultButton from "@/Components/Admin/Buttons/DefaultButton.vue";
import RolesTable from "@/Components/Admin/Roles/RolesTable.vue"
import {Head} from '@inertiajs/vue3'
import { defineProps } from 'vue'

const props = defineProps(['roles', 'rolesCount']);
</script>

<template>
    <Head title="Роли"/>

    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Add roles button -->
                <DefaultButton :href="route('roles.create')">
                    <template #icon>
                        <!-- Ваш SVG -->
                        <i class="fas fa-plus"></i>
                    </template>
                    Добавить Роль
                </DefaultButton>

                <!-- Left: Title -->
                <TitlePage>Роли</TitlePage>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>

                </div>

            </div>

            <!-- Page Intro -->
            <RolesTable :roles="roles" :rolesCount="rolesCount" />

        </div>
    </AdminLayout>
</template>
