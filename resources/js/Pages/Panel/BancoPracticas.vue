<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetButton from "@/Jetstream/Button.vue";
import SearchFilter from "@/Shared/SearchFilter.vue";
import { usePage, useForm } from "@inertiajs/inertia-vue3";
import { ref, watch, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    filters: Object,
});
const archivos = computed(() => usePage().props.value.archivos); // archivos de la practica
const archivo_select = ref("");
const material_apoyo = ref("");
const material_apoyo_nombre = ref("");

const form = useForm({
    q: props.filters.search,
    opcion: props.filters.opcion,
});
function seleccionarPractica(nombre_practica, material_apoyo_name) {
    archivo_select.value = "/practicas/" + nombre_practica + ".pdf";

    if (material_apoyo_name != null) {
        material_apoyo.value = "/material_apoyo/" + material_apoyo_name;
        material_apoyo_nombre.value = material_apoyo_name;
    } else {
        material_apoyo.value = "";
        material_apoyo_nombre.value = "";
    }
}

watch(form, (newValue) => {
    Inertia.get(
        "/practicas/banco",
        { q: newValue.q, opcion: newValue.opcion },
        { preserveState: true }
    );
});
</script>

<template>
    <AppLayout title="Banco de Practcias">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Laboratorio de Ingeniería Industrial
            </h2>
        </template>
        <div class="my-10">
            <div class="max-w-7xl max- mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="h-full flex flex-col bg-gray-200 shadow-xl">
                        <div
                            class="grid rounded-md p-5 grid-cols-5 bg-white gap-5"
                        >
                            <div class="col-span-5 md:col-span-2">
                                <div class="bg-gray-100 p-4 h-full">
                                    <div class="max-w-5xl m-auto">
                                        <h1
                                            class="text-center font-semibold text-2xl"
                                        >
                                            Banco de Practicas
                                        </h1>
                                        <div class="relative my-5">
                                            <div class="flex justify-center">
                                                <div class="mb-3 xl:w-96">
                                                    <div
                                                        class="input-group relative flex flex-wrap items-stretch w-full mb-4 rounded"
                                                    >
                                                        <input
                                                            type="search"
                                                            class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                            placeholder="Search"
                                                            aria-label="Search"
                                                            aria-describedby="button-addon2"
                                                            v-model="form.q"
                                                        />
                                                        <span
                                                            class="input-group-text flex items-center px-3 py-1.5 text-base font-normal text-gray-700 text-center whitespace-nowrap rounded"
                                                            id="basic-addon2"
                                                        >
                                                            <svg
                                                                aria-hidden="true"
                                                                focusable="false"
                                                                data-prefix="fas"
                                                                data-icon="search"
                                                                class="w-4"
                                                                role="img"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"
                                                            >
                                                                <path
                                                                    fill="currentColor"
                                                                    d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"
                                                                ></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-center">
                                                <div
                                                    class="flex justify-center"
                                                >
                                                    <div>
                                                        <div class="form-check">
                                                            <input
                                                                value="nombre_archivo"
                                                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                                type="radio"
                                                                name="flexRadioDefault"
                                                                id="flexRadioDefault1"
                                                                v-model="
                                                                    form.opcion
                                                                "
                                                            />
                                                            <label
                                                                class="form-check-label inline-block text-gray-800"
                                                                for="flexRadioDefault1"
                                                            >
                                                                Buscar por
                                                                nombre de
                                                                archivo
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input
                                                                value="materia"
                                                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                                type="radio"
                                                                name="flexRadioDefault"
                                                                id="flexRadioDefault2"
                                                                v-model="
                                                                    form.opcion
                                                                "
                                                                checked
                                                            />
                                                            <label
                                                                class="form-check-label inline-block text-gray-800"
                                                                for="flexRadioDefault2"
                                                            >
                                                                Buscar por
                                                                materia
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul
                                            class="border border-gray-200 rounded overflow-hidden shadow-md"
                                        >
                                            <li
                                                class="px-4 cursor-pointer py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out"
                                                v-for="(
                                                    archivo, index
                                                ) in archivos"
                                                @click="
                                                    seleccionarPractica(
                                                        archivo.clave_practica,
                                                        archivo.material_apoyo
                                                    )
                                                "
                                            >
                                                {{ archivo.clave_practica }}
                                                {{ archivo.nombre_practica }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-5 md:col-span-3">
                                <iframe
                                    :src="archivo_select"
                                    class="w-full"
                                    height="600px"
                                >
                                    <!-- <embed
                                        
                                        width="100%"
                                        height="600px"
                                    /> -->
                                </iframe>

                                <br />
                                <div v-if="material_apoyo_nombre != ''">
                                    <p class="my-5 text-xl font-bold">
                                        Material de Apoyo
                                    </p>
                                    <div class="flex flex-col">
                                        <div
                                            class="overflow-x-auto sm:-mx-6 lg:-mx-8"
                                        >
                                            <div
                                                class="py-2 inline-block min-w-full sm:px-6 lg:px-8"
                                            >
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full">
                                                        <thead
                                                            class="bg-white border-b"
                                                        >
                                                            <tr>
                                                                <th
                                                                    scope="col"
                                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                                                >
                                                                    {{
                                                                        material_apoyo_nombre
                                                                    }}
                                                                </th>
                                                                <th
                                                                    scope="col"
                                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-center"
                                                                >
                                                                    <a
                                                                        :href="
                                                                            material_apoyo
                                                                        "
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
