<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetButton from "@/Jetstream/Button.vue";
import SearchFilter from "@/Shared/SearchFilter.vue";
import { usePage, useForm } from "@inertiajs/inertia-vue3";
import { ref, watch, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

const archivos = computed(() => usePage().props.value.archivos); // archivos de la practica
const archivo_select = ref("");
function seleccionarPractica(url) {
    archivo_select.value = url;
}

const props = defineProps({
    filters: Object,
});

const search = ref("");

watch(search, (newValue) => {
    Inertia.get(
        "/banco-practicas",
        { q: newValue },
        { preserveScroll: true, preserveState: true }
    );
});

// watch(form, (newValue) => {
//     Inertia.get(
//         "/banco-practicas",
//         { form: newValue },
//         { preserveScroll: true, preserveState: true }
//     );
// });
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
                            class="grid rounded-md divide-y divide-dashed hover:divide-solid justify-evenly p-5 grid-cols-5 bg-white gap-5"
                        >
                            <div class="col-span-2">
                                <div class="bg-gray-100 p-4 h-full">
                                    <div class="max-w-5xl m-auto">
                                        <h1
                                            class="text-center font-semibold text-2xl"
                                        >
                                            Banco de Practicas
                                        </h1>
                                        <div class="relative my-5">
                                            <search-filter
                                                class="mr-4 w-full max-w-md"
                                            >
                                                <label
                                                    class="block text-gray-700"
                                                    >Opciones:</label
                                                >
                                                <select
                                                    class="form-select mt-1 w-full"
                                                >
                                                    <option :value="null" />
                                                    <option value="imei">
                                                        Nombre de archivo
                                                    </option>
                                                    <option value="cc_cliente">
                                                        Materia
                                                    </option>
                                                </select>
                                            </search-filter>
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
                                                        archivo.url
                                                    )
                                                "
                                            >
                                                {{ archivo.nombre }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-3">
                                <embed
                                    :src="archivo_select"
                                    width="100%"
                                    height="600px"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
