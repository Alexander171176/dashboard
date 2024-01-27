<script setup>
import { Link } from '@inertiajs/vue3'
import { defineProps } from 'vue'

const props = defineProps({
    href: {
        type: String,
        required: true
    }
})
</script>

<template>
    <Link :href="href" class="btn bg-sky-600 hover:bg-sky-700 text-white">
        <span class="hidden xs:block ml-2">
            <slot name="icon">
                <!-- По умолчанию ваш SVG будет тут -->
                <i class="fas fa-plus"></i>
            </slot>
        </span>
        <span class="hidden xs:block ml-2">
            <slot />
        </span>
    </Link>
</template>
