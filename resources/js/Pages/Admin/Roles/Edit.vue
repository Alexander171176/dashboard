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
import DeleteButton from "@/Components/Admin/Buttons/DeleteButton.vue";
import {defineProps, onMounted, watch} from 'vue'

const props = defineProps({
    role: {
        type: Object,
        required: true
    },
    permissions: Array,
})

const form = useForm({
    name: props.role.name,
    permissions: []
})

onMounted( () => {
    form.permissions = props.role?.permissions;
})

watch(
    () => props.role,
    () => (form.permissions = props.role?.permissions)
)
</script>

<template>
    <Head title="Редактировать Роль"/>

    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Add roles button -->
                <DefaultButton :href="route('roles.index')">
                    <template #icon>
                        <!-- Ваш SVG -->
                        <i class="fas fa-undo"></i>
                    </template>
                    Вернуться назад
                </DefaultButton>

                <!-- Left: Title -->
                <TitlePage>Редактировать Роль</TitlePage>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>

                </div>

            </div>

            <!-- Page Intro -->
            <div class="flex justify-center">
                <div class="bg-white p-5 shadow-lg rounded-sm border border-slate-200 w-80">
                    <form @submit.prevent="form.put(route('roles.update', role.id))">
                        <div class="mb-3">
                            <InputLabel for="name" value="Название Роли"/>

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                autofocus
                                autocomplete="name"
                            />

                            <InputError class="mt-2" :message="form.errors.name"/>
                        </div>
                        <div>
                            <InputLabel for="name" value="Разрешения" />

                            <VueMultiselect v-model="form.permissions"
                                         :options="permissions"
                                         :multiple="true"
                                         :close-on-select="true"
                                         placeholder="Выбрать"
                                         label="name"
                                         track-by="id"
                                          />
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <PrimaryButton
                                class="ms-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                <template #icon>
                                    <!-- Ваш SVG -->
                                    <i class="far fa-save"></i>
                                </template>

                                Сохранить
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
                <div class="bg-white shadow-lg rounded-sm border border-slate-200 relative w-80">
                    <div class="px-5 py-4">
                        <h2 class="text-center font-semibold text-amber-500">
                            Все Разрешения для этой Роли
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
                        <tr v-for="rolePermission in role.permissions" :key="rolePermission.id">
                            <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap px">
                                <div class="text-left">{{ rolePermission.id }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                                <div class="text-left">{{ rolePermission.name }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                                <div class="flex justify-center">
                                    <DeleteButton :href="
                                    route('roles.permissions.destroy', [role.id, rolePermission.id])
                                    ">
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
    </AdminLayout>
</template>

<style src="../../../../css/vue-multiselect.min.css"></style>
