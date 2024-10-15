<script setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    form: {
        type: Object,
        required: true,
    }
})

const cleanForm = useForm({})


function submit() {
    props.form.get(window.location.href, {
    })
}

function clearQuery() {
    cleanForm.get(window.location.href.split('?')[0])
}
</script>

<template>
    <div class="flex gap-3 justify-between">
    <Button label="Filtrar" @click.prevent="submit"
            :disabled="props.form.processing"
            :loading="props.form.processing"/>
    <Button label="Limpar" severity="warn" @click.prevent="clearQuery"
            :disabled="cleanForm.processing"
            :loading="cleanForm.processing"/>
    </div>
</template>

<style scoped>

</style>
