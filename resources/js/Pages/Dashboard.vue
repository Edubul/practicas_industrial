<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import Calendar from "@/Shared/Calendar.vue";
import JetButton from "@/Jetstream/Button.vue";
import SelectOption from "@/Shared/SelectOption.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";

const today = new Date();
const fecha = today.toLocaleDateString("es-MX");
const instructores = usePage().props.value.instructores;
const form = useForm({
    fecha: fecha,
    horario: "",
    instructor: "",
    laboratorio: "",
});

const horarios = [
    "07:00 - 09:00",
    "09:00 - 11:00",
    "11:00 - 13:00",
    "13:00 - 15:00",
    "15:00 - 17:00",
    "17:00 - 19:00",
    "19:00 - 21:00",
];

function changeDate(e) {
    const updateDate = new Date(e.day);
    const newDate = updateDate.toLocaleDateString("es-MX");
    form.fecha = newDate;
}

const submit = () => {
    form.post("laboratorio/create");
};
</script>

<template>
    <AppLayout title="Laboratorio">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Laboratorio de Ingeniería Industrial
            </h2>
        </template>
        <div class="mt-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="flex items-center justify-around w-full p-5">
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
                                for="horario"
                                value="Horario"
                                class="font-bold text-lg"
                            />
                            <select-option id="horario" v-model="form.horario">
                                <option
                                    v-for="(horario, index) in horarios"
                                    :key="index"
                                    :value="index"
                                >
                                    {{ horario }}
                                </option>
                            </select-option>
                        </div>
                        <div class="flex flex-col h-full w-full md:w-1/6">
                            <JetLabel
                                for="instructores"
                                value="Instructor"
                                class="font-bold text-lg"
                            />
                            <select-option
                                id="instructores"
                                v-model="form.instructor"
                            >
                                <option
                                    v-for="instructor in instructores"
                                    :value="instructor.id"
                                    :key="instructor.id"
                                >
                                    {{ instructor.name }}
                                    {{ instructor.last_name }}
                                </option>
                            </select-option>
                        </div>
                        <div class="flex flex-col h-full w-full md:w-1/6">
                            <JetLabel
                                for="lab"
                                value="Laboratorio"
                                class="font-bold text-lg"
                            />
                            <select-option id="lab" v-model="form.laboratorio">
                                <option :value="1">Lab. Ergonomía</option>
                                <option :value="2">Lab. Ing. Inversa</option>
                                <option :value="3">Lab. Metrología</option>
                                <option :value="4">Lab. Manufactura</option>
                            </select-option>
                        </div>

                        <jet-button class="h-1/2 mt-5 md:mt-0" @click="submit"
                            >Aceptar</jet-button
                        >
                    </div>
                    <calendar
                        :date="form.fecha"
                        @dayClicked="changeDate($event)"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
