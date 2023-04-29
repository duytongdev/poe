<script setup>
import { CheckCircleIcon, XMarkIcon } from '@heroicons/vue/20/solid'

const show = ref(true)

defineProps({
  action: {
    type: String,
    default: 'created'
  }
})
</script>

<template>
  <div v-if="show" class="p-4 rounded-md bg-success-50">
    <div class="flex">
      <div class="flex-shrink-0">
        <CheckCircleIcon class="w-5 h-5 text-success-400" aria-hidden="true" />
      </div>
      <div class="ml-3">
        <p class="text-sm font-medium text-success-800">Successfully {{ action }}</p>
      </div>
      <div class="pl-3 ml-auto">
        <div class="-mx-1.5 -my-1.5">
          <button
            class="inline-flex bg-success-50 rounded-md p-1.5 text-success-500 hover:bg-success-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-success-50 focus:ring-success-600"
            @click="show = false"
          >
            <span class="sr-only">Dismiss</span>
            <XMarkIcon class="w-5 h-5" aria-hidden="true" />
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
