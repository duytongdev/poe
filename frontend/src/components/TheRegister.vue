<script setup>
import FormGroup from '@/components/FormGroup.vue'
import FormInput from '@/components/FormInput.vue'
import BaseButton from '@/components/BaseButton.vue'

const form = ref({
  name: '',
  email: '',
  password: ''
})
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
      <form class="space-y-6" @submit.prevent="handleRegister">
        <FormGroup label="Name" required :error="v$.name.$error" :error-message="v$.name.$errors">
          <FormInput v-model="form.name" type="text" @blur="v$.name.$touch" />
        </FormGroup>

        <FormGroup
          label="Email"
          required
          :error="v$.email.$error"
          :error-message="v$.email.$errors"
        >
          <FormInput v-model="form.email" type="text" @blur="v$.email.$touch" />
        </FormGroup>

        <FormGroup
          label="Password"
          required
          :error="v$.password.$error"
          :error-message="v$.password.$errors"
        >
          <FormInput v-model="form.password" type="text" @blur="v$.password.$touch" />
        </FormGroup>

        <p class="text-sm text-center text-dark-900">
          By signing up, you agree to Drip's
          <router-link to="/" class="text-primary-600 hover:text-primary-500"
            >Terms of Service</router-link
          >
          and
          <router-link to="/" class="text-primary-600 hover:text-primary-500"
            >Privacy Policy</router-link
          >
        </p>

        <div>
          <BaseButton>Sign Up</BaseButton>
        </div>

        <div class="text-sm text-center">
          Already have an account?
          <router-link to="/login" class="font-medium text-primary-600 hover:text-primary-500">
            Sign In
          </router-link>
        </div>
      </form>
    </div>
  </div>
</template>
