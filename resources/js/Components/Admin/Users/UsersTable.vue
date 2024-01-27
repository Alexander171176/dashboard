<script setup>
import {defineProps} from 'vue'
import IconButton from "@/Components/Admin/Buttons/IconButton.vue";
import DeleteButton from "@/Components/Admin/Buttons/DeleteButton.vue";

const props = defineProps(['users', 'usersCount']);
const tooltipButtonEdit = 'редактировать'
</script>

<template>
    <div class="px-5 py-1 text-right">
        <h2 class="font-semiboldtext-slate-800">
            Всего: <span class="text-blue-500 font-medium">{{ usersCount }}</span>
        </h2>
    </div>
    <div class="bg-white shadow-lg rounded-sm border border-slate-200 relative">
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
                        <div class="font-semibold text-left">Email</div>
                    </th>
                    <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="font-semibold text-center">Действия</div>
                    </th>
                </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-200" v-for="user in users" :key="user.id">
                <!-- Отображение пользователей -->
                <tr class="border-b-2 hover:bg-slate-100">
                    <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap px">
                        <div class="text-left">{{ user.id }}</div>
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                        <div class="text-left">{{ user.name }}</div>
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                        <div class="text-left">{{ user.email }}</div>
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-1 whitespace-nowrap">
                        <div class="flex justify-center">
                            <IconButton :href="route('users.edit', user.id)" :tooltip-text="tooltipButtonEdit">
                                <template #svg>
                                    <!-- Ваш SVG -->
                                    <svg class="w-4 h-4 fill-current text-teal-500 shrink-0" viewBox="0 0 16 16">
                                        <path
                                            d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z"/>
                                    </svg>
                                </template>
                            </IconButton>
                            <DeleteButton :href="route('users.destroy', user.id)"></DeleteButton>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
