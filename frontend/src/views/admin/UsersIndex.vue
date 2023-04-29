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
    field: 'email',
    display: 'Email'
  },
  {
    field: 'avatar',
    display: 'Avatar',
    img: true
  },
  {
    field: 'phone_number',
    display: 'Phone'
  },
  {
    field: 'gender',
    display: 'Gender'
  },
  {
    field: 'date_of_birth',
    display: 'DOB'
  },
  {
    field: 'role',
    display: 'Role'
  }
])
</script>

<template>
  <div>
    <BaseTable name="users" :columns="columns" />
  </div>
</template>
