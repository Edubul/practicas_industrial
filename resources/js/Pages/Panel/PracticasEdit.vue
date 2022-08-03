<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Label from "@/Jetstream/Label.vue";
import SelectInput from "@/Jetstream/SelectInput.vue";
import JetInput from "@/Jetstream/Input.vue";
import ValidationErrors from "@/Jetstream/ValidationErrors.vue";
import JetButton from "@/Jetstream/Button.vue";
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import { ref, watch, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

// Page props
const titular = usePage().props.value.titular;
const profesores_info = usePage().props.value.profesores;
const materias = usePage().props.value.materias;
const equipo_proteccion = usePage().props.value.equipo_proteccion;
const instrumentos_medicion = usePage().props.value.instrumentos_medicion;
const herramienta_manu = usePage().props.value.herramientas_man;
const maquinaria = usePage().props.value.maquinaria;

// Arrays
const maq_usar = ref(usePage().props.value.maquinaria_array);
const equipo_prot = ref(usePage().props.value.equipo_prot_array);
const instrumentos_med = ref(usePage().props.value.inst_med_array);
const herramientas_man = ref(
    usePage().props.value.herramientas_man_array == null
        ? []
        : usePage().props.value.herramientas_man_array
);
const profesores = ref(usePage().props.value.profesores_array);

// edit
const practica_edit = usePage().props.value.practicas;

const form = useForm({
    profesores: practica_edit.profesores,
    no_pract: practica_edit.clave_practica,
    materia: practica_edit.materia,
    unidad: practica_edit.unidad,
    tema: practica_edit.tema,
    nombre_practica: practica_edit.nombre_practica,
    atributo_egreso: practica_edit.atributo_egreso,
    req_ub_op1: practica_edit.req_ub_op1,
    req_ub_op2: practica_edit.req_ub_op2,
    equipo_prot: practica_edit.equipo_prot_array,
    maq_usar: practica_edit.maq_usar,
    inst_med: practica_edit.inst_med,
    material_didactico: practica_edit.material_didactico,
    herr_man: practica_edit.herr_man,
    recom_seguridad: practica_edit.recom_seguridad,
    objetivo: practica_edit.objetivo,
    pasos: practica_edit.pasos,
    fuentes_info: practica_edit.fuentes_info,
    material_apoyo: practica_edit.material_apoyo,
    status: practica_edit.status,
});

function update() {
    form.equipo_prot = equipo_prot.value;
    form.maq_usar = maq_usar.value;
    form.inst_med = instrumentos_med.value;
    form.herr_man = herramientas_man.value;
    form.profesores = profesores.value;
    if (confirm("¿Está seguro de aceptar la práctica?")) {
        Inertia.put(`/practica/${practica_edit.id}`, form);
    }
}

function isIndividual() {
    return profesores.value == null ? true : false;
}

function addElement(element, type) {
    if (element == null || element == "") return;
    switch (type) {
        case "maquinaria":
            maq_usar.value.find((e) => e == element)
                ? alert("Ya se ha agregado esta maquinaria")
                : maq_usar.value.push(element);
            break;
        case "equipo_proteccion":
            equipo_prot.value.find((e) => e == element)
                ? alert("Ya se ha agregado este equipo de protección")
                : equipo_prot.value.push(element);
            break;
        case "instrumentos_medicion":
            instrumentos_med.value.find((e) => e == element)
                ? alert("Ya se ha agregado este instrumento de medición")
                : instrumentos_med.value.push(element);
            break;
        case "herramientas_manuales":
            herramientas_man.value.find((e) => e == element)
                ? alert("Ya se ha agregado esta herramienta manual")
                : herramientas_man.value.push(element);
            break;
        case "profesores":
            profesores.value.find((e) => e == element)
                ? alert("Ya se ha agregado este profesor")
                : profesores.value.push(element);
    }
}

function removeElement(element, type) {
    switch (type) {
        case "maquinaria":
            maq_usar.value.splice(maq_usar.value.indexOf(element), 1);
            break;
        case "equipo_proteccion":
            equipo_prot.value.splice(equipo_prot.value.indexOf(element), 1);
            break;
        case "instrumentos_medicion":
            instrumentos_med.value.splice(
                instrumentos_med.value.indexOf(element),
                1
            );
            break;
        case "herramientas_manuales":
            herramientas_man.value.splice(
                herramientas_man.value.indexOf(element),
                1
            );
            break;
        case "profesores":
            profesores.value.splice(profesores.value.indexOf(element), 1);
            break;
    }
}
</script>

<template>
    <AppLayout title="Laboratorio">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Practica ID: {{ practica_edit.id }}
            </h2>
        </template>
        <div class="my-10">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="p-5">
                        <div class="w-full">
                            <div class="mb-3">
                                <ValidationErrors />
                                <div class="mb-5">
                                    <ul
                                        class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0"
                                        id="tabs-tab3"
                                        role="tablist"
                                    >
                                        <li
                                            class="nav-item"
                                            role="presentation"
                                            v-if="isIndividual()"
                                        >
                                            <a
                                                href="#tabs-home3"
                                                class="nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active"
                                                id="tabs-home-tab3"
                                                data-bs-toggle="pill"
                                                data-bs-target="#tabs-home3"
                                                role="tab"
                                                aria-controls="tabs-home3"
                                                aria-selected="true"
                                                >Individual</a
                                            >
                                        </li>
                                        <li
                                            class="nav-item"
                                            role="presentation"
                                            v-else
                                        >
                                            <a
                                                href="#tabs-profile3"
                                                class="nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                                                id="tabs-profile-tab3"
                                                data-bs-toggle="pill"
                                                data-bs-target="#tabs-profile3"
                                                role="tab"
                                                aria-controls="tabs-profile3"
                                                aria-selected="false"
                                                >Colegiada</a
                                            >
                                        </li>
                                    </ul>
                                    <div
                                        class="tab-content bg-gray-100 p-4"
                                        id="tabs-tabContent3"
                                    >
                                        <div
                                            class="tab-pane fade show active"
                                            id="tabs-home3"
                                            role="tabpanel"
                                            v-if="isIndividual()"
                                            aria-labelledby="tabs-home-tab3"
                                        >
                                            Titular: {{ titular.last_name }}
                                            {{ titular.name }}
                                        </div>
                                        <div
                                            v-else
                                            class="tab-pane fade"
                                            id="tabs-profile3"
                                            role="tabpanel"
                                            aria-labelledby="tabs-profile-tab3"
                                        >
                                            <p>Lista de profesores</p>

                                            <div class="mb-3">
                                                <div
                                                    class="flex flex-wrap space-x-2 ml-3 mb-3"
                                                    v-for="profesor in profesores"
                                                >
                                                    <span
                                                        class="px-4 py-2 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max cursor-pointer active:bg-gray-300 transition duration-300 ease"
                                                    >
                                                        {{ profesor }}

                                                        <button
                                                            @click="
                                                                removeElement(
                                                                    form.profesores,
                                                                    'profesores'
                                                                )
                                                            "
                                                            class="bg-transparent hover focus:outline-none"
                                                        >
                                                            <svg
                                                                aria-hidden="true"
                                                                focusable="false"
                                                                data-prefix="fas"
                                                                data-icon="times"
                                                                class="w-3 ml-3"
                                                                role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 352 512"
                                                            >
                                                                <path
                                                                    fill="currentColor"
                                                                    d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"
                                                                ></path>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <label
                                                    class="block text-left"
                                                    style="max-width: 300px"
                                                >
                                                    <span class="text-gray-700">
                                                        Profesores
                                                    </span>
                                                    <select
                                                        class="form-multiselect block w-full mt-1"
                                                        v-model="
                                                            form.profesores
                                                        "
                                                        multiple
                                                    >
                                                        <option
                                                            v-for="profesor in profesores_info"
                                                        >
                                                            {{
                                                                profesor.lastname
                                                            }}
                                                            {{ profesor.name }}
                                                        </option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="w-1/2">
                                                <JetButton
                                                    @click="
                                                        addElement(
                                                            form.profesores,
                                                            'profesores'
                                                        )
                                                    "
                                                >
                                                    Agregar profesor
                                                </JetButton>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="text-lg font-semibold">General</h2>
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <Label>Materia</Label>
                                        <select-input
                                            v-model="form.materia"
                                            class="w-full"
                                        >
                                            <option value="">
                                                Seleccione una materia
                                            </option>
                                            <option v-for="materia in materias">
                                                {{ materia.nombre }}
                                            </option>
                                        </select-input>
                                    </div>
                                    <div class="w-1/2 ml-3">
                                        <Label>Unidad</Label>
                                        <JetInput
                                            v-model="form.unidad"
                                            type="text"
                                            class="w-full"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <Label>Tema</Label>
                                <JetInput
                                    v-model="form.tema"
                                    type="text"
                                    class="w-full"
                                />
                            </div>

                            <div class="mb-3">
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <Label>Nombre de la practica</Label>
                                        <JetInput
                                            v-model="form.nombre_practica"
                                            type="text"
                                            class="w-full"
                                        />
                                    </div>
                                    <div class="w-1/2 ml-3">
                                        <Label>No. de la practica</Label>
                                        <JetInput
                                            v-model="form.no_pract"
                                            type="text"
                                            class="w-full"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <Label>Atributo de egreso:</Label>
                                <select-input v-model="form.atributo_egreso">
                                    <option>Calidad</option>
                                    <option>Manteminiento</option>
                                    <option>Manufactura y Tecnologías</option>
                                    <option>Innovacion / Emprendimiento</option>
                                    <option>
                                        Seguridad, Salud y Medio Ambiente
                                    </option>
                                </select-input>
                            </div>
                            <div class="mb-3">
                                <Label>Requerimientos de ubicacion</Label>
                                <div class="flex">
                                    <div class="w-full">
                                        <Label>Opcion 1: </Label>
                                        <select-input v-model="form.req_ub_op1">
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
                                            <option>Taller Secundario</option>
                                        </select-input>
                                    </div>

                                    <div class="w-full ml-3">
                                        <Label>Opcion 2: </Label>
                                        <select-input v-model="form.req_ub_op2">
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

                            <h2 class="text-lg font-semibold">
                                Maquinaria-Herramientas
                            </h2>
                            <Label>Maquinaria a utilizar: </Label>
                            <div
                                class="flex flex-row bg-gray-100 p-3 rounded-md mb-3"
                            >
                                <div class="flex flex-col max-w-xs">
                                    <select-input
                                        class="mb-3 w-full"
                                        v-model="form.maq_usar"
                                    >
                                        <option v-for="maquina in maquinaria">
                                            {{ maquina.nombre_producto }}
                                        </option>
                                    </select-input>
                                    <div>
                                        <JetButton
                                            class=""
                                            @click="
                                                addElement(
                                                    form.maq_usar,
                                                    'maquinaria'
                                                )
                                            "
                                            >Agregar
                                        </JetButton>
                                    </div>
                                </div>
                                <div class="overflow-auto">
                                    <div
                                        v-for="maquina in maq_usar"
                                        class="flex flex-wrap space-x-2 ml-3 mb-1"
                                    >
                                        <span
                                            class="px-4 py-2 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max cursor-pointer active:bg-gray-300 transition duration-300 ease"
                                        >
                                            {{ maquina }}
                                            <button
                                                @click="
                                                    removeElement(
                                                        form.maq_usar,
                                                        'maquinaria'
                                                    )
                                                "
                                                class="bg-transparent hover focus:outline-none"
                                            >
                                                <svg
                                                    aria-hidden="true"
                                                    focusable="false"
                                                    data-prefix="fas"
                                                    data-icon="times"
                                                    class="w-3 ml-3"
                                                    role="img"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 352 512"
                                                >
                                                    <path
                                                        fill="currentColor"
                                                        d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"
                                                    ></path>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <Label>Equipo de protección: </Label>
                            <div
                                class="flex flex-row bg-gray-100 p-3 rounded-md mb-3"
                            >
                                <div class="flex flex-col max-w-xs">
                                    <select-input
                                        class="mb-3 w-full"
                                        v-model="form.equipo_prot"
                                    >
                                        <option>Tapones auditivos</option>
                                        <option>
                                            Gafa de seguridad transparente
                                        </option>
                                        <option>Zapato cerrado</option>
                                        <option>Bota industrial</option>
                                        <option>
                                            Gafa de seguridad 5 sombras
                                        </option>
                                        <option>Careta para soldar</option>
                                        <option>Mandil para soldar</option>
                                        <option>Guantes de nitrilo</option>
                                        <option>
                                            Guantes recubiertos de latex
                                        </option>
                                        <option>
                                            Guantes resistentes a cortes
                                        </option>
                                        <option>Guantes de Polietileno</option>
                                        <option>
                                            Guantes de algodón para inspección
                                        </option>
                                        <option>Guantes de piel</option>
                                        <option>Guantes para soldar</option>
                                        <option>Mangas para soldar</option>
                                        <option>Casco</option>
                                        <option>No Aplica</option>
                                    </select-input>
                                    <div>
                                        <JetButton
                                            @click="
                                                addElement(
                                                    form.equipo_prot,
                                                    'equipo_proteccion'
                                                )
                                            "
                                            >Agregar
                                        </JetButton>
                                    </div>
                                </div>
                                <div class="overflow-auto">
                                    <div
                                        v-for="equipo in equipo_prot"
                                        class="flex flex-wrap space-x-2 ml-3"
                                    >
                                        <span
                                            class="px-4 mb-1 py-2 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max cursor-pointer active:bg-gray-300 transition duration-300 ease"
                                        >
                                            {{ equipo }}
                                            <button
                                                @click="
                                                    removeElement(
                                                        form.equipo_prot,
                                                        'equipo_proteccion'
                                                    )
                                                "
                                                class="bg-transparent hover focus:outline-none"
                                            >
                                                <svg
                                                    aria-hidden="true"
                                                    focusable="false"
                                                    data-prefix="fas"
                                                    data-icon="times"
                                                    class="w-3 ml-3"
                                                    role="img"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 352 512"
                                                >
                                                    <path
                                                        fill="currentColor"
                                                        d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"
                                                    ></path>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <Label class="mt-3"
                                >Instrumentos de medición a utilizar</Label
                            >
                            <div
                                class="flex flex-row bg-gray-100 p-3 rounded-md mb-3"
                            >
                                <div class="flex flex-col max-w-xs">
                                    <select-input
                                        class="mb-3 w-full"
                                        v-model="form.inst_med"
                                    >
                                        <option
                                            v-for="instrumento in instrumentos_medicion"
                                        >
                                            {{ instrumento.nombre_producto }}
                                        </option>
                                    </select-input>
                                    <div>
                                        <JetButton
                                            @click="
                                                addElement(
                                                    form.inst_med,
                                                    'instrumentos_medicion'
                                                )
                                            "
                                            >Agregar
                                        </JetButton>
                                    </div>
                                </div>
                                <div class="overflow-auto">
                                    <div
                                        v-for="instrumento in instrumentos_med"
                                        class="flex flex-wrap space-x-2 ml-3"
                                    >
                                        <span
                                            class="px-4 mb-1 py-2 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max cursor-pointer active:bg-gray-300 transition duration-300 ease"
                                        >
                                            {{ instrumento }}
                                            <button
                                                @click="
                                                    removeElement(
                                                        form.inst_med,
                                                        'instrumentos_medicion'
                                                    )
                                                "
                                                class="bg-transparent hover focus:outline-none"
                                            >
                                                <svg
                                                    aria-hidden="true"
                                                    focusable="false"
                                                    data-prefix="fas"
                                                    data-icon="times"
                                                    class="w-3 ml-3"
                                                    role="img"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 352 512"
                                                >
                                                    <path
                                                        fill="currentColor"
                                                        d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"
                                                    ></path>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <Label>Material Didactico</Label>
                                <textarea
                                    v-model="form.material_didactico"
                                    name=""
                                    id=""
                                    class="w-full border border-gray-300"
                                    rows="5"
                                ></textarea>
                            </div>
                            <Label class="mt-3"
                                >Herramientas manuales a utilizar</Label
                            >
                            <div
                                class="flex flex-row bg-gray-100 p-3 rounded-md mb-3"
                            >
                                <div class="flex flex-col max-w-xs">
                                    <select-input
                                        class="mb-3 w-full"
                                        v-model="form.herr_man"
                                    >
                                        <option
                                            v-for="herramienta in herramienta_manu"
                                        >
                                            {{ herramienta.nombre_producto }}
                                        </option>
                                    </select-input>
                                    <div>
                                        <JetButton
                                            @click="
                                                addElement(
                                                    form.herr_man,
                                                    'herramientas_manuales'
                                                )
                                            "
                                            >Agregar
                                        </JetButton>
                                    </div>
                                </div>
                                <div class="overflow-auto">
                                    <div
                                        v-for="herramienta in herramientas_man"
                                        class="flex flex-wrap space-x-2 ml-3"
                                    >
                                        <span
                                            class="px-4 mb-1 py-2 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max cursor-pointer active:bg-gray-300 transition duration-300 ease"
                                        >
                                            {{ herramienta }}
                                            <button
                                                @click="
                                                    removeElement(
                                                        form.herr_man,
                                                        'herramientas_manuales'
                                                    )
                                                "
                                                class="bg-transparent hover focus:outline-none"
                                            >
                                                <svg
                                                    aria-hidden="true"
                                                    focusable="false"
                                                    data-prefix="fas"
                                                    data-icon="times"
                                                    class="w-3 ml-3"
                                                    role="img"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 352 512"
                                                >
                                                    <path
                                                        fill="currentColor"
                                                        d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"
                                                    ></path>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h2 class="text-lg font-semibold mt-3">
                                    Reglamento
                                </h2>
                                <Label>
                                    Recomendaciones de seguridad adicionales:
                                </Label>
                                <textarea
                                    v-model="form.recom_seguridad"
                                    name=""
                                    id=""
                                    class="w-full border border-gray-300"
                                    rows="5"
                                ></textarea>
                            </div>

                            <h2 class="text-lg font-semibold mt-4">
                                Desarrollo de la practica
                            </h2>
                            <div class="mb-3">
                                <Label>Objetivo</Label>
                                <textarea
                                    name=""
                                    v-model="form.objetivo"
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
                                    v-model="form.pasos"
                                    class="w-full border border-gray-300"
                                    rows="5"
                                ></textarea>
                            </div>
                            <div class="mb-3">
                                <Label>Fuentes de información</Label>
                                <textarea
                                    name=""
                                    id=""
                                    v-model="form.fuentes_info"
                                    class="w-full border border-gray-300"
                                    rows="5"
                                ></textarea>
                            </div>
                            <div class="mb-3">
                                <Label>Material digital de apoyo</Label>
                                <div
                                    class="overflow-hidden"
                                    v-if="form.material_apoyo != null"
                                >
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                                >
                                                    {{ form.material_apoyo }}
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-center"
                                                >
                                                    <a
                                                        :href="`/material_apoyo/${form.material_apoyo} `"
                                                        type="button"
                                                        download
                                                        class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out"
                                                    >
                                                        Descargar
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div v-else>No hay material de apoyo.</div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <JetButton
                                v-if="form.status == 'Pendiente'"
                                @click="update()"
                                class="bg-green-500 hover:bg-green-700"
                            >
                                Aceptar Práctica
                            </JetButton>
                            <JetButton
                                v-else
                                @click="update()"
                                class="bg-green-500 hover:bg-green-700"
                            >
                                Editar Práctica
                            </JetButton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
