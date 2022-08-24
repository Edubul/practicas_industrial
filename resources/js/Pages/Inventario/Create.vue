<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import Label from "@/Jetstream/Label.vue";
import SelectInput from "@/Jetstream/SelectInput.vue";
import JetInput from "@/Jetstream/Input.vue";
import ValidationErrors from "@/Jetstream/ValidationErrors.vue";
import JetButton from "@/Jetstream/Button.vue";
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import { ref, watch, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
const user = usePage().props.value.user;
const profesores_info = usePage().props.value.profesores;
const materias = usePage().props.value.materias;
const equipo_proteccion = usePage().props.value.equipo_proteccion;
const instrumentos_medicion = usePage().props.value.instrumentos_medicion;
const herramienta_manu = usePage().props.value.herramientas_man;
const maquinaria = usePage().props.value.maquinaria;
const maq_usar = ref([]);
const equipo_prot = ref([]);
const instrumentos_med = ref([]);
const herramientas_man = ref([]);
const herramientas_meca = ref([]);
const profesores = ref([]);
const integrador_materias = ref([]);
const integrador = ref(false);

const form = useForm({
    profesores: null,
    materia: null,
    materias: null,
    unidad: null,
    tema: null,
    nombre_practica: null,
    atributo_egreso: null,
    req_ub_op1: null,
    req_ub_op2: null,
    equipo_prot: null,
    maq_usar: null,
    inst_med: null,
    material_didactico: null,
    herr_man: null,
    herr_mec: null,
    recom_seguridad: null,
    objetivo: null,
    pasos: null,
    fuentes_info: null,
    material_apoyo: null,
});

function store() {
    form.equipo_prot = equipo_prot.value;
    form.maq_usar = maq_usar.value;
    form.inst_med = instrumentos_med.value;
    form.herr_man = herramientas_man.value;
    form.herr_mec = herramientas_meca.value;
    form.profesores = profesores.value;
    form.materias = integrador_materias.value;
    if (confirm("¿Está seguro de enviar la práctica?")) {
        Inertia.post("/practica", form);
    }
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
            break;
        case "integrador":
            integrador_materias.value.find((e) => e == element)
                ? alert("Ya se ha agregado esta materia")
                : integrador_materias.value.push(element);
            break;
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
        case "herramientas_mec":
            herramientas_meca.value.splice(
                herramientas_meca.value.indexOf(element),
                1
            );
            break;
        case "profesores":
            profesores.value.splice(profesores.value.indexOf(element), 1);
            break;

        case "integrador":
            integrador_materias.value.splice(
                integrador_materias.value.indexOf(element),
                1
            );
    }
}

function changeIntegrador() {
    integrador.value = true;
}
</script>

<template>
    <DashboardLayout title="Laboratorio">
        <div class="my-10">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="p-5">
                        <div class="w-full">
                            <div class="mb-3">
                                <ValidationErrors />

                                <h2 class="text-lg font-semibold">Agregar Artículo</h2>
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <Label
                                            >Nombre Artículo:
                                            <span
                                                class="text-red-600"
                                                v-if="user.role != 'externo'"
                                            >
                                                *
                                            </span>
                                        </Label>
                                        <div v-if="user.role != 'externo'">
                                            <select-input
                                                v-model="form.materia"
                                                class="w-full"
                                            >
                                                <option value="">
                                                    Seleccione una materia
                                                </option>
                                                <option
                                                    v-for="materia in materias"
                                                >
                                                    {{ materia.nombre }}
                                                </option>
                                            </select-input>
                                        </div>
                                        <div v-else>
                                            <JetInput
                                                v-model="form.materia"
                                                type="text"
                                                class="w-full"
                                            />
                                        </div>
                                    </div>
                                    <div class="w-1/2 ml-3">
                                        <Label
                                            >Categoría
                                            <span class="text-red-600">
                                                *
                                            </span>
                                        </Label>
                                        <JetInput
                                            v-model="form.unidad"
                                            type="text"
                                            class="w-full"
                                        />
                                    </div>
                                </div>
                            </div>
  
                            <div class="mb-3">
                                <Label
                                        >Descripción:
                                        <span class="text-red-600"> * </span>
                                    </Label>
                                    <textarea
                                        name=""
                                        v-model="form.objetivo"
                                        id=""
                                        class="w-full border border-gray-300"
                                        rows="5"
                                    ></textarea>
                                </div>

                            <div class="mb-3">
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <Label
                                            >Referencia Interna
                                        </Label>
                                        <JetInput
                                            v-model="form.nombre_practica"
                                            type="text"
                                            class="w-full"
                                        />
                                    </div>
                                    <div class="w-1/2 ml-3">
                                        <Label>Nomenclatura 
                                            <span class="text-red-600">
                                                *
                                            </span>                                        
                                        </Label>
                                        
                                        <JetInput
                                            v-model="form.nombre_practica"
                                            type="text"
                                            class="w-full"
                                        />
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="flex justify-end">
                            <JetButton @click="store"
                                >Agregar Artículo</JetButton
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
