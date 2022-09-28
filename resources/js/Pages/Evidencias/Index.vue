<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import FlashMessage from "@/Shared/FlashMessage.vue";
import { ref, watch, computed } from "vue";
import JetDialogModal from "@/Jetstream/DialogModal.vue";
import JetSecondaryButton from "@/Jetstream/SecondaryButton.vue";
import JetButton from "@/Jetstream/Button.vue";
const open_modal = ref(false);
const citas = computed(() => usePage().props.value.citas);

const form = useForm({
    evidencia: null,
    cita_id: null
});

const openModal = (cita_id) => {
    open_modal.value = true;
    form.cita_id = cita_id;
    console.log(form.cita_id);
};

const closeModal = () => {
    open_modal.value = false;
};

function subirEvidencia() {
    if (confirm("¿Desea subir la evidencia?")) {
        Inertia.post("/evidencia/store", form);
    }
}
</script>
<template>
    <div class="p-5">
        <h1></h1>
        <table class="min-w-full divide-y divide-gray-00">
            <thead class="bg-gray-100">
                <tr>
                    <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                    >
                        Fecha
                    </th>
                    <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                    >
                        Horario
                    </th>
                    <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                    >
                        Materia
                    </th>
                    <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                    >
                        Maestro
                    </th>
                    <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                    >
                        Taller
                    </th>
                    <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                    ></th>
                </tr>
            </thead>

            <tbody class="bg-white">
                <template v-for="cita in citas.data">
                    <tr class="border-b hover:bg-gray-100">
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ cita.fecha }}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ cita.horario }}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ cita.materia }}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ cita.name }} {{ cita.last_name }}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ cita.taller }}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex justify-center"
                        >
                            <button
                                @click="openModal(cita.id)"
                                type="button"
                                class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                            >
                                Subir Evidencia
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>

        <!-- Modal -->
        <JetDialogModal :show="open_modal">
            <template #title> Subir Evidencia </template>

            <template #content>
                <p class="text-sm text-gray-400 italic">
                    <span class="text-red-500 text-sm">NOTA: </span>
                    Asegurate de subir la evidencia en el taller, horario y
                    profesor correspondiente.
                </p>
                <div class="grid grid-cols-4 gap-5">
                    <div class="col-span-2">
                        <div class="flex justify-center">
                            <div class="mb-3 w-96">
                                <label
                                    for="formFile"
                                    class="form-label inline-block mb-2 text-gray-700"
                                    >Default file input example</label
                                >
                                <input
                                    class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    type="file"
                                    id="formFile"
                                    @input="
                                        [
                                            form.evidencia = $event.target.files[0],
                                        ]
                                    "
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <template #footer>
                <JetSecondaryButton @click="closeModal">
                    Cancel
                </JetSecondaryButton>

                <JetButton
                    class="ml-3"
                    :class="{
                        'opacity-25': form.processing,
                    }"
                    :disabled="form.processing"
                    @click="subirEvidencia"
                >
                    Agregar prestamo
                </JetButton>
            </template>
        </JetDialogModal>
    </div>
</template>