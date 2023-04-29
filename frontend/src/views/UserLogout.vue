<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

onMounted(async () => {
  await axios.post('logout')
  router.push('login')
})
</script>
<template>
  <div>Logging Out...</div>
</template>
