<script setup>

import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import BaseForm from "@/Components/Crud/BaseForm.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Perfil de Usuário"/>

    <AppLayout>
        <BaseForm title="Meu Perfil">

            <UpdateProfileInformationForm
                class="max-w-xl"
            />

            <Divider/>

            <UpdatePasswordForm class="max-w-xl"/>

            <Divider/>

        </BaseForm>
    </AppLayout>
</template>
