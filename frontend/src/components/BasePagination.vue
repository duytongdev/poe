<script setup>
const props = defineProps({
  pagination: {
    type: Object,
    required: true
  },
  table: {
    type: Boolean,
    default: false
  }
})

const currentPage = computed(() => {
  return props.pagination.current_page
})

const totalPages = computed(() => {
  return props.pagination.last_page
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

const emit = defineEmits(['redirectPage'])

const redirectPage = (page) => {
  if (page) {
    emit('redirectPage', page)
  }
}

const style = (type, additionalClass) => {
  return {
    'flex-col items-center justify-between gap-4 xl:flex-row': type === 'table',
    'px-4 py-2 border cursor-pointer hover:bg-dark-50 border-dark-300': type === '',
    'px-4 py-2 border pointer-events-none text-dark-300 border-dark-300': type === 'disabled',
    'px-4 py-2 border pointer-events-none bg-primary-600 text-light border-primary-600':
      type === 'active',
    'hidden px-4 py-2 border pointer-events-none border-dark-300 sm:flex': type === 'dots',
    [additionalClass]: additionalClass !== undefined
  }
}
</script>

<template>
  <div class="flex" :class="props.table ? style('table') : 'justify-center'">
    <p v-if="props.table">
      Showing
      <b>{{ pagination.from }}</b>
      to
      <b>{{ pagination.to }}</b>
      of
      <b>{{ pagination.total }}</b>
      results
    </p>
    <nav class="flex -space-x-px font-medium">
      <a
        :class="[currentPage === 1 ? style('disabled') : style(''), 'rounded-l-md']"
        @click="redirectPage(currentPage - 1)"
      >
        Previous
      </a>
      <a
        v-if="totalPages > 7 && currentPage > 4"
        :class="style('', 'hidden sm:flex')"
        @click="redirectPage(1)"
      >
        1
      </a>
      <a v-if="totalPages > 7 && currentPage > 4" :class="style('dots')">...</a>
      <template v-for="page in visiblePages" :key="page">
        <a
          :class="page === currentPage ? style('active') : style('', 'hidden md:flex')"
          @click="redirectPage(page)"
        >
          {{ page }}
        </a>
      </template>
      <a v-if="totalPages > 7 && endPage < totalPages" :class="style('dots')">...</a>
      <a
        v-if="totalPages > 7 && endPage < totalPages"
        :class="style('', 'hidden sm:flex')"
        @click="redirectPage(totalPages)"
      >
        {{ totalPages }}
      </a>
      <a
        :class="[currentPage === totalPages ? style('disabled') : style(''), 'rounded-r-md']"
        @click="redirectPage(currentPage + 1)"
      >
        Next
      </a>
    </nav>
  </div>
</template>
