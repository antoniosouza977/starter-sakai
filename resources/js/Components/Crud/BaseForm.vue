<script setup>
import BackButton from "@/Components/Partials/BackButton.vue";
import {useToast} from "primevue/usetoast";

const toast = useToast();
const props = defineProps({
    form: {
        type: Object,
        required: false,
    },
    title: {
        type: String,
        required: true,
    },
    saveButtonLabel: {
        type: String,
    }
})

const submitForm = () => {
    props.form.submit(props.form.method, props.form.url, {
        onSuccess: () => {
            toast.add({
                severity: 'success',
                summary: 'Sucesso',
                detail: 'Registro salvo com sucesso',
                life: 1000
            });
        }
    })
}

</script>

<template>
    <Fluid>
        <div class="card flex flex-col w-full crud-container">
            <div class="w-full flex justify-between items-center mb-3">
                <h1 class="text-xl">{{ props.title }}</h1>
                <BackButton/>
            </div>
            <form @submit.prevent="submitForm">
                <slot></slot>
            </form>
            <div v-if="props.form" class="mt-auto">
                <Button :disabled="props.form.processing" :loading="props.form.processing" @click.prevent="submitForm" style="width: fit-content" :label="saveButtonLabel || 'Salvar'" rounded/>
            </div>
        </div>
    </Fluid>
</template>

<style scoped lang="scss">
.crud-container {
    min-height: calc(100vh - 12rem);
}
</style>
