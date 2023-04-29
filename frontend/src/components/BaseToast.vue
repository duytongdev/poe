<script setup>
import { ref, onMounted, defineExpose } from 'vue'
import { TransitionRoot } from '@headlessui/vue'
import { CheckCircleIcon, XMarkIcon } from '@heroicons/vue/20/solid'

const show = ref(true)
const message = ref()
const color = ref()

onMounted(() => {
  setTimeout(() => (show.value = false), 3000)
})

defineExpose({
  message,
  color
})
</script>

<template>
  <TransitionRoot
    appear
    :show="show"
    enter="transition transform duration-300 ease-in"
    enter-from="translate-x-full opacity-0"
    enter-to="translate-x-0 opacity-100"
    leave="transition transform duration-300 ease-out"
    leave-from="opacity-100"
    leave-to="opacity-0"
    class="fixed z-50 w-full max-w-xs space-y-4 top-4 right-4"
  >
    <div :class="`flex items-center justify-between p-4 rounded-md shadow-md bg-${color}-50`">
      <div class="flex items-center">
        <div class="flex-shrink-0 mr-3">
          <CheckCircleIcon :class="`w-6 h-6 text-${color}-400`" />
        </div>
        <p :class="`font-medium text-${color}-800`">{{ message }}</p>
      </div>
      <button
        :class="`p-1 rounded-full bg-${color}-50 text-${color}-400 hover:bg-${color}-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-${color}-400`"
        @click="show = false"
      >
        <span class="sr-only">Dismiss</span>
        <XMarkIcon class="w-5 h-5" />
      </button>
    </div>
  </TransitionRoot>
</template>
