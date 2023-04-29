<script setup>
import { Listbox, ListboxButton, ListboxOptions, ListboxOption } from '@headlessui/vue'

const props = defineProps({
  options: {
    type: Array,
    required: true
  },
  modelValue: {
    type: [String, Number],
    required: true
  },
  placeholder: {
    type: String,
    default: 'Select option'
  }
})

const emit = defineEmits(['update:modelValue'])

const label = computed(() => {
  return props.options.find((option) => option.value === props.modelValue)?.label
})
</script>

<template>
  <Listbox
    :model-value="props.modelValue"
    @update:model-value="(value) => emit('update:modelValue', value)"
  >
    <div class="relative">
      <ListboxButton
        class="relative py-2 pl-3 pr-8 border rounded-md cursor-default border-dark-300 focus:outline-none"
      >
        <span v-if="label">{{ label }}</span>
        <span v-else class="text-dark-400">{{ props.placeholder }}</span>
        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
          <BaseIcon :icon="['fas', 'angle-down']" class="text-xs text-dark-400" />
        </span>
      </ListboxButton>
      <transition
        leave-active-class="transition duration-100 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <ListboxOptions
          class="absolute z-10 w-full py-1 mt-1 border rounded-md shadow-md border-dark-300 bg-light focus:outline-none"
        >
          <ListboxOption
            v-for="option in props.options"
            :key="option.label"
            v-slot="{ selected }"
            :value="option.value"
          >
            <li
              :class="[
                selected && 'font-medium pointer-events-none bg-primary-100 text-primary-700',
                'px-3 py-2 select-none hover:bg-dark-100'
              ]"
            >
              {{ option.label }}
            </li>
          </ListboxOption>
        </ListboxOptions>
      </transition>
    </div>
  </Listbox>
</template>
