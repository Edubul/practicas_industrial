<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";
</script>

<template>
    <AppLayout title="Laboratorio">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Laboratorio de Ingeniería Industrial
            </h2>
        </template>
        <div class="mt-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="h-full flex flex-col bg-gray-100 shadow-xl">
                        <div
                            class="grid h-28 rounded-md divide-y divide-dashed hover:divide-solid justify-evenly m-3 mt-10 grid-cols-5"
                        >
                            <div class="col-span-1 p-3">
                                <Link :href="route('calendario')">
                                    <div
                                        class="flex flex-col justify-center h-full items-center w-m bg-gray-200 rounded-md hover:bg-gray-300"
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
                                        class="flex flex-col justify-center h-full items-center w-m bg-gray-200 rounded-md hover:bg-gray-300"
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
                                        class="flex flex-col justify-center h-full items-center w-m bg-gray-200 rounded-md hover:bg-gray-300"
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
                                        class="flex flex-col justify-center h-full items-center w-m bg-gray-200 rounded-md hover:bg-gray-300"
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
                            <div class="col-span-1 p-3">
                                <Link :href="route('evidencia.create')">
                                    <div
                                        class="flex flex-col justify-center h-full items-center w-m bg-gray-200 rounded-md hover:bg-gray-300"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
