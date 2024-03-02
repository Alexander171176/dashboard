<script setup>
import { ref } from 'vue'
import axios from 'axios';
import { Head, usePage } from '@inertiajs/vue3'
import defaultAvatar from '../../../images/user-avatar-32.png'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import Datepicker from '@/Components/Admin/Datepicker.vue'
import DeleteUserForm from './Partials/DeleteUserForm.vue'
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue'

defineProps({
    mustVerifyEmail: {
        type: Boolean
    },
    status: {
        type: String
    },
    avatar: {
        type: String
    }
})

const { user, avatar } = usePage().props;

// Путь к изображению пользователя
const userAvatar = ref(avatar ? `/storage/${avatar}` : defaultAvatar);

const fileInput = ref(null)
const hovered = ref(false)

const openFilePicker = () => {
    fileInput.value.click()
}

const onFileChange = (event) => {
    const file = event.target.files[0];

    const formData = new FormData();
    formData.append('avatar', file);

    axios.post('/upload-avatar', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
        .then(response => {
            console.log('Ответ от сервера:', response.data);
            userAvatar.value = `/storage/${response.data.path}`; // Обновляем изображение пользователя
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
}

</script>

<template>
    <Head title="Редактирование Профиля" />

    <AuthenticatedLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-8">
                <!-- Left: Title -->
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Редактирование Профиля ✨</h1>
                </div>
                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>
                </div>
            </div>

            <div class="bg-white mb-8">
                <div class="mx-auto">

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <!-- Форма изменения аватара -->
                        <div class="flex items-center relative">
                            <div class="mr-4 relative" @click="openFilePicker" @mouseenter="hovered = true" @mouseleave="hovered = false">
                                <img class="w-20 h-20 rounded-full" :src="userAvatar" width="160" height="160" alt="User upload">
                                <input type="file" @change="onFileChange" ref="fileInput" style="display: none">
                                <div v-if="hovered" class="absolute inset-0 bg-gray-800 opacity-0 hover:bg-indigo-500 hover:opacity-50 rounded-full"></div>
                            </div>
                            <button class="btn-sm bg-indigo-500 hover:bg-indigo-600 text-white" @click="openFilePicker">Выбрать файл</button>
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <!-- Форма редактирования профиля -->
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            class="max-w-xl"
                        />
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <!-- Форма изменения пароля -->
                        <UpdatePasswordForm class="max-w-xl" />
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <!-- Форма удаления пользователя -->
                        <DeleteUserForm class="max-w-xl" />
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
