<script setup>
const props = defineProps({
    value: String,
    for: String,
})
</script>

<template>
    <label class="font-bold" :for="props.for">{{value}}</label>
</template>

