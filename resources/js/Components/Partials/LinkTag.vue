<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    url: {
        type: String,
        required: true
    },
    label: {
        type: String,
        required: true
    },
})

</script>

<template>
    <Link :href="url">
        <Badge class="flex gap-2" severity="info" size="large">
            {{ label }}
            <i class="pi pi-link"></i>
        </Badge>
    </Link>
</template>

