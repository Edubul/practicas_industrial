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
const articulo = usePage().props.value.articulo;
const form = useForm({
    nombre: articulo.nombre_producto,
    categoria: articulo.categoria_id,
    descripcion: articulo.descripcion,
    referencia_int: (articulo.referencia_int == null ? '': articulo.referencia_int),
    nomenclatura: articulo.nomenclatura,
});

function update() {
    if (confirm("¿Está seguro de editar el artículo?")) {
        Inertia.put(`/inventario/${articulo.id}`, form);
    }
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

                                <h2 class="text-lg font-semibold">Editar Artículo ID: </h2>
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <Label
                                            >Nombre Artículo:
                                            <span
                                                class="text-red-600"
                                            >
                                                *
                                            </span>
                                        </Label>
                                        <!-- Nombre Artìculo -->
                                        <div>
                                            <JetInput
                                                v-model="form.nombre"
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
                                        <SelectInput
                                            v-model="form.categoria"
                                            class="w-full"
                                        >
                                            <option value="1">Equipo de Oficina y Papelería / Consumibles</option>
                                            <option value="2">Equipo de Oficina y Papelería / Equipo electrónico</option>
                                            <option value="3">Equipo de Protección General / Personal (EPP)</option>
                                            <option value="4">Equipo de Protección General / Seguridad</option>
                                            <option value="5">Herramientas manuales</option>
                                            <option value="6">Herramientas mecánicas</option>
                                            <option value="7">Instrumentos de medición / Master</option>
                                            <option value="8">Instrumentos de medición / Uso general</option>
                                            <option value="9">Material  didáctico</option>
                                            <option value="10">Refacciones</option>
                                        </SelectInput>
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
                                        v-model="form.descripcion"
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
                                            v-model="form.referencia_int"
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
                                            v-model="form.nomenclatura"
                                            type="text"
                                            class="w-full"
                                        />
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="flex justify-end">
                            <JetButton @click="update"
                                >Editar Artículo</JetButton
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
