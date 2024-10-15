<script setup>

import {useToast} from "primevue/usetoast";

const props = defineProps({
    form: {
        type: Object,
        required: true,
    }
})

const emit = defineEmits(["close-modal", "saved"]);
const toast = useToast()

const submitForm = () => {
    props.form.submit(props.form.method, props.form.url, {
        onSuccess: () => {
            emit('close-modal')
            emit('saved', props.form.data())
            toast.add({
                severity: 'success',
                summary: "Registrado",
                detail: "Salvo com sucesso",
                life: 1000
            })
            props.form.reset()
        }
    });
}
</script>

<template>

    <slot name="form"/>

    <div class="flex justify-end gap-2">
        <Button type="button" label="Cancelar" severity="secondary" @click="emit('close-modal')"></Button>
        <Button type="button" label="Salvar" :loading="props.form.processing" @click="submitForm"></Button>
    </div>
</template>

