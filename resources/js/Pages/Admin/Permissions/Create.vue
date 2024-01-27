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

const form = useForm({
    name: ""
})
</script>

<template>
    <Head title="Создать Разрешение"/>

    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Add roles button -->
                <DefaultButton :href="route('permissions.index')">
                    <template #icon>
                        <!-- Ваш SVG -->
                        <i class="fas fa-undo"></i>
                    </template>
                    Вернуться назад
                </DefaultButton>

                <!-- Left: Title -->
                <TitlePage>Создать Разрешение</TitlePage>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>

                </div>

            </div>

            <!-- Page Intro -->
            <div class="flex justify-start">
                <div class="bg-white p-5 shadow-lg rounded-sm border border-slate-200 w-80">
                    <form @submit.prevent="form.post(route('permissions.store'))">
                        <div>
                            <InputLabel for="name" value="Название Разрешения" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                autofocus
                                autocomplete="name"
                            />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton
                                class="ms-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Создать
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </AdminLayout>
</template>
