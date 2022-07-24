<template>
    <div :class="$attrs.class">
        <label v-if="label" class="form-label" :for="id">{{ label }}:</label>

        <select
            :id="id"
            ref="input"
            v-bind="{ ...$attrs, class: null }"
            v-model="selected"
            class="form-select w-full rounded-md border border-gray-300"
            :class="{ error: error, 'bg-gray-200': disabled == true }"
            :disabled="disabled"
        >
            <slot />
        </select>
        <div v-if="error" class="form-error">{{ error }}</div>
    </div>
</template>

<script>
import { v4 as uuid } from "uuid";

export default {
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default() {
                return `select-input-${uuid()}`;
            },
        },
        error: String,
        label: String,
        disabled: Boolean,
    },
    data() {
        return {};
    },

    methods: {
        focus() {
            this.$refs.input.focus();
        },
        select() {
            this.$refs.input.select();
        },
    },
};
</script>
