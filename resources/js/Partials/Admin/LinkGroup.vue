<script setup>
import {defineProps} from 'vue'
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    href: {
        type: String,
        required: true
    },
    activeClass: {
        type: String,
        default: 'text-yellow-200' // Замените на класс для активного состояния
    },
    inactiveClass: {
        type: String,
        default: 'text-white' // Замените на класс для неактивного состояния
    },
    active: Boolean
});
</script>

<template>
    <Link :href="href"
          :class="{
            'inline-flex items-center w-full text-sm font-semibold dark:relative': true,
            [activeClass]: active,
            [inactiveClass]: !active
          }">
        <span class="flex ml-3" :class="{ [activeClass]: active, [inactiveClass]: !active }">
            <slot></slot>
        </span>
    </Link>
</template>


