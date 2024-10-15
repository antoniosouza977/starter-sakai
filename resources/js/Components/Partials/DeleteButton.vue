<script setup>
import {router} from "@inertiajs/vue3";
import {useConfirm} from "primevue/useconfirm";
import {useToast} from "primevue/usetoast";

const props = defineProps({
    url: String,
    icon: String,
})

const confirm = useConfirm();
const toast = useToast();

const deleteModel = () => {
    confirm.require({
        message: 'Tem certeza que deseja proceder?',
        header: 'Confirmação',
        rejectProps: {
            label: 'Cancelar',
            severity: 'secondary'
        },
        acceptProps: {
            label: 'Confirmar'
        },
        accept: () => {
            return router.delete(props.url, {
                onSuccess: () => {
                    toast.add({
                        severity: 'success',
                        summary: 'Sucesso',
                        detail: 'Registro removido',
                        life: 1000
                    });
                }
            })
        },
    });
}

</script>

<template>
    <Button
        :icon="icon ? 'pi pi-trash' : null"
        :label="icon ? null : 'Remover'"
        severity="danger"
        @click="deleteModel"
        title="Remover"
    />
</template>

