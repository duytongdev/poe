<script setup>
import BaseTable from '@/components/BaseTable.vue'

const columns = ref([
  {
    field: 'id',
    display: 'ID'
  },
  {
    field: 'avatar',
    display: 'Avatar',
    img: true
  },
  {
    field: 'name',
    display: 'Name',
    link: true
  },
  {
    field: 'email',
    display: 'Email'
  },
  {
    field: 'phone_number',
    display: 'Phone number'
  },
  {
    field: 'role',
    display: 'Role',
    badge: true
  },
  {
    field: 'created_at',
    display: 'Created at'
  }
])
</script>

<template>
  <div>
    <BaseTable api="users" name="users" :columns="columns" />
  </div>
</template>
