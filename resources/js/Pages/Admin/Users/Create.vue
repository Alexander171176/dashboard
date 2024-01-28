<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import TitlePage from "@/Components/Admin/Headlines/TitlePage.vue";
import DefaultButton from "@/Components/Admin/Buttons/DefaultButton.vue";
import Datepicker from '@/Components/Admin/Datepicker.vue'
import {Head, useForm} from '@inertiajs/vue3'
import InputError from '@/Components/Admin/InputError.vue'
import InputLabel from '@/Components/Admin/InputLabel.vue'
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue'
import TextInput from '@/Components/Admin/TextInput.vue'
import VueMultiselect from 'vue-multiselect'
import {defineProps} from 'vue'

defineProps({
    roles: Array,
    permissions: Array,
})

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    roles: [],
    permissions: [],
})

const submit = () => {
    form.post(route('users.store'), {
        onFinish: () => form.reset('password', 'password_confirmation')
    })
}
</script>

<template>
    <Head title="Создать Пользователя"/>

    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Add roles button -->
                <DefaultButton :href="route('users.index')">
                    <template #icon>
                        <!-- Ваш SVG -->
                        <i class="fas fa-undo"></i>
                    </template>
                    Вернуться назад
                </DefaultButton>

                <!-- Left: Title -->
                <TitlePage>Создать Пользователя</TitlePage>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>

                </div>

            </div>

            <!-- Page Intro -->
            <div class="flex justify-center">
                <div class="bg-white p-5 shadow-lg rounded-sm border border-slate-200 w-80">
                    <form @submit.prevent="submit">
                        <div class="flex flex-col">

                                <div class="mb-3">
                                    <InputLabel for="name" value="Имя Пользователя"/>

                                    <TextInput
                                        id="name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.name"
                                        required
                                        autofocus
                                        autocomplete="name"
                                    />

                                    <InputError class="mt-2" :message="form.errors.name"/>
                                </div>

                                <div class="mb-3">
                                    <InputLabel for="email" value="Email Пользователя"/>

                                    <TextInput
                                        id="email"
                                        type="email"
                                        class="mt-1 block w-full"
                                        v-model="form.email"
                                        required
                                        autofocus
                                        autocomplete="username"
                                    />

                                    <InputError class="mt-2" :message="form.errors.email"/>
                                </div>

                                <div class="mb-3">
                                    <InputLabel for="password" value="Пароль"/>

                                    <TextInput
                                        id="password"
                                        type="password"
                                        class="mt-1 block w-full"
                                        v-model="form.password"
                                        required
                                        autocomplete="new-password"
                                    />

                                    <InputError class="mt-2" :message="form.errors.password"/>
                                </div>

                                <div class="mb-3">
                                    <InputLabel for="password_confirmation" value="повторите Пароль"/>

                                    <TextInput
                                        id="password_confirmation"
                                        type="password"
                                        class="mt-1 block w-full"
                                        v-model="form.password_confirmation"
                                        required
                                        autocomplete="new-password"
                                    />

                                    <InputError class="mt-2" :message="form.errors.password_confirmation"/>
                                </div>

                                <div class="mb-3">
                                    <InputLabel for="roles" value="Роль"/>
                                    <VueMultiselect v-model="form.roles"
                                                    :options="roles"
                                                    :multiple="true"
                                                    :close-on-select="true"
                                                    placeholder="Выбрать"
                                                    label="name"
                                                    track-by="id"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="permissions" value="Разрешения"/>
                                    <VueMultiselect v-model="form.permissions"
                                                    :options="permissions"
                                                    :multiple="true"
                                                    :close-on-select="true"
                                                    placeholder="Выбрать"
                                                    label="name"
                                                    track-by="id"
                                    />
                                </div>

                            <div class="flex items-center justify-end mt-4 mr-2">
                                <PrimaryButton
                                    class="ms-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Создать
                                </PrimaryButton>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </AdminLayout>
</template>

<style src="../../../../css/vue-multiselect.min.css"></style>
