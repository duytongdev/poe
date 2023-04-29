<script setup>
const props = defineProps({
  as: {
    type: [String, Object],
    default: 'button'
  }
})
</script>

<template>
  <component
    :is="props.as"
    class="inline-flex items-center px-4 py-2 font-medium border rounded-md text-light bg-primary-600 border-primary-500 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
  >
    <slot />
  </component>
</template>
