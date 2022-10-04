<script setup>
import { ref, watch, computed } from "vue";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import Pagination from "@/Shared/Pagination.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import JetDialogModal from "@/Jetstream/DialogModal.vue";
import JetInput from "@/Jetstream/Input.vue";
import { Inertia } from "@inertiajs/inertia";
import JetSecondaryButton from "@/Jetstream/SecondaryButton.vue";
import JetButton from "@/Jetstream/Button.vue";

const citas = computed(() => usePage().props.value.citas);

function order(type) {
    switch (type) {
        case "fecha":
            break;
        case "horario":
            break;
        case "materia":
            break;
        case "maestro":
            break;
        case "taller":
            break;
    }
}
</script>

<template>
    <DashboardLayout>
        <div class="p-5">
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
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                <a
                                    v-if="$page.props.user"
                                    :href="route('cita.show', cita.id)"
                                    class="inline-block bg-yellow-500 text-white font-medium text-xs p-2 leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out"
                                >
                                    Editar
                                </a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
        <pagination class="px-5" :links="citas.links" />
    </DashboardLayout>
</template>
