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
const practicas = computed(() => usePage().props.value.practicas);
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

function horarioOcupado(horario_id) {
    return horariosOcupados.value.some((h) => h.horario_id == horario_id);
}

watch(selectDate, (newValue) => {
    console.log(newValue);
    Inertia.get(
        "/crear-cita",
        { taller_id: selectTaller.value, fecha: newValue },
        { preserveScroll: true, preserveState: true },
        150
    );
});

watch(selectTaller, (newTaller) => {
    Inertia.get(
        "/crear-cita",
        { taller_id: newTaller, fecha: form.fecha },
        { preserveScroll: true, preserveState: true },
        150
    );
});

function store() {
    Inertia.post("/practica/create", form, {
        preserveScroll: true,
        preserveState: true,
    });
}
</script>

<template>
    <AppLayout title="Encuesta de satisfacción">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Encuesta de satisfacción
            </h2>
        </template>
        <div class="mt-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="container"></div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
