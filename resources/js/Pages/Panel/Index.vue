<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import FlashMessage from "@/Shared/FlashMessage.vue";
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";

const user = usePage().props.value.user;
</script>

<template>
    <AppLayout title="Laboratorio">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Laboratorio de Ingeniería Industrial
            </h2>
        </template>
        <div class="mt-10">
            <div class="lg:max-w-7xl mx-auto">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="bg-gray-100 shadow-xl">
                        <flash-message />
                        <div class="grid h-full mt-10 md:grid-cols-5 md:h-25">
                            <div class="col-span-1 p-3">
                                <Link :href="route('calendario')">
                                    <div
                                        class="flex flex-col justify-center h-full items-center p-3 bg-gray-200 rounded-md hover:bg-gray-300"
                                    >
                                        <font-awesome-icon
                                            class="h-10 text-gray-400"
                                            icon="fa-solid fa-calendar-plus"
                                        />
                                        <button class="tr-300">
                                            <span class="text-lg font-medium"
                                                >Programar Cita</span
                                            >
                                        </button>
                                    </div>
                                </Link>
                            </div>
                            <div class="col-span-1 p-3">
                                <Link :href="route('practica.create')">
                                    <div
                                        class="flex flex-col justify-center h-full items-center p-3 bg-gray-200 rounded-md hover:bg-gray-300"
                                    >
                                        <font-awesome-icon
                                            class="h-10 text-gray-400"
                                            icon="fa-solid fa-pen-ruler"
                                        />
                                        <button class="tr-300">
                                            <span class="text-lg font-medium"
                                                >Crear Práctica</span
                                            >
                                        </button>
                                    </div>
                                </Link>
                            </div>
                            <div class="col-span-1 p-3">
                                <Link :href="route('practicas.banco')">
                                    <div
                                        class="flex flex-col justify-center h-full items-center p-3 bg-gray-200 rounded-md hover:bg-gray-300"
                                    >
                                        <font-awesome-icon
                                            class="h-10 text-gray-400"
                                            icon="fa-solid fa-vault"
                                        />
                                        <button class="tr-300">
                                            <span class="text-lg font-medium"
                                                >Banco de Practicas</span
                                            >
                                        </button>
                                    </div>
                                </Link>
                            </div>
                            <div class="col-span-1 p-3">
                                <Link :href="route('evidencia.create')">
                                    <div
                                        class="flex flex-col justify-center h-full items-center p-3 bg-gray-200 rounded-md hover:bg-gray-300"
                                    >
                                        <font-awesome-icon
                                            class="h-10 text-gray-400"
                                            icon="fa-solid fa-file-arrow-up"
                                        />
                                        <button class="tr-300">
                                            <span class="text-lg font-medium"
                                                >Subir una Evidencia</span
                                            >
                                        </button>
                                    </div>
                                </Link>
                            </div>
                            <div
                                class="col-span-1 p-3"
                                v-if="user.role === 'administrador'"
                            >
                                <Link :href="route('pendientes')">
                                    <div
                                        class="flex flex-col justify-center h-full items-center p-3 bg-gray-200 rounded-md hover:bg-gray-300"
                                    >
                                        <font-awesome-icon
                                            class="h-10 text-gray-400"
                                            icon="fa-solid fa-business-time"
                                        />
                                        <button class="tr-300">
                                            <span class="text-lg font-medium"
                                                >Practicas pendientes
                                            </span>
                                        </button>
                                    </div>
                                </Link>
                            </div>
                            <div
                                class="col-span-1 p-3"
                                v-if="user.role === 'administrador'"
                            >
                                <Link :href="route('inventario.index')">
                                    <div
                                        class="flex flex-col justify-center h-full items-center p-3 bg-gray-200 rounded-md hover:bg-gray-300"
                                    >
                                        <font-awesome-icon
                                            class="h-10 text-gray-400"
                                            icon="fa-solid fa-box-archive"
                                        />
                                        <button class="tr-300">
                                            <span class="text-lg font-medium">
                                                Inventario
                                            </span>
                                        </button>
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
