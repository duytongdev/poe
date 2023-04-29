<script setup>
import { useAuthStore } from '@/stores/auth'

const authStore = useAuthStore()

onMounted(async () => {
  await authStore.getUser()
})
</script>
<template>
  <div v-if="authStore.user">
    <p><strong>Name:</strong>{{ authStore.user.name }}</p>
    <p><strong>Email:</strong>{{ authStore.user.email }}</p>
  </div>
</template>
