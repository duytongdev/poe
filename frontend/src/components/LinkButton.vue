<script setup>
const props = defineProps({
  to: {
    type: String,
    required: true
  }
})
</script>

<template>
  <router-link
    :to="props.to"
    class="inline-flex items-center px-4 py-2 font-medium border rounded-md text-light bg-primary-600 border-primary-500 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
  >
    <slot />
  </router-link>
</template>
