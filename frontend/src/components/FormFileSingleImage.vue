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
  image: {
    type: String,
    default: ''
  }
})

const previewImage = ref()

const onFileChange = (e, errorMessage) => {
  if (!errorMessage) {
    previewImage.value = URL.createObjectURL(e.target.files[0])
  }
}
</script>

<template>
  <div>
    <FormField v-slot="{ field, value, errorMessage }" type="file" :name="name" :rules="rules">
      <FormLabel>{{ name }}</FormLabel>
      <div
        class="flex flex-col items-center justify-between p-4 border-2 border-dashed rounded-md xl:flex-row"
        :class="errorMessage ? 'border-error-300' : 'border-dark-300'"
      >
        <div class="flex flex-col items-center mb-2 xl:mb-0 xl:flex-row">
          <div class="flex items-center justify-center w-16 h-16">
            <img
              v-if="(previewImage && value) || image"
              :src="previewImage || image"
              class="object-cover w-full max-h-full rounded-md"
            />
            <base-icon v-else :icon="['fas', 'image']" class="text-4xl" />
          </div>
          <div class="text-center xl:mt-0 xl:text-left xl:mx-2" :class="previewImage && 'mt-2'">
            <p class="text-dark-500">
              Click the <span class="font-medium text-dark-700">Browse</span> button to choose a
              file
            </p>
            <p class="text-xs font-medium text-primary-600">
              Only JPG, PNG, and SVG files are allowed, with a maximum size of 1MB
            </p>
          </div>
        </div>
        <label
          :for="id"
          class="px-4 py-2 font-medium transition-colors border rounded-md cursor-pointer border-dark-300 w-fit hover:bg-dark-100"
        >
          <span>Browse</span>
          <input
            :id="id"
            type="file"
            accept=".jpg, .jpeg, .png, .svg"
            class="sr-only"
            v-bind="field"
            @change="onFileChange($event, errorMessage)"
          />
        </label>
      </div>
      <FormErrorMessage :name="name" />
    </FormField>
  </div>
</template>
