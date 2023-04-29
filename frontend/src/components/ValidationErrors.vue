<script setup>
import { XCircleIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
  errors: {
    type: Object,
    default: () => {}
  }
})
</script>

<template>
  <div v-if="props.errors" class="p-4 rounded-md bg-error-50">
    <div class="flex">
      <div class="flex-shrink-0">
        <XCircleIcon class="w-5 h-5 text-error-400" aria-hidden="true" />
      </div>
      <div class="ml-3">
        <h3 class="text-sm font-medium text-error-800">
          There were {{ props.errors.length }} errors with your submission
        </h3>
        <div class="mt-2 text-sm text-error-700">
          <ul role="list" class="pl-5 space-y-1 list-disc">
            <li v-for="(error, key) in props.errors" :key="key">{{ error }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
