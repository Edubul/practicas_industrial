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

const articulo = computed(() => usePage().props.value.articulo);
const prestamos = computed(() => usePage().props.value.prestamos);

const open_modal = ref(false);
const nomenclatura = ref("");
const inputNomenclatura = ref(null);
const form = useForm({
    nomenclatura: nomenclatura,
    profesor_id: "",
    aula: "",
});
const openModal = () => {
    open_modal.value = true;
    inputNomenclatura.value.focus();
};

const closeModal = () => {
    open_modal.value = false;
    nomenclatura.value = null;
    form.reset();
};

watch(nomenclatura, (new_articulo) => {
    Inertia.get(
        "/prestamos",
        { q: new_articulo },
        { preserveScroll: true, preserveState: true }
    );
});

function store() {
    if (confirm("¿Está seguro de prestar este artículo?")) {
        Inertia.post(`/prestamos`, form, {
            onSuccess: () => {
                nomenclatura.value = null;
                form.reset();
            }
        });
    }
}
</script>

<template>
    <DashboardLayout>
        <!-- This is an example component -->
        <div class="w-full max-w-sm mx-auto bg-white rounded-2xl shadow-xl">
            <!-- Navigation Bar -->
            <div class="px-5 pt-3 bg-white shadow-lg rounded-2xl">
                <div class="flex flex-row space-x-3 justify-center">
                    <!-- Item #1 -->
                    <div class="flex group">
                        <a
                            href="#"
                            class="p-3 text-gray-400 hover:text-yellow-500"
                        >
                            <span class="flex flex-col items-center">
                                <font-awesome-icon
                                    class="h-5 text-gray-400"
                                    icon="fa-solid fa-box-archive"
                                />

                                <!-- Text -->
                                <button
                                    class="text-xs mb-2 transition-all duration-200"
                                    @click="openModal"
                                >
                                    Agregar nuevo Prestamo
                                </button>
                                <JetDialogModal
                                    :show="open_modal"
                                    @close="openModal"
                                >
                                    <template #title>
                                        Agregar prestamo
                                    </template>

                                    <template #content>
                                        <p class="text-sm text-gray-400 italic">
                                            <span class="text-red-500 text-sm"
                                                >NOTA:
                                            </span>
                                            El sistema agregará automáticamente
                                            la hora y fecha en la que se acepta
                                            el prestamo y el encargado será el
                                            propietario de la cuenta sesionada.
                                        </p>
                                        <div class="grid grid-cols-4 gap-5">
                                            <div class="col-span-2">
                                                <JetInput
                                                    ref="inputNomenclatura"
                                                    v-model="nomenclatura"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    placeholder="Nomenclatura"
                                                    @keyup.enter="deleteUser"
                                                />

                                                <JetInput
                                                    v-model="form.profesor_id"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    placeholder="Clave Profesor"
                                                />

                                                <JetInput
                                                    v-model="form.aula"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    placeholder="Aula"
                                                />

                                                <JetInputError
                                                    :message="
                                                        form.errors.password
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                            <div
                                                class="col-span-2"
                                                v-if="articulo[0]"
                                            >
                                                <h2 class="font-bold">
                                                    Detalles del Artículo
                                                </h2>
                                                <p class="mt-1">
                                                    <b>Nombre:</b>
                                                    {{
                                                        articulo[0]
                                                            .nombre_producto
                                                    }}
                                                </p>
                                                <p class="mt-1">
                                                    <b>Nomenclatura:</b>
                                                    {{
                                                        articulo[0].nomenclatura
                                                    }}
                                                </p>
                                                <p class="mt-1">
                                                    <b>Descripcion:</b>
                                                    {{
                                                        articulo[0].descripcion
                                                    }}
                                                </p>
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
                                            @click="store"
                                        >
                                            Agregar prestamo
                                        </JetButton>
                                    </template>
                                </JetDialogModal>
                                <!-- Focus Dot -->
                                <span
                                    class="h-2 w-2 rounded-full group-hover:bg-yellow-500 transition-all duration-150 delay-100"
                                ></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-5">
            
            <table class="min-w-full divide-y divide-gray-00">
                <thead class="bg-gray-100">
                    <tr>
                        <th
                            scope="col"
                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Nomenclatura
                        </th>
                        <th
                            scope="col"
                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Nombre Artículo
                        </th>
                        <th
                            scope="col"
                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Docente
                        </th>
                        <th
                            scope="col"
                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Encargado
                        </th>
                        <th
                            scope="col"
                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Horario de salida
                        </th>
                        <th
                            scope="col"
                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Horario de entrega
                        </th>
                        <th
                            scope="col"
                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Salon
                        </th>
                        <th
                            scope="col"
                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr class="border-b" v-for="prestamo in prestamos.data">
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ prestamo.nomenclatura }}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ prestamo.nombre_producto }}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ prestamo.pNombre }} {{ prestamo.pApellidos}}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ prestamo.name }} {{ prestamo.last_name}}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ prestamo.hora_pedido }}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                            {{ prestamo.aula }}
                        </td>
                        <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"
                        >
                        <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded-full"> {{ prestamo.status }}</span>
                           
                        </td>

                        
                        
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- <pagination
            class="px-5"
        /> -->
    </DashboardLayout>
</template>
