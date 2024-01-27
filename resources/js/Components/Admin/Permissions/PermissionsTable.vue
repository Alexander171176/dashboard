<script setup>
import { defineProps } from 'vue'

const props = defineProps(['permissions'])
</script>

<template>
    <div class="bg-white shadow-lg rounded-sm border border-slate-200 relative">
        <header class="px-5 py-4">
            <h2 class="font-semibold text-slate-800">
                Всего <span class="text-slate-400 font-medium">3</span>
            </h2>
        </header>
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-slate-500 bg-slate-50 border-t border-b border-slate-200">
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
                <tbody class="text-sm divide-y divide-slate-200" v-for="permission in permissions" :key="permission.id" >
                <!-- Отображение пользователей -->
                <tr>
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap px">
                        <div class="text-left">{{ permission.id }}</div>
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="text-left">{{ permission.name }}</div>
                    </td>
                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                        <div class="text-center">Редактировать/Удалить</div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
