<script setup>
import { defineModel, defineExpose, ref, onMounted } from 'vue'

const model = defineModel({
    type: Number,
    required: true
})

const input = ref(null)

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus()
    }
})

defineExpose({focus: () => input.value.focus()})
</script>

<template>
    <input
        class="border-slate-500 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        v-model="model"
        ref="input"
    />
</template>



