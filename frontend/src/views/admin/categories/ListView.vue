<script setup>
import BaseTable from '@/components/BaseTable.vue'

const columns = ref([
  {
    field: 'id',
    display: 'ID'
  },
  {
    field: 'name',
    display: 'Name',
    link: true
  },
  {
    field: 'image',
    display: 'Image',
    img: true
  },
  {
    field: 'parent_id',
    display: 'Parent ID'
  },
  {
    field: 'status',
    display: 'Status',
    badge: true
  }
])
</script>

<template>
  <div>
    <BaseTable api="categories" name="categories" :columns="columns" />
  </div>
</template>
