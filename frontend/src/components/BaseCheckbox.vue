<script setup>
const props = defineProps({
  modelValue: {
    type: [Array, Boolean],
    required: true
  },
  id: {
    type: String,
    default: ''
  },
  checked: {
    type: [Boolean, Number],
    default: 0
  },
  indeterminate: {
    type: [Boolean, Number],
    default: 0
  },
  label: {
    type: String,
    default: ''
  }
})

const emit = defineEmits(['update:modelValue'])

const model = computed({
  get() {
    return props.modelValue
  },
  set(value) {
    emit('update:modelValue', value)
  }
})
</script>

<template>
  <div class="flex items-center">
    <input
      :id="id"
      v-model="model"
      :checked="checked"
      :indeterminate="indeterminate"
      type="checkbox"
      class="w-4 h-4 rounded text-primary-500 border-dark-300 focus:ring-primary-500"
    />
    <label v-if="label" :for="id" class="block ml-2">{{ label }}</label>
  </div>
</template>
