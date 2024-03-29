<script setup>
import {ref, onMounted, onUnmounted, watch} from 'vue'
import {useRouter} from 'vue-router'
import LinkGroup from './LinkGroup.vue'
import {Link} from '@inertiajs/vue3';
import {usePermission} from "@/composables/permissions"

const {hasRole} = usePermission();
const props = defineProps(['sidebarOpen'])
const emit = defineEmits()
const trigger = ref(null)
const sidebar = ref(null)
const storedSidebarExpanded = localStorage.getItem('sidebar-expanded')
const sidebarExpanded = ref(storedSidebarExpanded === null ? false : storedSidebarExpanded === 'true')
const currentRoute = useRouter().currentRoute.value

// close on click outside
const clickHandler = ({target}) => {
    if (!sidebar.value || !trigger.value) return
    if (!props.sidebarOpen || sidebar.value.contains(target) || trigger.value.contains(target)) return
    emit('close-sidebar')
}
// close if the esc key is pressed
const keyHandler = ({keyCode}) => {
    if (!props.sidebarOpen || keyCode !== 27) return
    emit('close-sidebar')
}
onMounted(() => {
    document.addEventListener('click', clickHandler)
    document.addEventListener('keydown', keyHandler)
})
onUnmounted(() => {
    document.removeEventListener('click', clickHandler)
    document.removeEventListener('keydown', keyHandler)
})
watch(sidebarExpanded, () => {
    localStorage.setItem('sidebar-expanded', sidebarExpanded.value)
    if (sidebarExpanded.value) {
        document.querySelector('body').classList.add('sidebar-expanded')
    } else {
        document.querySelector('body').classList.remove('sidebar-expanded')
    }
})
{
    trigger, sidebar, sidebarExpanded, currentRoute
}
</script>

<template>
    <div>
        <!-- Sidebar backdrop (mobile only) -->
        <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
             :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true"></div>

        <!-- Sidebar -->
        <div id="sidebar" ref="sidebar"
             class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
             :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'">

            <!-- Sidebar header -->
            <div class="flex justify-between mb-10 pr-3 sm:px-2">
                <!-- Close button -->
                <button ref="trigger" class="lg:hidden text-slate-500 hover:text-slate-400"
                        @click.stop="$emit('close-sidebar')" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                    <span class="sr-only">Закрыть</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"/>
                    </svg>
                </button>
                <!-- Logo -->
                <Link :href="'/dashboard'">
                    <svg width="32" height="32" viewBox="0 0 32 32">
                        <defs>
                            <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                                <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%"/>
                                <stop stop-color="#A5B4FC" offset="100%"/>
                            </linearGradient>
                            <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                                <stop stop-color="#38BDF8" stop-opacity="0" offset="0%"/>
                                <stop stop-color="#38BDF8" offset="100%"/>
                            </linearGradient>
                        </defs>
                        <rect fill="#6366F1" width="32" height="32" rx="16"/>
                        <path
                            d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                            fill="#4F46E5"/>
                        <path
                            d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                            fill="url(#logo-a)"/>
                        <path
                            d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                            fill="url(#logo-b)"/>
                    </svg>
                </Link>
            </div>

            <!-- Links -->
            <div class="space-y-8">

                <!-- Pages group -->
                <div>
                    <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                              aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Страницы</span>
                    </h3>
                    <ul class="mt-3">

                        <!-- Dashboard -->
                        <LinkGroup :href="route('dashboard')" :active="route().current('dashboard')"
                                   class="mb-3 block text-slate-200 truncate transition duration-150">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-indigo-500"
                                              d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"/>
                                        <path class="fill-current text-indigo-600"
                                              d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"/>
                                        <path class="fill-current text-indigo-200"
                                              d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"/>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Главная</span>
                                </div>
                            </div>
                        </LinkGroup>

                        <!-- Admin -->
                        <LinkGroup v-if="hasRole('admin')"
                                   :href="route('admin.index')" :active="route().current('admin.index')"
                                   class="mb-3 block text-slate-200 truncate transition duration-150">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-indigo-500"
                                              d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z"/>
                                        <path class="fill-current text-indigo-300"
                                              d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z"/>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Администратор</span>
                                </div>
                            </div>
                        </LinkGroup>

                    </ul>
                </div>

            </div>

            <!-- Expand / collapse button -->
            <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
                <div class="px-3 py-2">
                    <button @click.prevent="sidebarExpanded = !sidebarExpanded">
                        <span class="sr-only">Expand / collapse sidebar</span>
                        <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                            <path class="text-slate-400"
                                  d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"/>
                            <path class="text-slate-600" d="M3 23H1V1h2z"/>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</template>
