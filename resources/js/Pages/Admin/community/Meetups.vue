<script>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import SearchForm from '@/Components/Admin/SearchForm.vue'
import MeetupsPosts from '@/Partials/Admin/community/MeetupsPosts.vue'
import PaginationNumeric from '@/Components/Admin/PaginationNumeric.vue'
import {Head} from '@inertiajs/vue3'

export default {
    name: 'Meetups',
    components: {
        AdminLayout,
        Head,
        SearchForm,
        MeetupsPosts,
        PaginationNumeric,
    }
}
</script>

<template>
    <Head title="Meetups"/>
    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Left: Title -->
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Discover Meetups ✨</h1>
                </div>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Search form -->
                    <SearchForm/>

                    <!-- Add meetup button -->
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                        <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                            <path
                                d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"/>
                        </svg>
                        <span class="hidden xs:block ml-2">Add Meetup</span>
                    </button>

                </div>

            </div>

            <!-- Filters -->
            <div class="mb-5">
                <ul class="flex flex-wrap -m-1">
                    <li class="m-1">
                        <button
                            class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-transparent shadow-sm bg-indigo-500 text-white duration-150 ease-in-out">
                            View All
                        </button>
                    </li>
                    <li class="m-1">
                        <button
                            class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                            Online
                        </button>
                    </li>
                    <li class="m-1">
                        <button
                            class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                            Local
                        </button>
                    </li>
                    <li class="m-1">
                        <button
                            class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                            This Week
                        </button>
                    </li>
                    <li class="m-1">
                        <button
                            class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                            This Month
                        </button>
                    </li>
                    <li class="m-1">
                        <button
                            class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                            Following
                        </button>
                    </li>
                </ul>
            </div>
            <div class="text-sm text-slate-500 italic mb-4">289 Meetups</div>

            <!-- Content -->
            <MeetupsPosts/>

            <!-- Pagination -->
            <div className="mt-8">
                <PaginationNumeric/>
            </div>

        </div>
    </AdminLayout>
</template>


