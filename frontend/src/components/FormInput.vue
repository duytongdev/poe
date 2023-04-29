<script setup>
import { FormField, FormLabel, FormErrorMessage } from '@/helpers/form'

defineProps({
  id: {
    type: String,
    required: true
  },
  name: {
    type: String,
    required: true
  },
  rules: {
    type: String,
    required: true
  },
  type: {
    type: String,
    default: 'text'
  },
  limit: {
    type: Number,
    default: 0
  }
})

const errorClass = 'pr-10 border-error-500 focus:border-error-500 focus:ring-error-500 bg-error-50'
</script>

<template>
  <div>
    <FormField v-slot="{ field, errorMessage }" :name="name" :rules="rules">
      <div class="flex justify-between">
        <FormLabel :for="id">{{ name }}</FormLabel>
        <!-- <div v-if="limit" class="text-xs text-dark-500">
          <span :class="field.value.length > limit && 'text-error-500'">
            {{ field.value.length }}/{{ limit }}
          </span>
        </div> -->
      </div>
      <div class="relative">
        <input
          v-bind="field"
          :id="id"
          :type="type"
          :class="errorMessage && errorClass"
          class="w-full text-sm rounded-md focus:bg-light border-dark-300 focus:ring-primary-500 focus:border-primary-500"
        />
        <div
          v-if="errorMessage"
          class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"
        >
          <BaseIcon :icon="['fas', 'circle-exclamation']" class="text-base text-error-500" />
        </div>
      </div>
      <FormErrorMessage :name="name" />
    </FormField>
  </div>
</template>
