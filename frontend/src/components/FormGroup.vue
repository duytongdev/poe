<script setup>
import { provide, computed } from 'vue'

import FormLabel from '@/components/FormLabel.vue'
import FormErrorMessage from '@/components/FormErrorMessage.vue'

const props = defineProps({
  id: {
    type: String,
    required: true
  },
  label: {
    type: String,
    required: true
  },
  required: {
    type: Boolean,
    default: true
  },
  limit: {
    type: Number,
    default: 0
  },
  length: {
    type: Number,
    default: 0
  },
  invalid: Boolean,
  invalidFeedback: {
    type: Object,
    default: () => {}
  }
})

provide(
  'formGroup',
  computed(() => {
    return {
      ...props
    }
  })
)

const exceededCharacterlimit = computed(() => {
  return props.length > props.limit
})
</script>

<template>
  <div>
    <div class="flex justify-between">
      <FormLabel :for="props.id">{{ props.label }}</FormLabel>
      <span v-if="props.limit" class="text-xs text-dark-500">
        <span :class="exceededCharacterlimit && 'text-error-500'">{{ props.length }}</span
        >/{{ props.limit }}
      </span>
    </div>
    <div class="relative">
      <slot v-bind="props" />
      <div
        v-if="props.invalid"
        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"
      >
        <base-icon :icon="['fas', 'circle-exclamation']" class="w-4 h-4 text-error-600" />
      </div>
    </div>
    <FormErrorMessage v-if="props.invalid">{{ invalidFeedback[0].$message }}</FormErrorMessage>
  </div>
</template>
