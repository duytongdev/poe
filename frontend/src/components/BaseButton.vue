<script setup>
const props = defineProps({
  iconLeft: {
    type: String,
    default: ''
  },
  iconRight: {
    type: String,
    default: ''
  },
  disabled: {
    type: Boolean,
    default: false
  },
  as: {
    type: String,
    default: 'button'
  },
  intent: {
    type: String,
    validator: (value) => ['primary', 'secondary', 'tertiary', 'ghost'].includes(value),
    default: 'primary'
  }
})

const buttonClass = computed(() => {
  return {
    'inline-flex items-center px-4 py-2 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2': true,
    'text-light bg-primary-600 hover:bg-primary-700 focus:ring-2 focus:ring-offset-2 focus:ring-primary-600':
      props.intent === 'primary',
    'text-primary-600 bg-primary-100 hover:bg-primary-200 focus:ring-2 focus:ring-offset-2 focus:ring-primary-600':
      props.intent === 'secondary',
    'text-dark-500 bg-light border-dark-300 border hover:bg-dark-50   focus:ring-primary-600':
      props.intent === 'ghost',
    'hover:bg-dark-100 focus:ring-2 focus:ring-offset-2 focus:ring-primary-600':
      props.intent === 'tertiary'
  }
})
</script>

<template>
  <component :is="props.as" :disabled="props.disabled" :class="buttonClass">
    <BaseIcon v-if="props.iconLeft" :icon="['fas', props.iconLeft]" class="mr-2" />
    <span>
      <slot />
    </span>
    <BaseIcon v-if="props.iconRight" :icon="['fas', props.iconRight]" class="ml-2" />
  </component>
</template>
