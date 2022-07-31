<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import FlashMessage from "@/Shared/FlashMessage.vue";

const form = useForm({
    evidencia: null,
});

function subirEvidencia() {
    if (confirm("¿Desea subir la evidencia?")) {
        Inertia.post("/evidencia/store", form);
    }
}
</script>

<template>
    <link
        rel="stylesheet"
        href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css"
    />

    <div class="my-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="h-full flex flex-col bg-gray-100 shadow-xl">
                    <div class="bg-gray-300">
                        <div class="flex items-center justify-center h-screen">
                            <div
                                class="bg-white rounded-2xl border shadow-x1 p-10 max-w-lg"
                            >
                                <FlashMessage />
                                <div
                                    class="flex flex-col items-center space-y-4"
                                >
                                    <h1
                                        class="font-bold text-2xl text-gray-700 w-4/6 text-center"
                                    >
                                        Subir Evidencia
                                    </h1>
                                    <p
                                        class="text-sm text-gray-500 text-center w-5/6"
                                    >
                                        Sube la evidencia realizada en el taller
                                        correspondiente
                                    </p>
                                    <input
                                        type="file"
                                        @input="
                                            form.evidencia =
                                                $event.target.files[0]
                                        "
                                        name=""
                                    />
                                    <button
                                        @click="subirEvidencia"
                                        class="bg-blue-400 text-white rounded-md hover:bg-red-500 font-semibold px-4 py-3 w-full"
                                    >
                                        Subir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
