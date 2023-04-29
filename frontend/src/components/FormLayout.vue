<script setup>
import router from '@/router'
import { singularize } from '@/helpers'

import BaseButton from './BaseButton.vue'

const props = defineProps({
  name: {
    type: String,
    required: true
  }
})

const backToList = () => {
  router.push(`/admin/${props.name}`)
}
</script>

<template>
  <div class="flex justify-center mt-8 mb-24">
    <div class="p-8 space-y-8 rounded-md shadow bg-light xl:w-2/3">
      <div>
        <span class="text-lg font-bold">New {{ singularize(name) }}</span>
        <p class="mt-1 text-dark-500">
          Please fill out this form completely to create a new {{ singularize(name) }}
        </p>
      </div>
      <slot />
    </div>
    <div
      class="fixed bottom-0 left-0 right-0 flex items-center justify-between h-16 px-4 bg-light xl:px-8 drop-shadow md:left-64"
    >
      <router-link :to="`/admin/${name}`" class="flex items-center">
        <base-icon :icon="['fas', 'reply-all']" class="mr-2 text-base" />
        <span
          >Back to <span class="capitalize"> {{ name }}</span></span
        >
      </router-link>

      <div class="space-x-2">
        <BaseButton intent="secondary" icon-left="file-export" @click="backToList"
          >Save & Exit</BaseButton
        >
        <BaseButton icon-left="floppy-disk">Save</BaseButton>
      </div>
    </div>
  </div>
</template>
