<script setup>
const props = defineProps({
    value: String,
    inputId: String,
})
</script>

<template>
    <label class=" mb-1" :for="inputId"> <slot></slot> </label>
</template>

<style scoped>

</style>
