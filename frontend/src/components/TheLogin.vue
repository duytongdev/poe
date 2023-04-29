<script setup>
import FormGroup from '@/components/FormGroup.vue'
// import FormInput from '@/components/FormInput.vue'
import BaseButton from '@/components/BaseButton.vue'

import { useUsers } from '@/stores/auth'
import { useRoute } from 'vue-router'
import CheckBoxField from './CheckBoxField.vue'
import BaseLink from './BaseLink.vue'

const route = useRoute()

const store = useUsers()

const form = ref({
  email: '',
  password: '',
  remember: false
})

// const processing = ref(false)

const setErrors = ref()

const errors = computed(() => setErrors.value)

const status = route.query.reset?.length > 0 ? atob(route.query.reset) : null

form.value = store.userLogin

const submitLogin = () => {
  console.log('ok')
  //   store.login(setErrors, processing)
}
</script>

<template>
  <div class="flex flex-col justify-center min-h-full py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img
        class="w-auto h-12 mx-auto"
        src="https://tailwindui.com/img/logos/workflow-mark-primary-600.svg"
        alt="Workflow"
      />
      <h2 class="mt-6 text-3xl font-medium tracking-tight text-center text-dark-900">
        Welcome to Graphos!
      </h2>
      <p class="mt-4 text-sm text-center text-dark-600">
        Register to create your first account and start exploring the photo gallery in Graphos.
        <!-- Give us some of your information to get free access to store -->
      </p>
    </div>

    <div class="mt-8">
      <div v-if="status" class="mb-4 text-sm font-medium text-success-600">
        {{ status }}
      </div>

      <ValidationErrors class="mb-4" :errors="errors" />

      {{ form.email }}

      {{ form.password }}
      <form class="space-y-6" @submit.prevent="submitLogin">
        <FormGroup label="Email" required>
          <!-- <FormInput v-model="form.email" type="email" /> -->
        </FormGroup>
        <input v-model="form.email" type="email" />

        <FormGroup label="Password" required>
          <!-- <FormInput v-model="form.password" type="password" /> -->
        </FormGroup>
        <input v-model="form.password" type="password" />

        <div class="flex items-center justify-between">
          <CheckBoxField
            id="remember-me"
            v-model="form.remember"
            label="Remember me"
            :checked="form.remember"
          />

          <div class="text-sm">
            <BaseLink link="/forgot-password">Forgot your password?</BaseLink>
          </div>
        </div>

        <div>
          <BaseButton>Sign In</BaseButton>
        </div>

        <div class="text-sm text-center">
          Don't have an account?
          <BaseLink link="/login">Sign Up</BaseLink>
        </div>
      </form>
    </div>
  </div>
</template>
