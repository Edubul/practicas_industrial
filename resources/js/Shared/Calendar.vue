<script setup>
import { ref, onMounted, watch } from "vue";
import JetActionSection from "@/Jetstream/ActionSection.vue";
import JetDialogModal from "@/Jetstream/DialogModal.vue";
import JetDangerButton from "@/Jetstream/DangerButton.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetSecondaryButton from "@/Jetstream/SecondaryButton.vue";
import { Inertia } from "@inertiajs/inertia";

const MONTH_NAMES = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
];
const confirmingUserDeletion = ref(false);
const DAYS = ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"];
const today = new Date();
const day = ref(today.getDay());
const month = ref(today.getMonth());
const year = ref(today.getFullYear());
const daysInMonth = ref(new Date(year.value, month.value + 1, 0).getDate());
const dayOfWeek = new Date(year.value, month.value).getDay();
const blankdaysArray = [];
const no_of_days = ref([]);
const blankdays = ref([]);

const emit = defineEmits(["dayClicked"]);
const props = defineProps({
    date: String,
    practicas: Object,
    citas_jefatura: Object,
    taller: String,
});
console.log(props.citas_jefatura);

function dayDisabled(date) {
    // console.log("date: " + date);
    // console.log("day: " + day.value);
    return date <= day.value ? true : false;
}

function dayClicked(day, month, year) {
    emit("dayClicked", { day, month, year });
    // daySelect(day);
}

for (var i = 1; i <= dayOfWeek; i++) {
    blankdaysArray.push(i);
}

let daysArray = [];
for (var i = 1; i <= daysInMonth.value; i++) {
    daysArray.push(i);
}

blankdays.value = blankdaysArray;
no_of_days.value = daysArray;

function getNoOfDays() {
    let daysInMonth = new Date(year.value, month.value + 1, 0).getDate();

    // find where to start calendar day of week
    let dayOfWeek = new Date(year.value, month.value).getDay();
    let blankdaysArray = [];
    for (var i = 1; i <= dayOfWeek; i++) {
        blankdaysArray.push(i);
    }

    let daysArray = [];
    for (var i = 1; i <= daysInMonth; i++) {
        daysArray.push(i);
    }

    blankdays.value = blankdaysArray;
    no_of_days.value = daysArray;
}

function isToday(date) {
    const today = new Date();
    const d = new Date(year.value, month.value, date);
    return today.toDateString() === d.toDateString() ? true : false;
}

function daySelect(date) {
    const d = new Date(year.value, month.value, date);
    const day = d.toLocaleDateString("es-MX");
    return day == props.date ? true : false;
}

function getFecha(fecha) {
    const date = new Date(fecha);
    date.setMinutes(date.getMinutes() + date.getTimezoneOffset());
    // console.log(date);
    return date.toDateString();
}
</script>

<template>
    <div class="antialiased sans-serif bg-gray-100 h-full">
        <div>
            <div class="container mx-auto p-4">
                <div class="bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between py-2 px-6">
                        <div>
                            <span class="text-lg font-bold text-gray-800">{{
                                MONTH_NAMES[month]
                            }}</span>
                            <span
                                class="ml-1 text-md text-gray-400 font-normal"
                                >{{ year }}</span
                            >
                        </div>
                        <div
                            class="border rounded-lg px-1"
                            style="padding-top: 2px"
                        >
                            <button
                                type="button"
                                class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center"
                                :class="{
                                    'cursor-not-allowed opacity-25': month == 0,
                                }"
                                :disabled="month == 0 ? true : false"
                                @click="
                                    month--;
                                    getNoOfDays();
                                "
                            >
                                <svg
                                    class="h-6 w-6 text-gray-500 inline-flex leading-none"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 19l-7-7 7-7"
                                    />
                                </svg>
                            </button>
                            <div class="border-r inline-flex h-6"></div>
                            <button
                                type="button"
                                class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1"
                                :class="{
                                    'cursor-not-allowed opacity-25':
                                        month == 11,
                                }"
                                :disabled="month == 11 ? true : false"
                                @click="
                                    month++;
                                    getNoOfDays();
                                "
                            >
                                <svg
                                    class="h-6 w-6 text-gray-500 inline-flex leading-none"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="">
                        <div
                            class="flex flex-wrap"
                            style="margin-bottom: -40px"
                        >
                            <template v-for="(day, index) in DAYS" :key="index">
                                <div style="width: 14.26%" class="px-2 py-2">
                                    <div
                                        class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"
                                    >
                                        {{ day }}
                                    </div>
                                </div>
                            </template>
                        </div>

                        <div class="flex flex-wrap border-t border-l">
                            <template v-for="blankday in blankdays">
                                <div
                                    style="width: 14.28%; height: 120px"
                                    class="text-center border-r border-b px-4 pt-2"
                                ></div>
                            </template>

                            <template
                                v-for="(date, dateIndex) in no_of_days"
                                :key="dateIndex"
                            >
                                <div
                                    style="width: 14.28%; height: 120px"
                                    class="px-4 pt-2 border-r border-b relative hover:bg-gray-200 active:bg-gray-300 hover:transition hover:duration-700 cursor-pointer"
                                    :class="{
                                        'bg-gray-200': daySelect(date) == true,
                                    }"
                                    @click="
                                        dayClicked(new Date(year, month, date))
                                    "
                                >
                                    <div
                                        class="inline-flex w-6 h-6 items-center justify-center text-center text-gray-500 leading-none rounded-full transition ease-in-out duration-100"
                                        :class="{
                                            'bg-blue-500 text-white':
                                                isToday(date) == true,
                                            'text-gray-700 bg-blue-200':
                                                daySelect(date) == true,
                                        }"
                                    >
                                        {{ date }}
                                    </div>
                                    <div
                                        style="height: 80px"
                                        class="overflow-y-auto mt-1"
                                    >
                                        <!-- <div 
										class="absolute top-0 right-0 mt-2 mr-2 inline-flex items-center justify-center rounded-full text-sm w-6 h-6 bg-gray-700 text-white leading-none"
										x-show="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"
										x-text="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"></div> -->

                                        <template
                                            v-for="practica in props.practicas.filter(
                                                (p) =>
                                                    getFecha(p.fecha) ===
                                                    new Date(
                                                        year,
                                                        month,
                                                        date
                                                    ).toDateString()
                                            )"
                                        >
                                            <p>
                                                <a
                                                    class="text-sm truncate leading-tight"
                                                    :class="
                                                        practica.materias_integradoras ==
                                                        null
                                                            ? 'text-blue-600'
                                                            : 'text-green-600'
                                                    "
                                                    :href="
                                                        route(
                                                            'cita.show',
                                                            practica.id
                                                        )
                                                    "
                                                >
                                                    {{ practica.name }}
                                                    {{ practica.last_name }}
                                                </a>
                                            </p>
                                        </template>

                                        <template
                                            v-for="cita in props.citas_jefatura.filter(
                                                (j) =>
                                                    getFecha(j.fecha) ===
                                                    new Date(
                                                        year,
                                                        month,
                                                        date
                                                    ).toDateString()
                                            )"
                                        >
                                            <p
                                                class="text-sm truncate leading-tight text-red-500"
                                            >
                                                {{ cita.nombre }}
                                            </p>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
