<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Label from "@/Jetstream/Label.vue";
import SelectInput from "@/Jetstream/SelectInput.vue";
import JetInput from "@/Jetstream/Input.vue";

import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";
</script>

<style scoped>
tr {
    border: 1px solid blue !important;
    transform: translateY(23px);
}
</style>
<template>
    <AppLayout title="Laboratorio">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Practica
            </h2>
        </template>
        <div class="my-10">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="p-5">
                        <div class="w-full">
                            <div class="mb-3">
                                <h2 class="text-lg font-semibold">General</h2>
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <Label>Materia</Label>
                                        <JetInput type="text" class="w-full" />
                                    </div>
                                    <div class="w-1/2 ml-3">
                                        <Label>Unidad</Label>
                                        <JetInput type="text" class="w-full" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <Label>Tema</Label>
                                <JetInput type="text" class="w-full" />
                            </div>

                            <div class="mb-3">
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <Label>Nombre de la practica</Label>
                                        <JetInput type="text" class="w-full" />
                                    </div>
                                    <div class="w-1/2 ml-3">
                                        <Label>No. de la practica</Label>
                                        <JetInput
                                            type="text"
                                            placeholder="Deshabilitado"
                                            class="w-full bg-gray-300"
                                            disabled
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <Label>Atributo de egreso:</Label>
                                <select-input>
                                    <option value="">Calidad</option>
                                    <option value="">Manteminiento</option>
                                    <option value="">
                                        Manufactura y Tecnologías
                                    </option>
                                    <option value="">
                                        Innovacion / Emprendimiento
                                    </option>
                                    <option value="">
                                        Seguridad, Salud y Medio Ambiente
                                    </option>
                                </select-input>
                            </div>
                            <div class="mb-3">
                                <Label>Requerimientos de ubicacion</Label>
                                <div class="flex">
                                    <div class="w-full">
                                        <Label>Opcion 1: </Label>
                                        <select-input>
                                            Desarrollo de Capital Humano
                                            <option>Antropometría</option>
                                            <option>Estudio del trabajo</option>
                                            <option>Ingeniería Inversa</option>
                                            <option>Metrología</option>
                                            <option>
                                                Sistemas de Manufactura
                                            </option>
                                            <option>
                                                Procesos Productivos y Ensamble
                                            </option>
                                            <option>Metal Mecánica</option>
                                            <option>Maquinados</option>
                                            <option>Ergonomía Ambiental</option>
                                            <option>Mirador Industrial</option>
                                            <option>
                                                Centro de Negocios A
                                            </option>
                                            <option>
                                                Centro de Negocios B
                                            </option>
                                            <option>
                                                Aula de clases asignada
                                            </option>
                                        </select-input>
                                    </div>

                                    <div class="w-full ml-3">
                                        <Label>Opcion 2: </Label>
                                        <select-input>
                                            Desarrollo de Capital Humano
                                            <option>Antropometría</option>
                                            <option>Estudio del trabajo</option>
                                            <option>Ingeniería Inversa</option>
                                            <option>Metrología</option>
                                            <option>
                                                Sistemas de Manufactura
                                            </option>
                                            <option>
                                                Procesos Productivos y Ensamble
                                            </option>
                                            <option>Metal Mecánica</option>
                                            <option>Maquinados</option>
                                            <option>Ergonomía Ambiental</option>
                                            <option>Mirador Industrial</option>
                                            <option>
                                                Centro de Negocios A
                                            </option>
                                            <option>
                                                Centro de Negocios B
                                            </option>
                                            <option>
                                                Aula de clases asignada
                                            </option>
                                        </select-input>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <Label>Equipo de protección: </Label>
                                <select-input class="mb-3 w-full">
                                    <option>Tapones Auditivos</option>
                                    <option>
                                        Gafas de seguridad transparente
                                    </option>
                                    <option>Zapato Cerrado</option>
                                    <option>Bota Industrial</option>
                                    <option>
                                        Gafas de seguridad 5 sombras
                                    </option>
                                    <option>Careta para soldar</option>
                                    <option>Mandil para para soldar</option>
                                    <option>Guantes de nitrilo</option>
                                    <option>Guantes cubiertos de latex</option>
                                    <option>
                                        Guantes resistentes a cortes
                                    </option>
                                    <option>Guantes de polietileno</option>
                                    <option>
                                        Guantes de algodón para inspección
                                    </option>
                                    <option>Guantes de piel</option>
                                    <option>Guantes para soldar</option>
                                    <option>Mangas para soldar</option>
                                    <option>Casco</option>
                                </select-input>
                            </div>

                            <h2 class="text-lg font-semibold">
                                Maquinaria-Herramientas
                            </h2>
                            <Label>Maquinaria o equipo a utilizar: </Label>
                            <div class="flex">
                                <select-input class="mb-3 w-1/2">
                                    <option>Mesa de bandas</option>
                                    <option>Mesa giratoria octagonal</option>
                                    <option>Mesa giratoria de paleta</option>
                                    <option>Emplayadora</option>
                                    <option>
                                        Banda transportandora con 6 estaciones
                                    </option>
                                    <option>Extrusora</option>
                                    <option>Inyectora</option>
                                    <option>CNC Plasma</option>
                                    <option>CNC Router</option>
                                    <option>Laser grabado</option>
                                    <option>Escaner 3D</option>
                                    <option>Comparador Óptico</option>
                                    <option>Soldadora manual</option>
                                    <option>Cortadora</option>
                                    <option>Taladro banco</option>
                                    <option>Esmeril</option>
                                    <option>Banco</option>
                                    <option>
                                        Toda la herramienta semiautomática
                                    </option>
                                    <option>No aplica</option>
                                </select-input>
                                <select-input class="mb-3 ml-3 w-1/2">
                                    <option>Mesa de bandas</option>
                                    <option>Mesa giratoria octagonal</option>
                                    <option>Mesa giratoria de paleta</option>
                                    <option>Emplayadora</option>
                                    <option>
                                        Banda transportandora con 6 estaciones
                                    </option>
                                    <option>Extrusora</option>
                                    <option>Inyectora</option>
                                    <option>CNC Plasma</option>
                                    <option>CNC Router</option>
                                    <option>Laser grabado</option>
                                    <option>Escaner 3D</option>
                                    <option>Comparador Óptico</option>
                                    <option>Soldadora manual</option>
                                    <option>Cortadora</option>
                                    <option>Taladro banco</option>
                                    <option>Esmeril</option>
                                    <option>Banco</option>
                                    <option>
                                        Toda la herramienta semiautomática
                                    </option>
                                    <option>No aplica</option>
                                </select-input>
                            </div>
                            <div class="flex">
                                <select-input class="mb-3 w-1/2">
                                    <option>Mesa de bandas</option>
                                    <option>Mesa giratoria octagonal</option>
                                    <option>Mesa giratoria de paleta</option>
                                    <option>Emplayadora</option>
                                    <option>
                                        Banda transportandora con 6 estaciones
                                    </option>
                                    <option>Extrusora</option>
                                    <option>Inyectora</option>
                                    <option>CNC Plasma</option>
                                    <option>CNC Router</option>
                                    <option>Laser grabado</option>
                                    <option>Escaner 3D</option>
                                    <option>Comparador Óptico</option>
                                    <option>Soldadora manual</option>
                                    <option>Cortadora</option>
                                    <option>Taladro banco</option>
                                    <option>Esmeril</option>
                                    <option>Banco</option>
                                    <option>
                                        Toda la herramienta semiautomática
                                    </option>
                                    <option>No aplica</option>
                                </select-input>
                                <select-input class="mb-3 ml-3 w-1/2">
                                    <option>Mesa de bandas</option>
                                    <option>Mesa giratoria octagonal</option>
                                    <option>Mesa giratoria de paleta</option>
                                    <option>Emplayadora</option>
                                    <option>
                                        Banda transportandora con 6 estaciones
                                    </option>
                                    <option>Extrusora</option>
                                    <option>Inyectora</option>
                                    <option>CNC Plasma</option>
                                    <option>CNC Router</option>
                                    <option>Laser grabado</option>
                                    <option>Escaner 3D</option>
                                    <option>Comparador Óptico</option>
                                    <option>Soldadora manual</option>
                                    <option>Cortadora</option>
                                    <option>Taladro banco</option>
                                    <option>Esmeril</option>
                                    <option>Banco</option>
                                    <option>
                                        Toda la herramienta semiautomática
                                    </option>
                                    <option>No aplica</option>
                                </select-input>
                            </div>

                            <Label>Instrumentos de medición a utilizar</Label>
                            <select-input class="mb-3">
                                <option value="">Cinta Metrica</option>
                                <option value="">Flexometro</option>
                            </select-input>
                            <select-input class="mb-3">
                                <option value="">Cinta Métrica</option>
                                <option value="">Goniometro</option>
                                <option value="">Luxometro</option>
                                <option value="">Bascula</option>
                                <option value="">Sonometro</option>
                                <option value="">Vibrometro</option>
                                <option value="">Picometro</option>
                                <option value="">Camara Fotografica</option>
                                <option value="">Cronometro</option>
                            </select-input>
                            <select-input class="mb-3">
                                Calibrador</select-input
                            >
                            <div class="mb-3">
                                <Label>Material Didactico</Label>
                                <textarea
                                    name=""
                                    id=""
                                    class="w-full border border-gray-300"
                                    rows="5"
                                ></textarea>
                            </div>
                            <Label>Herramientas Manuales a utilizar</Label>
                            <select-input class="mb-3"></select-input>
                            <select-input class="mb-3"></select-input>
                            <select-input class="mb-3"></select-input>
                            <select-input class="mb-3"></select-input>
                            <Label>Herramientas Semiautomáticas</Label>
                            <select-input class="mb-3"></select-input>
                            <h2 class="text-lg font-semibold">Reglamento</h2>
                            <textarea
                                name=""
                                id=""
                                class="w-full border border-gray-300"
                                rows="5"
                            ></textarea>

                            <Label>
                                Recomendaciones de seguridad adicionales:
                            </Label>
                            <textarea
                                name=""
                                id=""
                                class="w-full border border-gray-300"
                                rows="5"
                            ></textarea>
                            <h2 class="text-lg font-semibold mt-4">
                                Desarrollo de la practica
                            </h2>
                            <div class="mb-3">
                                <Label>Objetivo</Label>
                                <textarea
                                    name=""
                                    id=""
                                    class="w-full border border-gray-300"
                                    rows="5"
                                ></textarea>
                            </div>
                            <div class="mb-3">
                                <Label>Pasos</Label>
                                <textarea
                                    name=""
                                    id=""
                                    class="w-full border border-gray-300"
                                    rows="5"
                                ></textarea>
                            </div>
                            <div class="mb-3">
                                <Label>Fuentes de información</Label>
                                <textarea
                                    name=""
                                    id=""
                                    class="w-full border border-gray-300"
                                    rows="5"
                                ></textarea>
                            </div>
                            <div class="mb-3">
                                <Label>Material digital de apoyo</Label>
                                <input type="file" name="" id="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
