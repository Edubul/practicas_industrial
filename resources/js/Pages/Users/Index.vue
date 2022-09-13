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
    
    const users = computed(() => usePage().props.value.users);
 
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
                                Nombre
                            </th>
                            <th
                                scope="col"
                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                            >
                                Apellidos
                            </th>
                            <th
                                scope="col"
                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                            >
                                ID
                            </th>
                            <th
                                scope="col"
                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                            >
                                Rol
                            </th>
                            <th
                                scope="col"
                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                            >
                                Email
                            </th>
                            <th
                                scope="col"
                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6"
                            >
                                Action
                            </th>
                        </tr>
                    </thead>
    
                    <tbody class="bg-white">
                        <tr
                            class="border-b cursor-pointer hover:bg-gray-100"
                            v-for="user in users.data"
                        >
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                {{ user.name }}
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                {{ user.last_name }}
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                {{ user.num_control }}
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                {{ user.role }}
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                {{ user.email }}
                            </td>
                           
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                            >
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <pagination
                class="px-5"
                :links="users.links"

            />
        </DashboardLayout>
    </template>
    