<script setup>
import BaseTable from '@/components/BaseTable.vue'

const columns = ref([
  {
    field: 'id',
    display: 'Id'
  },
  {
    field: 'name',
    display: 'Name',
    link: true
  },
  {
    field: 'logo',
    display: 'Logo',
    img: true
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
    <BaseTable name="brands" :columns="columns" />
  </div>
</template>
