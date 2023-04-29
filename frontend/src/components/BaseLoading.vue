<script setup>
defineProps({
  scroll: {
    type: Boolean,
    default: false
  }
})
</script>

<template>
  <div v-if="scroll" class="absolute inset-0 flex items-center backdrop-blur-sm">
    <!-- <div class="fixed flex items-center justify-center w-screen h-full -left-4 md:w-full md:left-0">
      <BaseIcon
        :icon="['fas', 'spinner']"
        class="-ml-4 text-3xl md:ml-0 animate-spin text-primary-500"
      />
    </div> -->
    <BaseIcon
      :icon="['fas', 'spinner']"
      class="fixed w-screen text-3xl -left-4 md:w-full md:left-0 text-primary-500"
    />
  </div>
  <div v-else class="absolute inset-0 flex items-center justify-center backdrop-blur-sm">
    <BaseIcon :icon="['fas', 'spinner']" class="text-3xl animate-spin text-primary-500" />
  </div>
</template>
