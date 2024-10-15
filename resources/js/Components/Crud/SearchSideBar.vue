<script setup>

import {ref} from "vue";

const visible = ref(false);
</script>

<template>
    <Button icon="pi pi-search" label="Filtrar" @click="visible = true" />
    <Drawer v-model:visible="visible" header="Filtrar listagem" position="right">
        <slot></slot>
    </Drawer>
</template>

<style scoped>

</style>
