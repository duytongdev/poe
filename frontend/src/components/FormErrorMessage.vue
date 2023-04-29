<script setup>
import { ErrorMessage } from 'vee-validate'

defineProps({
  name: {
    type: String,
    required: true
  }
})
</script>

<template>
  <ErrorMessage :name="name" as="p" class="mt-1 text-error-500" />
</template>
