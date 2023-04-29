<script setup>
import TheHeader from '@/components/TheHeader.vue'
import TheFooter from '@/components/TheFooter.vue'
import Field from '@/components/Field.vue'

const form = ref({
  email: '',
  password: ''
})

const user = ref()

const handleLogin = async () => {
  await axios.get('http://localhost:8000/sanctum/csrf-cookie')
  await axios.post('http://localhost:8000/login', {
    email: form.value.email,
    password: form.value.password
  })

  let { data } = await axios.get('http://localhost:8000/api/user')
  user.value = data
}
</script>

<template>
  <TheHeader />
  <div class="flex min-h-full">
    <div class="flex flex-1 px-4 py-12 lg:flex-none lg:px-20">
      <div class="w-full max-w-sm mx-auto lg:w-96">
        <div>
          <h2 class="text-3xl font-extrabold text-dark-900">Forgot password?</h2>
          <p class="mt-2 text-sm text-dark-600">No worries, we'll send you reset instructions</p>
        </div>

        <div class="mt-8">
          <form class="mt-6 space-y-6" @submit.prevent="handleLogin">
            <div>
              <div
                class="relative px-3 py-2 border border-dark-300 rounded-md shadow-sm focus-within:ring-1 focus-within:ring-primary-600 focus-within:border-primary-600"
              >
                <label
                  for="email"
                  class="absolute inline-block px-1 -mt-px text-xs font-medium text-dark-900 bg-light -top-2 left-2"
                  >Email</label
                >
                <Field id="email" v-model="form.email" type="text" />
              </div>
            </div>

            <div>
              <button
                type="submit"
                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-light bg-primary-600 border border-transparent rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
              >
                Submit
              </button>
            </div>

            <div class="text-sm text-center">
              Don't have an account?
              <router-link to="/login" class="font-medium text-primary-600 hover:text-primary-500">
                Sign up
              </router-link>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div
      class="relative flex-1 hidden w-0 lg:block bg-gradient-to-r from-primary-300 to-violet-300"
    >
      <img
        class="absolute inset-0 object-center w-1/2 h-1/2"
        src="./../assets/register.svg"
        alt=""
      />
    </div>
  </div>
  <!-- We can't seem to find the right email address for you resend the email that you have registeerror -->
  <TheFooter />
</template>
