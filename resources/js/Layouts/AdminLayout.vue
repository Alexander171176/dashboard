<script setup>
import {ref,computed} from 'vue'
import Sidebar from '@/Partials/Admin/Sidebar.vue'
import Header from '@/Partials/Admin/Header.vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const user = computed(() => page.props.auth.user)

const sidebarOpen = ref(false);
</script>

<template>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <Sidebar :sidebarOpen="sidebarOpen" @close-sidebar="sidebarOpen = false"/>

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->
            <Header :sidebarOpen="sidebarOpen" @toggle-sidebar="sidebarOpen = !sidebarOpen"/>

            <main>
                <slot/>
            </main>

        </div>

    </div>
</template>
