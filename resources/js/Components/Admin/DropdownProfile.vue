<template>
    <div class="relative inline-flex">
        <button
            ref="trigger"
            class="inline-flex justify-center items-center group"
            aria-haspopup="true"
            @click.prevent="dropdownOpen = !dropdownOpen"
            :aria-expanded="dropdownOpen"
        >
            <img class="w-8 h-8 rounded-full" :src="userAvatar" width="32" height="32" alt="User"/>
            <div class="flex items-center truncate">
                <span class="truncate ml-2 text-sm font-medium group-hover:text-slate-500">
                    {{ $page.props.auth.user.name }}
                </span>
                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                </svg>
            </div>
        </button>
        <transition
            enter-active-class="transition ease-out duration-200 transform"
            enter-from-class="opacity-0 -translate-y-2"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition ease-out duration-200"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div v-show="dropdownOpen"
                 class="origin-top-right z-10 absolute top-full min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                 :class="align === 'right' ? 'right-0' : 'left-0'">
                <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200">
                    <div class="font-medium text-slate-800">{{ $page.props.auth.user.name }}</div>
                    <div class="text-xs text-slate-500 italic">Администратор</div>
                </div>
                <ul
                    ref="dropdown"
                    @focusin="dropdownOpen = true"
                    @focusout="dropdownOpen = false"
                >
                    <DropdownLink :href="route('profile.index')"> Профиль</DropdownLink>
                    <router-link
                        class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3"
                        :to="{ name: 'logout' }" method="post" as="button"
                        @click.prevent="$inertia.post(route('logout'))">
                        Выход
                    </router-link>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue'
import { usePage } from '@inertiajs/vue3'
import Dropdown from '@/Components/Admin/Dropdown.vue'
import DropdownLink from '@/Components/Admin/DropdownLink.vue'
import defaultAvatarka from '../../../images/user-avatar-32.png'

export default {
    name: 'DropdownProfile',
    props: ['align', 'avatar'],
    components: {
        Dropdown,
        DropdownLink
    },
    setup() {
        const { user, avatar } = usePage().props;
        const defaultAvatar = defaultAvatarka; // Замените путь на ваш путь к изображению по умолчанию

        // Путь к изображению пользователя
        const userAvatar = ref(avatar ? `/storage/${avatar}` : defaultAvatar);

        const dropdownOpen = ref(false)
        const trigger = ref(null)
        const dropdown = ref(null)

        // close on click outside
        const clickHandler = ({ target }) => {
            if (!dropdownOpen.value || dropdown.value.contains(target) || trigger.value.contains(target)) return
            dropdownOpen.value = false
        }

        // close if the esc key is pressed
        const keyHandler = ({ keyCode }) => {
            if (!dropdownOpen.value || keyCode !== 27) return
            dropdownOpen.value = false
        }

        onMounted(() => {
            document.addEventListener('click', clickHandler)
            document.addEventListener('keydown', keyHandler)
        })

        onUnmounted(() => {
            document.removeEventListener('click', clickHandler)
            document.removeEventListener('keydown', keyHandler)
        })

        return {
            user,
            userAvatar,
            dropdownOpen,
            trigger,
            dropdown,
        }
    }
}
</script>

