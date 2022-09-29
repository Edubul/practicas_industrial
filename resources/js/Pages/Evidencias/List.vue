<script setup>
    import { ref, watch, computed } from "vue";
    import DashboardLayout from "@/Layouts/DashboardLayout.vue";
    import Pagination from "@/Shared/Pagination.vue";
    import { useForm, usePage } from "@inertiajs/inertia-vue3";

    
    const citas = computed(() => usePage().props.value.citas);
 
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
                            Profesor
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
                            >
                                Evidencia
                            </th>
                        </tr>
                    </thead>
    
                    <tbody class="bg-white">
                        <tr
                            class="border-b cursor-pointer hover:bg-gray-100"
                            v-for="cita in citas.data"
                        >
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
                                {{ cita.name }} {{cita.last_name}}
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                {{ cita.taller }}
                            </td>
                           
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                            <a :href="cita.url" class="text-blue-500">
                                {{cita.nombre}}
                            </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <pagination
                class="px-5"
                :links="citas.links"

            />
        </DashboardLayout>

</template>