<template>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <Sidebar :sidebarOpen="sidebarOpen" @close-sidebar="sidebarOpen = false" />

        <!-- Content area -->
        <div ref="contentArea" class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->
            <Header :sidebarOpen="sidebarOpen" @toggle-sidebar="sidebarOpen = !sidebarOpen" />

            <main>
                <div class="relative flex">

                    <!-- Messages sidebar -->
                    <MessagesSidebar :msgSidebarOpen="msgSidebarOpen" @close-msgsidebar="msgSidebarOpen = false" />

                    <!-- Messages body -->
                    <div class="grow flex flex-col md:translate-x-0 transition-transform duration-300 ease-in-out" :class="msgSidebarOpen ? 'translate-x-1/3' : 'translate-x-0'">
                        <MessagesHeader :msgSidebarOpen="msgSidebarOpen" @toggle-msgsidebar="msgSidebarOpen = !msgSidebarOpen" />
                        <MessagesBody />
                        <MessagesFooter />
                    </div>

                </div>
            </main>

        </div>

    </div>
</template>

<script>
import { ref, onMounted, watch } from 'vue'
import Sidebar from '@/Partials/User/Sidebar.vue'
import Header from '@/Partials/User/Header.vue'
import MessagesSidebar from '@/Partials/User/messages/MessagesSidebar.vue'
import MessagesHeader from '@/Partials/User/messages/MessagesHeader.vue'
import MessagesBody from '@/Partials/User/messages/MessagesBody.vue'
import MessagesFooter from '@/Partials/User/messages/MessagesFooter.vue'

export default {
    name: 'Messages',
    components: {
        Sidebar,
        Header,
        MessagesSidebar,
        MessagesHeader,
        MessagesBody,
        MessagesFooter,
    },
    setup() {

        const sidebarOpen = ref(false)
        const msgSidebarOpen = ref(true)
        const contentArea = ref(null)

        const handleScroll = () => {
            contentArea.value.scrollTop = 99999999
        }

        onMounted(() => {
            handleScroll()
        })

        watch(msgSidebarOpen, () => {
            handleScroll()
        })

        return {
            sidebarOpen,
            msgSidebarOpen,
            contentArea,
        }
    }
}
</script>
