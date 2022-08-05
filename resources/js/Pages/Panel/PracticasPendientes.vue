<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "@/Shared/Pagination.vue";
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";

const practicas = usePage().props.value.practicas;
console.log(practicas.status);
</script>
<template>
    <AppLayout title="Laboratorio">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Practicas Pendientes
            </h2>
        </template>
        <div class="mt-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div
                                class="py-2 inline-block min-w-full sm:px-6 lg:px-8"
                            >
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="border-b">
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="text-sm font-bold text-gray-900 px-6 py-4 text-left"
                                                >
                                                    Profesor
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="text-sm font-bold text-gray-900 px-6 py-4 text-left"
                                                >
                                                    Materia
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="text-sm font-bold text-gray-900 px-6 py-4 text-left"
                                                >
                                                    Tipo de práctica
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="text-sm font-bold text-gray-900 px-6 py-4 text-left"
                                                >
                                                    Status
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="text-sm font-bold text-gray-900 px-6 py-4 text-left"
                                                ></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="border-b"
                                                v-for="practica in practicas.data"
                                            >
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                >
                                                    {{ practica.last_name }}
                                                    {{ practica.name }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                >
                                                    {{ practica.materia }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                    v-if="
                                                        practica.profesores ==
                                                        null
                                                    "
                                                >
                                                    Individual
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                    v-else
                                                >
                                                    Colegiada
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                                                >
                                                    <span
                                                        v-if="
                                                            practica.status ==
                                                            'Aprobado'
                                                        "
                                                        class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded-full"
                                                        >Aprobado
                                                    </span>
                                                    <span
                                                        v-else
                                                        class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-gray-500 text-white rounded-full"
                                                        >Pendiente</span
                                                    >
                                                </td>
                                                <td>
                                                    <a
                                                        :href="
                                                            route(
                                                                'practicas.edit',
                                                                practica.id
                                                            )
                                                        "
                                                        type="button"
                                                        class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out"
                                                    >
                                                        Ver
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <pagination
                                    class="mt-6 p-3"
                                    :links="practicas.links"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
