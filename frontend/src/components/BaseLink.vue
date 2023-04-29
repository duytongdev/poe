<script setup>
const props = defineProps({
  link: {
    type: String,
    default: '/'
  }
})
</script>

<template>
  <router-link :to="props.link" class="font-medium text-primary-600 hover:text-primary-500">
    <slot />
  </router-link>
</template>
