<script setup>
import { onMounted, defineProps } from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import TitlePage from "@/Components/Admin/Headlines/TitlePage.vue";
import DefaultButton from "@/Components/Admin/Buttons/DefaultButton.vue";
import Datepicker from '@/Components/Admin/Datepicker.vue'
import { Head, useForm } from '@inertiajs/vue3'
import InputError from '@/Components/Admin/InputError.vue'
import InputLabel from '@/Components/Admin/InputLabel.vue'
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue'
import TextInput from '@/Components/Admin/TextInput.vue'
import NumberInput from '@/Components/Admin/NumberInput.vue'
import {component as CKEditor} from '@mayasabha/ckeditor4-vue3'

// Определите объект конфигурации для редактора CKEditor
const editorConfig = {
    height: '200px',
    // Другие настройки
};

// Определяем пропсы компонента
const props = defineProps({
    rubric: {
        type: Object,
        required: true
    }
})

// Инициализируем форму
const form = useForm({
    title: props.rubric?.title || '',
    url: props.rubric?.url || '',
    image_url: props.rubric?.image_url || '',
    description: props.rubric?.description || '',
    meta_title: props.rubric?.meta_title || '',
    meta_keywords: props.rubric?.meta_keywords || '',
    meta_desc: props.rubric?.meta_desc || '',
    sort: Number(props.rubric?.sort) || 0,
    seo_title: props.rubric?.seo_title || '',
    seo_alt: props.rubric?.seo_alt || '',
})

// Хук, который вызывается после монтирования компонента
onMounted(() => {
    // Заменяем null значения пустой строкой в объекте рубрики
    for (let key in form) {
        if (form[key] === null) {
            form[key] = '';
        }
    }
})
</script>

<template>
    <Head title="Редактировать Рубрику"/>

    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Add rubrics button -->
                <DefaultButton :href="route('rubrics.index')">
                    <template #icon>
                        <!-- Ваш SVG -->
                        <i class="fas fa-undo"></i>
                    </template>
                    Вернуться назад
                </DefaultButton>

                <!-- Left: Title -->
                <TitlePage>Редактировать Рубрику</TitlePage>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>

                </div>

            </div>

            <!-- Page Intro -->
            <div class="flex justify-center">
                <div class="bg-white p-5 shadow-lg rounded-sm border border-slate-200 w-full">
                    <form @submit.prevent="form.put(route('rubrics.update', rubric.id))">

                        <div class="mb-3">
                            <InputLabel for="title" value="Заголовок Рубрики *" />

                            <TextInput
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.title"
                                required
                                autocomplete="title"
                            />

                            <InputError class="mt-2 font-bold" :message="form.errors.title" />
                        </div>

                        <div class="mb-3">
                            <InputLabel for="url" value="url адрес *" />

                            <TextInput
                                id="url"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.url"
                                requireds
                                autocomplete="url"
                            />

                            <InputError class="mt-2 font-bold" :message="form.errors.url" />
                        </div>

                        <div class="mb-3">
                            <InputLabel for="image_url" value="url изображения" />

                            <TextInput
                                id="image_url"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.image_url"
                                autocomplete="image_url"
                            />

                            <InputError class="mt-2 font-bold" :message="form.errors.image_url" />
                        </div>

                        <div class="mb-3">
                            <InputLabel for="seo_title" value="title изображения" />

                            <TextInput
                                id="seo_title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.seo_title"
                                autocomplete="seo_title"
                            />

                            <InputError class="mt-2 font-bold" :message="form.errors.seo_title" />
                        </div>

                        <div class="mb-3">
                            <InputLabel for="seo_alt" value="alt изображения" />

                            <TextInput
                                id="seo_alt"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.seo_alt"
                                autocomplete="seo_alt"
                            />

                            <InputError class="mt-2 font-bold" :message="form.errors.seo_alt" />
                        </div>

                        <div class="mb-3">
                            <InputLabel for="description" value="Описание"/>
                            <CKEditor v-model="form.description" :config="editorConfig"/>
                            <InputError class="mt-2 font-bold" :message="form.errors.description"/>
                        </div>

                        <div class="mb-3">
                            <InputLabel for="meta_title" value="meta title" />

                            <TextInput
                                id="meta_title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.meta_title"
                                autocomplete="meta_title"
                            />

                            <InputError class="mt-2 font-bold" :message="form.errors.meta_title" />
                        </div>

                        <div class="mb-3">
                            <InputLabel for="meta_keywords" value="meta keywords" />

                            <TextInput
                                id="meta_keywords"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.meta_keywords"
                                autocomplete="meta_keywords"
                            />

                            <InputError class="mt-2 font-bold" :message="form.errors.meta_keywords" />
                        </div>

                        <div class="mb-3">
                            <InputLabel for="meta_desc" value="meta description" />

                            <TextInput
                                id="meta_desc"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.meta_desc"
                                autocomplete="meta_desc"
                            />

                            <InputError class="mt-2 font-bold" :message="form.errors.meta_desc" />
                        </div>

                        <div class="mb-3">
                            <InputLabel for="sort" value="сортировка" />

                            <NumberInput
                                id="sort"
                                type="number"
                                class="mt-1 block w-40"
                                v-model="form.sort"
                                autocomplete="sort"
                            />

                            <InputError class="mt-2 font-bold" :message="form.errors.sort" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <DefaultButton :href="route('rubrics.index')">
                                <template #icon>
                                    <!-- Ваш SVG -->
                                    <i class="fas fa-undo"></i>
                                </template>
                                Вернуться назад
                            </DefaultButton>

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
            </div>

        </div>
    </AdminLayout>
</template>

