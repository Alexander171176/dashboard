<script setup>
import { ref } from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import defaultAvatar from '../../../images/user-avatar-32.png'
import TitlePage from "@/Components/Admin/Headlines/TitlePage.vue";
import Datepicker from '@/Components/Admin/Datepicker.vue'
import DefaultButton from '@/Components/Admin/Buttons/DefaultButton.vue';
import { Head, usePage } from '@inertiajs/vue3'

const { user, avatar } = usePage().props;

// Путь к изображению пользователя
const userAvatar = ref(avatar ? `/storage/${avatar}` : defaultAvatar);

</script>

<template>
    <Head title="Мой Профиль"/>

    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Add account button -->
                <DefaultButton :href="route('profile.edit')">
                    <template #icon>
                        <!-- Ваш SVG -->
                        <i class="fas fa-edit"></i>
                    </template>
                    Редактировать Профиль
                </DefaultButton>

                <!-- Left: Title -->
                <TitlePage>Профиль</TitlePage>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>

                </div>

            </div>

            <!-- Page Intro -->
            <section>
                <!-- Picture -->
                <div class="flex flex-col justify-center items-center">
                    <div class="mb-3">
                        <img class="w-20 h-20 rounded-full" :src="userAvatar" width="160" height="160" alt="User upload">
                    </div>
                    <h2 class="text-lg font-medium text-gray-900">{{ user.name }}</h2>
                </div>
            </section>

        </div>
    </AdminLayout>
</template>
