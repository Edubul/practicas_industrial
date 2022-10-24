<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import Pagination from "@/Shared/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";

const practicas = usePage().props.value.practicas;

function destroy(practica_id){
    if (confirm("¿Estás seguro de eliminar esta cita?")) {
        Inertia.delete(`/practicas/destroy/${practica_id}`);

    }}

</script>
<template>
    <DashboardLayout title="Laboratorio">
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
                                                    v-else-if="
                                                        practica.materias_integradoras !=
                                                        null
                                                    "
                                                >
                                                    Integradora
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
                                                    <div class="flex">
                                                        <div
                                                            class= "cursor-pointer mr-4"
                                                        >
                                                            <Link :href="
                                                            route(
                                                                'practicas.edit',
                                                                practica.id
                                                            )
                                                        ">
                                                                <font-awesome-icon
                                                                    class=""
                                                                    icon="fa-solid fa-pen-to-square"
                                                                />
                                                            </Link>
                                                        </div>
                                                        <div
                                                            class=" cursor-pointer"
                                                        >
                                                            <Link @click="                              destroy(
                                                                practica.id
                                                            )
                                                        ">
                                                                <font-awesome-icon
                                                                    class=""
                                                                    icon="fa-solid fa-trash"
                                                                />
                                                            </Link>
                                                        </div>
                                                    </div>
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
    </DashboardLayout>
</template>
