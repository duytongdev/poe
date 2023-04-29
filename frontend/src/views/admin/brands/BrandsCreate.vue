<script setup>
import { api } from '@/plugins/axios'
import { Form, FormLayout, FormInput, FormFileSingleImage, FormRadioGroup } from '@/helpers/form'
import '@/plugins/validate'

const status = ref('published')

function createBrand(values, { resetForm }) {
  const formData = new FormData()

  Object.keys(values).forEach((key) => {
    formData.append(key, values[key])
  })

  formData.append('status', status.value)

  if (api('post', '/admin/brands', formData)) {
    resetForm()
  }
}
</script>

<template>
  <Form @submit="createBrand">
    <FormLayout name="brands">
      <FormInput id="name" name="name" rules="required|max:100" :limit="100" />
      <FormFileSingleImage id="logo" name="logo" rules="required|image|size:1024" />
      <FormRadioGroup v-model="status" label="Status" />
    </FormLayout>
  </Form>
</template>
