<script setup>
import {computed, onMounted, onUnmounted, watch} from 'vue'

const props = defineProps({
    show: {
        type: Boolean,
        default: false
    },
    maxWidth: {
        type: String,
        default: '2xl'
    },
    closeable: {
        type: Boolean,
        default: true
    }
})

const emit = defineEmits(['close'])

watch(
    () => props.show,
    () => {
        if (props.show) {
            document.body.style.overflow = 'hidden'
        } else {
            document.body.style.overflow = null
        }
    }
)

const close = () => {
    if (props.closeable) {
        emit('close')
    }
}

const closeOnEscape = (e) => {
    if (e.key === 'Escape' && props.show) {
        close()
    }
}

onMounted(() => document.addEventListener('keydown', closeOnEscape))

onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape)
    document.body.style.overflow = null
})

const maxWidthClass = computed(() => {
    return {
        sm: 'sm:max-w-sm',
        md: 'sm:max-w-md',
        lg: 'sm:max-w-lg',
        xl: 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl'
    }[props.maxWidth]
})
</script>

<template>
    <Teleport to="body">
        <Transition leave-active-class="duration-200">
            <div v-show="show" class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6" scroll-region>
                <Transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <div v-show="show" class="fixed inset-0 transform transition-all" @click="close">
                        <div class="absolute inset-0 bg-slate-800 opacity-25"/>
                    </div>
                </Transition>

                <Transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    <div
                        v-show="show"
                        class="mb-6 bg-white rounded overflow-hidden shadow transform transition-all max-w-lg w-full max-h-full sm:w-full sm:mx-auto"
                        :class="maxWidthClass"
                    >
                        <div class="p-5 flex justify-center space-x-4">
                            <!-- Icon -->
                            <div
                                class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-rose-100">
                                <svg class="w-4 h-4 shrink-0 fill-current text-rose-500"
                                     viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"/>
                                </svg>
                            </div>
                            <!-- Content -->
                            <div>
                                <!-- Modal header -->
                                <div class="mb-2 mt-2">
                                    <div class="text-lg font-semibold text-slate-800">Вы уверены, что хотите удалить ?
                                    </div>
                                </div>
                                <!-- Modal content -->
                                <div class="mb-10">
                                    <div class="space-y-2">
                                        <p>Данная операция не обратима и удалит данные безвозвратно !</p>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="flex flex-wrap justify-end space-x-2">
                                    <slot v-if="show"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </Transition>
            </div>
        </Transition>
    </Teleport>
</template>
