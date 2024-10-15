<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    }
})

</script>

<template>
    <Link :href="props.href">
        <Button icon="pi pi-pen-to-square" title="Editar" severity="warn"/>
    </Link>
</template>

