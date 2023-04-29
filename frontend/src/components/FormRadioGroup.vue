<script setup>
import FormLabel from './FormLabel.vue'
import {
  RadioGroup,
  RadioGroupLabel,
  RadioGroupDescription,
  RadioGroupOption
} from '@headlessui/vue'

defineProps({
  label: {
    type: String,
    required: true
  },
  radios: {
    type: Array,
    default: () => [
      {
        name: 'published',
        description: 'This brand will be displayed on your website'
      },
      { name: 'draft', description: 'This brand will not be displayed on your website' }
    ]
  },
  modelValue: {
    type: String,
    required: true
  }
})

const emit = defineEmits(['update:modelValue'])
</script>

<template>
  <RadioGroup
    :model-value="modelValue"
    @update:model-value="(value) => emit('update:modelValue', value)"
  >
    <FormLabel>{{ label }}</FormLabel>
    <div class="space-y-4">
      <RadioGroupOption
        v-for="radio in radios"
        :key="radio.name"
        v-slot="{ active, checked }"
        :value="radio.name"
        as="template"
      >
        <div
          class="flex px-5 py-4 rounded-md shadow cursor-pointer focus:outline-none"
          :class="[
            active && 'ring-2   ring-offset-2 ring-primary-500',
            checked ? 'bg-primary-100' : 'bg-light hover:bg-primary-50'
          ]"
        >
          <div class="flex items-center justify-between w-full">
            <div>
              <RadioGroupLabel
                as="span"
                class="font-medium capitalize"
                :class="checked && 'text-primary-800'"
              >
                {{ radio.name }}
              </RadioGroupLabel>
              <RadioGroupDescription
                as="p"
                class="text-dark-500"
                :class="checked && 'text-primary-500'"
              >
                <p>{{ radio.description }}</p>
              </RadioGroupDescription>
            </div>
            <div v-show="checked" class="flex">
              <base-icon :icon="['fas', 'check-circle']" class="text-xl text-primary-700" />
            </div>
          </div>
        </div>
      </RadioGroupOption>
    </div>
  </RadioGroup>
</template>
