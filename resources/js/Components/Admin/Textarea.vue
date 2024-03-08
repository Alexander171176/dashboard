<script setup>
import { defineModel, defineExpose, ref, onMounted } from 'vue'

const model = defineModel({
    type: String,
    required: true
})

const textarea = ref(null)

onMounted(() => {
    if (textarea.value.hasAttribute('autofocus')) {
        textarea.value.focus()
    }
})

defineExpose({
    focus: () => textarea.value.focus()
})
</script>

<template>
    <textarea
        class="border-slate-500 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        v-model="model"
        ref="textarea"
    ></textarea>
</template>

