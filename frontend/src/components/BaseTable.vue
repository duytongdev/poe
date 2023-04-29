<script setup>
import BaseLoading from './BaseLoading.vue'
import FormSelect from './FormSelect.vue'
import { api } from '@/plugins/axios'
import { capitalize, singularize } from '@/helpers'

import LinkButton from './LinkButton.vue'
import BaseDropdown from './BaseDropdown.vue'
import BaseCheckbox from './BaseCheckbox.vue'
import BasePagination from './BasePagination.vue'
import BaseButton from './BaseButton.vue'

const props = defineProps({
  name: {
    type: String,
    required: true
  },
  columns: {
    type: Array,
    required: true
  }
})

const empty = ref(false)
const items = ref()
const keywords = ref()
const loading = ref(false)
const pagination = ref()
const perPage = ref(10)
const perPages = [
  { label: 10, value: 10 },
  { label: 25, value: 25 },
  { label: 50, value: 50 },
  { label: 100, value: 100 }
]
const selectedItems = ref([])

const search = async () => {
  const name = capitalize(singularize(props.name))

  const response = await api('get', '/admin/search', {
    params: {
      name: name,
      perPage: perPage.value,
      keywords: keywords.value
    }
  })

  pagination.value = response

  if (response.data.length) {
    items.value = response.data
  } else {
    items.value = response.data
  }
}

const highlighting = (str) => {
  if (typeof str == 'string' && keywords.value) {
    return str.includes(keywords.value) && 'bg-yellow-200'
  }
}

const refresh = async () => {
  loading.value = true
  //   await api('get', `/admin/${props.name}`, { params: { perPage: perPage.value } }).then(
  //     (response) => {
  //       pagination.value = response
  //       items.value = response.data
  //       loading.value = false
  //     }
  //   )
}

const redirectPage = async (page) => {
  loading.value = true
  const response = await api('get', `/admin/${props.name}`, {
    params: { perPage: perPage.value, page: page }
  })
  pagination.value = await response

  if (response.data.length) {
    items.value = response.data
  } else {
    empty.value = true
  }

  //   loading.value = false
}

const deleteItems = async () => {
  const formData = new FormData()

  formData.append('ids', JSON.stringify(selectedItems.value))
  formData.append('_method', 'delete')

  await api('post', `/admin/${props.name}`, formData)
}

const indeterminate = computed({
  get() {
    return selectedItems.value.length > 0 && selectedItems.value.length < items.length
  },
  set(value) {
    if (selectedItems.value.length) {
      selectedItems.value = []
    } else {
      let itemIds = []

      if (value) {
        items.value.forEach((item) => {
          itemIds.push(item.id)
        })
      }

      selectedItems.value = itemIds
    }
  }
})

watchEffect(async () => {
  await api('get', `/admin/${props.name}`, { params: { perPage: perPage.value } }).then(
    (response) => {
      pagination.value = response
      items.value = response.data
    }
  )
})

onMounted(async () => {
  await api('get', `/admin/${props.name}`, { params: { perPage: perPage.value } }).then(
    (response) => {
      pagination.value = response
      items.value = response.data

      if (!items.value.length) {
        empty.value = true
      }
    }
  )
})
</script>

<template>
  <div class="min-w-full">
    <div class="flex flex-col">
      <div v-if="empty && !keywords" class="py-4 text-center text-dark-900">
        <div>
          <img src="@/assets/empty.svg" alt="" class="max-w-xs mx-auto mb-8" />
          <span class="text-lg font-medium">No data available!</span>
          <p class="mt-2 mb-8 text-dark-500">
            Let's start creating your {{ singularize(name) }} by clicking the button below
          </p>
          <LinkButton :to="`/admin/${name}/create`">Create {{ singularize(name) }}</LinkButton>
        </div>
      </div>
      <div v-if="!empty">
        <div v-if="!items" class="space-y-8">
          <div class="space-y-4 sm:flex sm:items-center sm:justify-between sm:space-y-0">
            <div>
              <div class="w-16 rounded-md h-7 bg-dark-200 animate-pulse"></div>
              <div class="w-64 h-4 mt-2 rounded-md bg-dark-200 animate-pulse"></div>
            </div>
            <div>
              <div class="w-32 h-8 rounded-md bg-dark-200 animate-pulse"></div>
            </div>
          </div>
          <div class="p-4 overflow-x-auto rounded-md shadow bg-light">
            <table id="tablea" class="w-full">
              <thead>
                <tr>
                  <th>
                    <div class="w-4 h-4 rounded-md animate-pulse bg-dark-200"></div>
                  </th>
                  <th v-for="(column, index) in props.columns" :key="index" class="px-4 py-2">
                    <div class="w-20 h-4 rounded-md animate-pulse bg-dark-200"></div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="index in 10" :key="index">
                  <td class="pl-4 pr-2"></td>
                  <td v-for="column in columns" :key="column.id" class="px-4 py-2">
                    <div class="h-4 rounded-md animate-pulse bg-dark-200"></div>
                  </td>
                  <td>
                    <div class="w-8 h-4 ml-auto rounded-md animate-pulse bg-dark-200"></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div v-else>
          <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
            <div>
              <span class="text-lg font-bold capitalize">{{ name }}</span>
              <p class="mt-1 text-dark-500">A list of all the {{ name }} in your application</p>
            </div>
            <BaseButton as="a" :href="`/admin/${name}/create`">Add {{ name }}</BaseButton>
          </div>
          <div class="flex flex-col gap-4 pt-4 border rounded-md border-dark-300 bg-light">
            <div class="flex flex-wrap justify-between gap-2 px-4">
              <div class="flex flex-wrap gap-2">
                <FormSelect v-model="perPage" :options="perPages" />
                <BaseButton v-if="selectedItems.length" @click="deleteItems">Delete</BaseButton>
              </div>
              <div class="flex flex-wrap gap-2">
                <div class="relative flex-1">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <BaseIcon :icon="['fas', 'magnifying-glass']" class="text-dark-400" />
                  </div>
                  <input
                    v-model="keywords"
                    type="text"
                    class="min-w-full pl-10 text-sm rounded-md border-dark-300 sm:w-96 focus:ring-primary-500 focus:border-primary-500"
                    placeholder="Search for id, name, email, phone number, role..."
                    @keyup.enter="search()"
                  />
                </div>
                <BaseButton intent="ghost" icon-left="arrow-rotate-right" @click="refresh"
                  >Refresh</BaseButton
                >
                <BaseButton intent="ghost" icon-left="filter" icon-right="caret-down"
                  >Columns</BaseButton
                >
              </div>
            </div>
            <div class="relative" :class="loading ? 'overflow-hidden' : 'overflow-x-auto'">
              <table class="w-full">
                <thead>
                  <tr class="border-y bg-dark-100 border-y-dark-300">
                    <th class="px-4">
                      <BaseCheckbox
                        v-model="indeterminate"
                        :checked="selectedItems.length"
                        :indeterminate="
                          selectedItems.length && selectedItems.length !== items.length
                        "
                      />
                      <!-- <input
                        v-model="indeterminate"
                        type="checkbox"
                        class="w-4 h-4 rounded text-primary-500 border-dark-300 focus:ring-primary-500"
                        :checked="selectedItems.length"
                        :indeterminate=" selectedItems.length && selectedItems.length !== items.length "
                      /> -->
                    </th>
                    <th
                      v-for="column in columns"
                      :key="column"
                      class="px-4 h-[48px] font-medium text-dark-400 text-xs uppercase"
                    >
                      <div class="flex items-center" :class="column.badge && 'justify-center'">
                        <span>{{ column.display }}</span>
                        <div class="flex flex-col ml-1 cursor-pointer">
                          <BaseIcon :icon="['fas', 'sort-up']" class="-mb-[7px] text-primary-600" />
                          <BaseIcon
                            :icon="['fas', 'sort-down']"
                            class="-mt-[7px] text-primary-600"
                          />
                        </div>
                      </div>
                    </th>
                    <th class="px-4">
                      <span class="sr-only">Action</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="relative">
                  <tr
                    v-for="(item, index) in items"
                    :key="index"
                    :class="selectedItems.includes(item.id) ? 'bg-primary-50' : 'bg-light'"
                  >
                    <td class="px-4 border-b border-dark-300">
                      <!-- <BaseCheckbox v-model="selectedItems" :value="item.id" /> -->
                      <input
                        v-model="selectedItems"
                        type="checkbox"
                        class="w-4 h-4 rounded text-primary-500 border-dark-300 focus:ring-primary-500"
                        :value="item.id"
                      />
                    </td>
                    <td
                      v-for="column in columns"
                      :key="column.id"
                      class="px-4 py-2 border-b border-dark-300"
                    >
                      <router-link
                        v-if="column.link"
                        :to="name + '/edit/' + item.id"
                        class="font-medium text-primary-500 hover:text-primary-600 focus:outline-none"
                        :class="highlighting(item[column.field])"
                        >{{ item[column.field] }}</router-link
                      >
                      <div v-else-if="column.badge" class="inline-flex justify-center w-full">
                        <span
                          class="inline-flex px-2 text-xs font-semibold leading-5 capitalize rounded-full"
                          :class="
                            item[column.field] === 'active'
                              ? 'bg-success-100 text-success-800'
                              : 'bg-error-100 text-error-800'
                          "
                          >{{ item[column.field] }}</span
                        >
                      </div>
                      <div v-else-if="column.img" class="w-8 h-8">
                        <img
                          :src="item[column.field]"
                          class="object-cover w-full max-h-full rounded-md"
                        />
                      </div>
                      <span v-else :class="highlighting(item[column.field])">{{
                        item[column.field]
                      }}</span>
                    </td>
                    <td class="px-4 border-b border-dark-300">
                      <BaseDropdown>
                        <template #button>
                          <div class="flex justify-center w-8 ml-auto rounded-full bg-primary-100">
                            <BaseIcon :icon="['fas', 'ellipsis']" />
                          </div>
                        </template>
                        <template #items>
                          <router-link
                            :to="name + `/${item.id}/edit`"
                            class="block px-4 py-2 rounded-md hover:bg-primary-500 hover:text-light"
                            >Edit</router-link
                          >
                          <router-link
                            :to="name + `/${item.id}/edit`"
                            class="block px-4 py-2 rounded-md hover:bg-primary-500 hover:text-light"
                            >Delete</router-link
                          >
                        </template>
                      </BaseDropdown>
                    </td>
                  </tr>
                  <BaseLoading v-if="loading && items.length" :scroll="true" />
                </tbody>
              </table>
              <div v-if="!items.length" class="relative p-4 text-center">
                <strong class="text-lg">No result found</strong>
                <p class="text-dark-500">
                  Try adjusting your search or filter to find what you're looking for
                </p>
                <BaseLoading v-if="loading" />
              </div>
            </div>
            <div class="relative text-center">Haha</div>
            <BasePagination
              v-if="items.length"
              class="px-4 mb-4"
              :pagination="pagination"
              :table="true"
              @redirect-page="redirectPage"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
