<script setup>
import FormGroup from '@/components/FormGroup.vue'
import FormInput from '@/components/FormInput.vue'
import { useRoute } from 'vue-router'

const form = ref({
  name: '',
  logo: ''
})

const previewImage = ref()

const route = useRoute()
const brandId = route.params.id

onMounted(async () => {
  await axios.get('/api/admin/brands/' + brandId).then((response) => {
    form.value.name = response.data.name
    form.value.logo = response.data.logo
  })
})

const onFileChange = (e) => {
  form.value.logo = e.target.files[0]

  const fileReader = new FileReader()

  fileReader.onload = async () => {
    previewImage.value = await fileReader.result
  }

  fileReader.readAsDataURL(form.value.logo)
}

const updateBrand = async () => {
  const formData = new FormData()

  formData.append('name', form.value.name)
  formData.append('logo', form.value.logo)
  formData.append('_method', 'PATCH')

  await axios.post('/api/admin/brands/' + brandId, formData).then((response) => {
    form.value.name = response.data.name
    form.value.logo = response.data.logo
  })
}
</script>

<template>
  <div>
    <form class="md:grid md:grid-cols-3 md:gap-6" @submit.prevent="updateBrand">
      <div class="p-4 space-y-8 bg-light rounded-md shadow md:col-span-2">
        <div>
          <div>
            <h3 class="text-lg font-medium leading-6 text-dark-900">Profile</h3>
            <p class="mt-1 text-sm text-dark-500">
              This information will be displayed publicly so be careful what you share.
            </p>
          </div>

          <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-6">
              <FormGroup label="Name" required>
                <FormInput v-model="form.name" type="text" />
              </FormGroup>
            </div>

            <div class="sm:col-span-6">
              <label for="cover-photo" class="block text-sm font-medium text-dark-700">
                Logo
              </label>
              <div
                class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-dark-300 border-dashed rounded-md"
              >
                <div class="space-y-1 text-center">
                  <img
                    v-if="previewImage || form.logo"
                    :src="previewImage || form.logo"
                    class="mx-auto mb-3 rounded"
                  />
                  <svg
                    v-else
                    class="w-12 h-12 mx-auto text-dark-400"
                    stroke="currentColor"
                    fill="none"
                    viewBox="0 0 48 48"
                    aria-hidden="true"
                  >
                    <path
                      d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  <div class="flex justify-center text-sm text-dark-600">
                    <label
                      for="file-upload"
                      class="relative font-medium text-primary-600 bg-light rounded-md cursor-pointer hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500"
                    >
                      <span>Upload a file</span>
                      <input id="file-upload" type="file" class="sr-only" @change="onFileChange" />
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                  <p class="text-xs text-dark-500">PNG, JPG, JPEG, SVG up to 10MB</p>
                </div>
              </div>
            </div>

            <div class="sm:col-span-6">
              <label for="street-address" class="block text-sm font-medium text-dark-700">
                Status
              </label>
              <div class="mt-1">
                <select
                  id=""
                  name=""
                  class="w-full text-sm border-dark-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                >
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="relative">
        <div class="sticky flex flex-col p-4 bg-light rounded-md shadow top-20">
          <span class="mb-2 font-medium text-dark-700">Action</span>
          <div>
            <button
              type="button"
              class="px-4 py-2 text-sm font-medium text-dark-700 bg-light border border-dark-300 rounded-md shadow-sm hover:bg-dark-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
            >
              Back to list (Brands)
            </button>
            <button
              type="submit"
              class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-light bg-primary-600 border border-transparent rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
            >
              Save
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>
