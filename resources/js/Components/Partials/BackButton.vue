<script setup>
import {router, usePage} from "@inertiajs/vue3";

const page = usePage();
const prevUrl = page.props.previousUrl;

const goBack = () => {
    if (prevUrl === 'empty') {
        router.get(route('dashboard'));
    }
    router.get(prevUrl);
}
</script>

<template>
    <Button @click.prevent="goBack" style="width: fit-content;" icon="pi pi-arrow-left" label="Voltar" severity="secondary"/>
</template>

