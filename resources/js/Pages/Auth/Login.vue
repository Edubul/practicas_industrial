<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div class="bg-white dark:bg-gray-900">
        <div class="flex justify-center h-screen">
            <div
                class="hidden bg-cover lg:block lg:w-2/3"
                style="background-image: url('/img/bg.jpg')"
            >
                <div
                    class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40"
                >
                    <div>
                        <h2 class="text-4xl font-bold text-white shadow-md">
                            Ingeniería Industrial
                        </h2>

                        <p class="max-w-xl mt-3 text-gray-300 shadow-md">
                            Instituto Tecnológico de Puebla
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6"
            >
                <div class="flex-1">
                    <div class="text-center">
                        <h2
                            class="text-4xl font-bold text-center text-gray-700 dark:text-white"
                        >
                            Login
                        </h2>

                        <p class="mt-3 text-gray-500 dark:text-gray-300">
                            Inicia sesión con tu cuenta.
                        </p>
                        <JetValidationErrors class="mb-4" />
                    </div>

                    <div class="mt-8">
                        <form @submit.prevent="submit">
                            <div>
                                <label
                                    for="username"
                                    class="block mb-2 text-sm text-gray-600 dark:text-gray-200"
                                    >Usuario</label
                                >
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    v-model="form.email"
                                    placeholder=""
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                />
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label
                                        for="password"
                                        class="text-sm text-gray-600 dark:text-gray-200"
                                        >Password</label
                                    >
                                    <!-- <a
                                        href="#"
                                        class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline"
                                        >Forgot password?</a
                                    > -->
                                </div>

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    v-model="form.password"
                                    placeholder=""
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                />
                            </div>

                            <div class="mt-6">
                                <button
                                    type="submit"
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50"
                                >
                                    Sign in
                                </button>
                            </div>
                        </form>

                        <p class="mt-6 text-sm text-center text-white">
                            <a :href="route('evidencia.index')"
                                >¿Eres Alumno?
                                <span class="text-blue-300">
                                    Sube tu evidencia aquí
                                </span>
                            </a>
                        </p>

                        <p class="mt-6 text-sm text-center text-gray-800">
                            Desarrollado por Servicio Social ITP
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
