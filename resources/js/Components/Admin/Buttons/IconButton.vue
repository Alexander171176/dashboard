<script setup>
import { Link } from '@inertiajs/vue3'
import { defineProps } from 'vue'

const props = defineProps({
    href: {
        required: true
    },
    tooltipText: {
        type: String,
        default: 'Default tooltip text'
    }
})
</script>

<template>
    <div class="text-center mr-1">
        <Link :href="href" class="btn border-sky-200 hover:border-sky-500" :title="tooltipText">
            <slot name="svg">
                <!-- По умолчанию ваш SVG будет тут -->
                <svg class="w-4 h-4 fill-current text-indigo-500 shrink-0" viewBox="0 0 16 16">
                    <path
                        d="M14.3 2.3L5 11.6 1.7 8.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"/>
                </svg>
            </slot>
        </Link>
    </div>
</template>
