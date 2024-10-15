<script setup>
import FloatingConfigurator from '@/Components/FloatingConfigurator.vue';
import {Head, useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login" />

    <FloatingConfigurator/>
    <div
        class="bg-surface-50 dark:bg-surface-950 flex items-center justify-center min-h-screen min-w-[100vw] overflow-hidden">
        <div class="flex flex-col items-center justify-center">
            <div
                style="border-radius: 56px; padding: 0.3rem; background: linear-gradient(180deg, var(--primary-color) 10%, rgba(33, 150, 243, 0) 30%)">
                <div class="w-full bg-surface-0 dark:bg-surface-900 py-20 px-8 sm:px-20" style="border-radius: 53px">
                    <div class="text-center mb-8">
                        <div class="text-surface-900 dark:text-surface-0 text-3xl font-medium mb-4">Bem Vindo!</div>
                        <span class="text-muted-color font-medium">Faça o login para continuar</span>
                    </div>

                    <form @submit.prevent="submit">
                        <div class="mb-3">
                            <label for="email1"
                                   class="block text-surface-900 dark:text-surface-0 text-xl font-medium mb-2">Email</label>
                            <InputText inputId="email1" type="text" placeholder="Endereço de email"
                                       class="w-full md:w-[30rem]" v-model="form.email"/>
                            <InputError class="mt-2" :message="form.errors.email"/>
                        </div>

                        <div class="mb-3">
                            <label for="password1"
                                   class="block text-surface-900 dark:text-surface-0 font-medium text-xl mb-2">Senha</label>
                            <Password inputId="password1" v-model="form.password" placeholder="Senha" :toggleMask="true"
                                       fluid :feedback="false"/>
                            <InputError class="mt-2" :message="form.errors.password"/>
                        </div>

                        <div class="flex items-center justify-between mt-2 mb-8 gap-8">
                            <div class="flex items-center">
                                <Checkbox v-model="form.remember" inputId="rememberme1" binary class="mr-2"></Checkbox>
                                <label for="rememberme1">Lembrar de mim</label>
                            </div>
                            <Link :href="route('register')" class="font-medium no-underline ml-2 text-right cursor-pointer text-primary">Registrar</Link>
                        </div>
                        <Button type="submit" label="Entrar" class="w-full"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.pi-eye {
    transform: scale(1.6);
    margin-right: 1rem;
}

.pi-eye-slash {
    transform: scale(1.6);
    margin-right: 1rem;
}
</style>
