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

const user = usePage().props.value.user;

const form = useForm({

});

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

                                <h2 class="text-lg font-semibold">Agregar Artículo</h2>
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
                                        <div>
                                            <JetInput
                                                v-model="form.materia"
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
                                        <JetInput
                                            v-model="form.unidad"
                                            type="text"
                                            class="w-full"
                                        />
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
                                        v-model="form.objetivo"
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
                                            v-model="form.nombre_practica"
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
                                            v-model="form.nombre_practica"
                                            type="text"
                                            class="w-full"
                                        />
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="flex justify-end">
                            <JetButton @click="store"
                                >Agregar Artículo</JetButton
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
