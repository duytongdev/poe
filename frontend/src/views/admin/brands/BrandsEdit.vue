<script setup>
import { api } from '@/plugins/axios'
import { Form, FormLayout, FormInput, FormFileSingleImage, FormRadioGroup } from '@/helpers/form'
import '@/plugins/validate'
import { useRoute } from 'vue-router'

const route = useRoute()
const formValues = ref({
  name: '',
  logo: ''
})

const status = ref('published')

onMounted(async () => {
  const response = await api('get', `/admin/brands/${route.params.id}`)
  formValues.value.name = response.data.name
  formValues.value.logo = response.data.logo
  status.value = response.data.status
})

function updateBrand(values) {
  const formData = new FormData()

  Object.keys(values).forEach((key) => {
    formData.append(key, values[key])
  })

  formData.append('status', status.value)
  formData.append('_method', 'PATCH')

  if (api('post', `/admin/brands/${route.params.id}`, formData)) {
  }
}
</script>

<template>
  <Form :initial-values="formValues" @submit="updateBrand">
    <FormLayout name="brands">
      <FormInput id="name" name="name" rules="required|max:100" :limit="100" />
      <FormFileSingleImage
        id="logo"
        name="logo"
        rules="required|image|size:1024"
        :image="formValues.logo"
      />
      <FormRadioGroup v-model="status" label="Status" />
    </FormLayout>
  </Form>
</template>
