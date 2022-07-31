<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import Calendar from "@/Shared/Calendar.vue";
import JetButton from "@/Jetstream/Button.vue";
import SelectOption from "@/Shared/SelectOption.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { ref, watch, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

const today = new Date();
const fecha = today.toLocaleDateString("es-MX");
const talleres = usePage().props.value.talleres;
const practicas = computed(() => usePage().props.value.citas);
const horariosOcupados = computed(() => usePage().props.value.horariosOcupados);
const selectDate = ref("");
const selectTaller = ref("");
const disabled = ref(true);
const form = useForm({
    fecha: fecha,
    taller: null,
    horario: null,
});

const horarios = usePage().props.value.horarios;

function changeDate(e) {
    const updateDate = new Date(e.day);
    const newDate = updateDate.toLocaleDateString("es-MX");
    form.fecha = newDate;
    selectDate.value = form.fecha;
}

function changetest(event) {
    selectTaller.value = event.target.value;
    disabled.value = false;
}

function horarioOcupado(horario_id) {
    return horariosOcupados.value.some((h) => h.horario_id == horario_id);
}

watch(selectDate, (newValue) => {
    Inertia.get(
        "/calendario",
        { taller_id: selectTaller.value, fecha: newValue },
        { preserveScroll: true, preserveState: true },
        150
    );
});

watch(selectTaller, (newTaller) => {
    console.log(newTaller);
    Inertia.get(
        "/calendario",
        { taller_id: newTaller, fecha: form.fecha },
        { preserveScroll: true, preserveState: true },
        150
    );
});

function store() {
    if (confirm("¿Estás seguro de que quieres crear esta cita?")) {
        Inertia.post("/calendario", form, {
            preserveScroll: true,
            preserveState: true,
        });
    }
}
</script>

<template>
    <AppLayout title="Laboratorio">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear cita
            </h2>
        </template>
        <div class="mt-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <jet-validation-errors class="p-5" />
                    <div
                        class="flex flex-wrap items-center justify-around w-full p-5"
                    >
                        <div class="flex flex-col h-full w-full md:w-1/6">
                            <JetLabel
                                for="fecha"
                                value="Fecha"
                                class="font-bold text-lg"
                            />
                            <JetInput
                                disabled
                                :value="form.fecha"
                                id="fecha"
                                type="text"
                                class="block w-full border-2 border-gray-300"
                                required
                                autofocus
                                autocomplete="name"
                            />
                        </div>

                        <div class="flex flex-col h-full w-full md:w-1/6">
                            <JetLabel
                                for="taller"
                                value="Taller"
                                class="font-bold text-lg"
                            />
                            <select-option id="taller" @change="changetest">
                                <option selected disabled>
                                    -- Seleccionar Taller --
                                </option>
                                <option
                                    v-for="(taller, index) in talleres"
                                    :key="index"
                                    :value="taller.id"
                                >
                                    {{ taller.nombre }}
                                </option>
                            </select-option>
                        </div>

                        <div class="flex flex-col h-full w-full md:w-1/6">
                            <JetLabel
                                for="horario"
                                value="Horario"
                                class="font-bold text-lg"
                            />
                            <select-option
                                id="horario"
                                :disabled="disabled"
                                v-model="form.horario"
                            >
                                <option selected disabled>
                                    -- Seleccionar Horario --
                                </option>
                                <option
                                    v-for="(horario, index) in horarios"
                                    :key="index"
                                    :class="{
                                        'text-red-600 bg-red-200':
                                            horarioOcupado(horario.id),
                                    }"
                                    :value="horario.id"
                                    :disabled="horarioOcupado(horario.id)"
                                >
                                    {{ horario.horario }}
                                </option>
                            </select-option>
                        </div>

                        <jet-button class="h-1/2 mt-5 md:mt-0" @click="store"
                            >Aceptar</jet-button
                        >
                    </div>
                    <calendar
                        :date="form.fecha"
                        :practicas="practicas"
                        @dayClicked="changeDate($event)"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
