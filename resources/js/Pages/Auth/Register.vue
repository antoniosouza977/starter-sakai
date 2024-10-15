<script setup>
import InputError from '@/Components/InputError.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import FloatingConfigurator from "@/Components/FloatingConfigurator.vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Registro"/>

    <FloatingConfigurator/>
    <div
        class="bg-surface-50 dark:bg-surface-950 flex items-center justify-center min-h-screen min-w-[100vw] overflow-hidden">
        <div class="flex flex-col items-center justify-center">
            <div
                style="border-radius: 56px; padding: 0.3rem; background: linear-gradient(180deg, var(--primary-color) 10%, rgba(33, 150, 243, 0) 30%)">
                <div class="w-full bg-surface-0 dark:bg-surface-900 py-20 px-8 sm:px-20" style="border-radius: 53px">
                    <div class="text-center mb-8">
                        <div class="text-surface-900 dark:text-surface-0 text-3xl font-medium mb-4">Registro</div>
                        <span class="text-muted-color font-medium">Isira seus dados para continuar</span>
                    </div>

                    <form @submit.prevent="submit">
                        <div class="mb-3">
                            <label for="name"
                                   class="block text-surface-900 dark:text-surface-0 text-xl font-medium mb-2">Nome</label>
                            <InputText inputId="name" type="text"
                                       class="w-full md:w-[30rem]" v-model="form.name"/>
                            <InputError class="mt-2" :message="form.errors.name"/>
                        </div>

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
                            <Password inputId="password1"
                                      v-model="form.password"
                                      placeholder="Senha"
                                      :toggleMask="true"
                                      prompt-label="Digite uma senha"
                                      weak-label="Muito Fraca"
                                      medium-label="Boa"
                                      strong-label="Muito Boa"
                                      fluid :feedback="true"/>
                            <InputError class="mt-2" :message="form.errors.password"/>
                        </div>

                        <div class="mb-3">
                            <label for="password2"
                                   class="block text-surface-900 dark:text-surface-0 font-medium text-xl mb-2">Confirmação
                                de Senha</label>
                            <Password inputId="password2"
                                      v-model="form.password_confirmation"
                                      placeholder="Confirmação"
                                      :toggleMask="true"
                                      prompt-label="Digite uma senha"
                                      weak-label="Muito Fraca"
                                      medium-label="Boa"
                                      strong-label="Muito Boa"
                                      fluid :feedback="true"/>
                            <InputError class="mt-2" :message="form.errors.password_confirmation"/>
                        </div>

                        <div class="flex items-center justify-end mt-2 mb-8 gap-8">
                            <Link :href="route('login')"
                                  class="font-medium no-underline ml-2 text-right cursor-pointer text-primary">Login
                            </Link>
                        </div>

                        <Button type="submit" label="Registrar" class="w-full"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>
