<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

const cita = usePage().props.value.cita;
const user = usePage().props.value.user;

function destroy(id){
    if (confirm("¿Está seguro de aceptar la práctica?")) {
        Inertia.delete(`/cita/${id}`);
    }
}

</script>

<template>
    <AppLayout title="Laboratorio">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Laboratorio de Ingeniería Industrial
            </h2>
        </template>
        <div class="bg-gray-100">
            <section>
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div
                            class="p-5 bg-white flex items-center mx-auto border-b mb-10 border-gray-200 rounded-lg sm:flex-row flex-col"
                        >
                            <div
                                class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center flex-shrink-0"
                            ></div>
                            <div
                                class="flex-grow sm:text-left text-center mt-6 sm:mt-0"
                            >
                                <h1
                                    class="text-black text-2xl title-font font-bold mb-2"
                                >
                                    Detalles de Cita
                                </h1>
                                <p class="leading-relaxed text-base">
                                    Profesor: {{ cita.name }}
                                    {{ cita.last_name }}
                                </p>

                                <div class="md:flex font-bold text-gray-800">
                                    <div class="w-full md:w-1/2 flex space-x-3">
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">
                                                Practica
                                            </h2>
                                            <a
                                                :href="`/practicas/${cita.clave_practica}.pdf`"
                                                target="_blank"
                                                class="text-blue-500"
                                            >
                                                {{
                                                    cita.nombre_practica
                                                }}
                                                (Click para ver)
                                            </a>
                                        </div>
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">
                                                Taller
                                            </h2>
                                            <p>{{ cita.nombre }}</p>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 flex space-x-3">
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">Fecha</h2>
                                            <p>{{ cita.fecha }}</p>
                                        </div>
                                        <div class="w-1/2">
                                            <h2 class="text-gray-500">
                                                Horario
                                            </h2>
                                            <p>{{ cita.horario }}</p>
                                        </div>
                                        <div class="w-1/2" v-if="user.role === 'administrador'"
>
                                            <button type="button" @click="destroy(cita.id)" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </AppLayout>
</template>
