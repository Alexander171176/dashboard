<script>
import {ref} from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Sidebar from '@/Partials/Admin/Sidebar.vue'
import Header from '@/Partials/Admin/Header.vue'
import SearchForm from '@/Components/Admin/SearchForm.vue'
import DeleteButton from '@/Partials/Admin/actions/DeleteButton.vue'
import DateSelect from '@/Components/Admin/DateSelect.vue'
import FilterButton from '@/Components/Admin/DropdownFilter.vue'
import InvoicesTable from '@/Partials/Admin/invoices/InvoicesTable.vue'
import PaginationClassic from '@/Components/Admin/PaginationClassic.vue'
import {Head} from '@inertiajs/vue3'

export default {
    name: 'Invoices',
    components: {
        Head,
        AdminLayout,
        Sidebar,
        Header,
        SearchForm,
        DeleteButton,
        DateSelect,
        FilterButton,
        InvoicesTable,
        PaginationClassic,
    },
    setup() {

        const sidebarOpen = ref(false)
        const selectedItems = ref([])

        const updateSelectedItems = (selected) => {
            selectedItems.value = selected
        }

        return {
            sidebarOpen,
            selectedItems,
            updateSelectedItems,
        }
    }
}
</script>

<template>
    <Head title="Invoices"/>
    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Left: Title -->
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Invoices ✨</h1>
                </div>

                <!-- Right: Actions  -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                    <!-- Search form -->
                    <SearchForm placeholder="Search by invoice ID…"/>
                    <!-- Create invoice button -->
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                        <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                            <path
                                d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"/>
                        </svg>
                        <span class="hidden xs:block ml-2">Create Invoice</span>
                    </button>
                </div>

            </div>

            <!-- More actions -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Left side -->
                <div class="mb-4 sm:mb-0">
                    <ul class="flex flex-wrap -m-1">
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-transparent shadow-sm bg-indigo-500 text-white duration-150 ease-in-out">
                                All <span class="ml-1 text-indigo-200">67</span></button>
                        </li>
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                                Paid <span class="ml-1 text-slate-400">14</span></button>
                        </li>
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                                Due <span class="ml-1 text-slate-400">34</span></button>
                        </li>
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                                Overdue <span class="ml-1 text-slate-400">19</span></button>
                        </li>
                    </ul>
                </div>

                <!-- Right side -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                    <!-- Delete button -->
                    <DeleteButton :selectedItems="selectedItems"/>
                    <!-- Dropdown -->
                    <DateSelect/>
                    <!-- Filter button -->
                    <FilterButton align="right"/>
                </div>

            </div>

            <!-- Table -->
            <InvoicesTable @change-selection="updateSelectedItems($event)"/>

            <!-- Pagination -->
            <div class="mt-8">
                <PaginationClassic/>
            </div>

        </div>
    </AdminLayout>
</template>


