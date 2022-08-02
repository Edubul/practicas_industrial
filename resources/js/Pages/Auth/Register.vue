<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import ApplicationMark from "@/Jetstream/ApplicationMark.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

const form = useForm({
    name: "",
    last_name: "",
    num_control: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />

    <JetAuthenticationCard>
        <template #logo>
            <ApplicationMark />
        </template>

        <JetValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div class="flex">
                <div flex="flex flex-col ">
                    <div>
                        <JetLabel for="name" value="Nombre(s)" />
                    </div>
                    <div>
                        <JetInput
                            id="name"
                            v-model="form.name"
                            type="text"
                            class="mt-1 w-11/12 block w-full"
                            required
                            autofocus
                            autocomplete="name"
                        />
                    </div>
                </div>
                <div flex="flex flex-col">
                    <div>
                        <JetLabel for="apellidos" value="Apellido(s)" />
                    </div>
                    <div>
                        <JetInput
                            id="apellidos"
                            v-model="form.last_name"
                            type="text"
                            class="mt-1 w-full block w-full"
                            required
                            autofocus
                            autocomplete="apellidos"
                        />
                    </div>
                </div>
            </div>

            <div></div>

            <div>
                <JetLabel for="num_control" value="Numero de control" />
                <JetInput
                    id="num_control"
                    v-model="form.num_control"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="num_control"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="email" value="Correo institucional" />
                <JetInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password" value="Password" />
                <JetInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <JetLabel
                    for="password_confirmation"
                    value="Confirm Password"
                />
                <JetInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <JetButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Registrar
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
