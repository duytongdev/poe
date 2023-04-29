<script setup>
const props = defineProps({
  for: {
    type: String,
    default: ''
  }
})
</script>

<template>
  <label :for="props.for" class="block mb-1 font-medium capitalize"><slot /></label>
</template>
