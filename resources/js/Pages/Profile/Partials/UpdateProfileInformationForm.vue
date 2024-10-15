<script setup>
import InputError from '@/Components/InputError.vue';
import {useForm, usePage} from '@inertiajs/vue3';


const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>
    <section>

        <div class="profile-form-group">
            <label for="name">Nome</label>
            <InputText
                inputId="name"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
            />
            <InputError class="mt-2" :message="form.errors.name"/>
        </div>

        <div class="profile-form-group">
            <label for="email">Email</label>
            <InputText
                id="email"
                type="email"
                v-model="form.email"
                required
            />
            <InputError class="mt-2" :message="form.errors.email"/>
        </div>

        <div class="flex items-center gap-4">
            <Button @click.prevent="form.patch(route('profile.update'))" style="width: fit-content;"
                    :disabled="form.processing">Salvar
            </Button>
            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p v-if="form.recentlySuccessful">Salvo.</p>
            </Transition>
        </div>

    </section>
</template>

<style>
.profile-form-group {
    @apply flex flex-col gap-1 mb-3;
}
</style>
