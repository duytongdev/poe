<script setup>
import { ChevronRightIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
  crumbs: {
    type: Array,
    required: true
  }
})

const isLast = (index) => {
  return index === props.crumbs.length - 1
}
</script>

<template>
  <nav class="flex" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-4">
      <li v-for="(crumb, index) in props.crumbs" :key="index">
        <div class="flex items-center">
          <span v-if="isLast(index)" class="font-medium text-dark-400">{{ crumb }}</span>
          <router-link
            v-else
            :to="crumb"
            class="mr-4 text-sm font-medium text-dark-700 capitalize hover:text-dark-700"
            >{{ crumb }}</router-link
          >
          <ChevronRightIcon
            v-if="!isLast(index)"
            class="flex-shrink-0 w-5 h-5 text-dark-400"
            aria-hidden="true"
          />
        </div>
      </li>
    </ol>
  </nav>
</template>
