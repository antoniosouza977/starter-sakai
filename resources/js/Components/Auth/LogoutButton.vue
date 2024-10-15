<script setup>
import {router} from "@inertiajs/vue3";

function logout() {
    router.post("/logout")
}
</script>

<template>
    <Button class="ml-3" label="Logout" severity="secondary" size="small" outlined @click="logout"/>
</template>

<style scoped>

</style>
