<script setup>
const props = defineProps({
  pagination: {
    type: Object,
    required: true
  },
  range: {
    type: Boolean,
    default: true
  }
})

const emit = defineEmits(['redirectPage'])
const style = 'px-4 py-2 border cursor-pointer border-dark-300 hover:bg-dark-50'
const disabled = 'pointer-events-none text-dark-400'
const dots = 'hidden px-4 py-2 border pointer-events-none border-dark-300 sm:flex'

const currentPage = computed(() => {
  return props.pagination.current_page
})

const totalPages = computed(() => {
  return props.pagination.last_page
})

const links = computed(() => {
  return props.pagination.links
})

const endPage = computed(() => {
  let end = currentPage.value + 1

  if (totalPages.value > 7) {
    if (currentPage.value < 5) {
      end = 5
    } else if (totalPages.value - currentPage.value < 4) {
      end = currentPage.value + 3
    }
  } else {
    end = 7
  }

  return end < totalPages.value ? end : totalPages.value
})

const visiblePages = computed(() => {
  const current = currentPage.value
  const total = totalPages.value
  let start = current - 1

  if (total > 7) {
    if (current < 5) {
      start = 1
    } else if (total - current < 4) {
      start = total - 4
    }
  } else {
    start = 1
  }

  let pages = []

  for (let i = start; i <= endPage.value; i++) {
    pages.push(i)
  }

  return pages
})

const redirectPage = (page) => {
  if (page >= 1) {
    emit('redirectPage', page)
  }
}
</script>

<template>
  <div
    class="flex"
    :class="
      props.range ? 'flex-col items-center justify-between gap-4 xl:flex-row' : 'justify-center'
    "
  >
    <p v-if="props.range">
      Showing
      <b>{{ pagination.from }}</b>
      to
      <b>{{ pagination.to }}</b>
      of
      <b>{{ pagination.total }}</b>
      results
    </p>
    <nav class="flex -space-x-px font-medium">
      <template v-for="link in links" :key="link">
        <a
          :class="[
            'px-4 py-2 border',
            link.active
              ? 'pointer-events-none bg-primary-600 text-light border-primary-600 hover:bg-primary-600'
              : 'hidden cursor-pointer border-dark-300 hover:bg-dark-50 lg:flex'
          ]"
          @click="redirectPage(link.label)"
          >{{ link.label }}</a
        >
      </template>
    </nav>
  </div>
</template>
