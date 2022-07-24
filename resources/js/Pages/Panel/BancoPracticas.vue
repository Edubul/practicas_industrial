<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetButton from "@/Jetstream/Button.vue";
import SelectOption from "@/Shared/SelectOption.vue";
import { usePage, useForm } from "@inertiajs/inertia-vue3";
import { ref, watch, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

const archivos = computed(() => usePage().props.value.archivos); // archivos de la practica
const archivo_select = ref("");
function seleccionarPractica(url) {
    archivo_select.value = url;
}

const search = ref("");

watch(search, (newValue) => {
    Inertia.get(
        "/banco-practicas",
        { q: newValue },
        { preserveScroll: true, preserveState: true }
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
                                            <div
                                                class="absolute flex items-center ml-2 h-full"
                                            >
                                                <svg
                                                    class="w-4 h-4 fill-current text-primary-gray-dark"
                                                    viewBox="0 0 16 16"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"
                                                    ></path>
                                                </svg>
                                            </div>

                                            <input
                                                type="text"
                                                v-model="search"
                                                placeholder="Buscar Practica"
                                                class="px-8 py-3 w-full rounded-md bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                            />
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
