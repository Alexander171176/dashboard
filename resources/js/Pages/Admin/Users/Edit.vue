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
import DeleteButton from "@/Components/Admin/Buttons/DeleteButton.vue";
import VueMultiselect from 'vue-multiselect'

import {defineProps, onMounted, watch} from 'vue'

const props = defineProps({
    user: {
        type: Object,
        required: true
    },
    roles: Array,
    permissions: Array,
})

const form = useForm({
    name: props.user?.name,
    email: props.user?.email,
    roles: [],
    permissions: [],
})

const submit = () => {
    form.put(route("users.update", props.user?.id));
}

onMounted(() => {
    form.permissions = props.user?.permissions;
    form.roles = props.user?.roles;
})

watch(
    () => props.user,
    () => {
        form.permissions = props.user?.permissions,
            form.roles = props.user?.roles
    }
)
</script>

<template>
    <Head title="Редактировать Пользователя"/>

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
                <TitlePage>Редактировать Пользователя</TitlePage>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>

                </div>

            </div>

            <!-- Page Intro -->
            <div class="flex justify-center">
                <div class="bg-white p-5 shadow-lg rounded-sm border border-slate-200 w-full">
                    <form @submit.prevent="submit" class="w-full">
                        <div class="flex flex-col w-full">
                            <div class="flex justify-center">
                                <div class="bg-white mr-3 p-5 shadow-lg rounded-sm border border-slate-200 w-80">

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

                                    <div class="mb-3">
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

                                </div>
                                <div class="bg-white mr-3 shadow-lg rounded-sm border border-slate-200 w-80">
                                    <div class="mb-3">
                                        <div class="px-5 py-4">
                                            <h2 class="text-center font-semibold text-amber-500">
                                                Роли Пользователя
                                            </h2>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="table-auto w-full">
                                                <thead
                                                    class="text-xs font-semibold uppercase text-slate-700 bg-slate-50 border-t border-b border-slate-200">
                                                <tr>
                                                    <!-- Заголовки столбцов -->
                                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                        <span class="sr-only">ID</span>
                                                    </th>
                                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="font-semibold text-left">Имя</div>
                                                    </th>
                                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="font-semibold text-center">Действия</div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-sm divide-y divide-slate-200">
                                                <tr v-for="userRole in user.roles" :key="userRole.id">
                                                    <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap px">
                                                        <div class="text-left">{{ userRole.id }}</div>
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                                                        <div class="text-left">{{ userRole.name }}</div>
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                                                        <div class="flex justify-center">
                                                            <DeleteButton
                                                                :href="route('users.roles.destroy', [user.id, userRole.id])" preserve-scroll>
                                                            </DeleteButton>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white mr-3 shadow-lg rounded-sm border border-slate-200 w-80">
                                    <div>
                                        <div class="px-5 py-4">
                                            <h2 class="text-center font-semibold text-amber-500">
                                                Разрешения Пользователя
                                            </h2>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="table-auto w-full">
                                                <thead
                                                    class="text-xs font-semibold uppercase text-slate-700 bg-slate-50 border-t border-b border-slate-200">
                                                <tr>
                                                    <!-- Заголовки столбцов -->
                                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                                        <span class="sr-only">ID</span>
                                                    </th>
                                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="font-semibold text-left">Имя</div>
                                                    </th>
                                                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                                        <div class="font-semibold text-center">Действия</div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-sm divide-y divide-slate-200">
                                                <tr v-for="userPermission in user.permissions" :key="userPermission.id">
                                                    <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap px">
                                                        <div class="text-left">{{ userPermission.id }}</div>
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                                                        <div class="text-left">{{ userPermission.name }}</div>
                                                    </td>
                                                    <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                                                        <div class="flex justify-center">
                                                            <DeleteButton
                                                                :href="route('users.permissions.destroy', [
                                                                    user.id, userPermission.id
                                                                ])" preserve-scroll>
                                                            </DeleteButton>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center mt-4 mr-2">
                                <PrimaryButton
                                    class="ms-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Сохранить
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
