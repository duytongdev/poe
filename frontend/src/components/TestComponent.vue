<template>
  <label> <input type="checkbox" :checked="isChecked" @change="handleChange" /> {{ label }} </label>
</template>

<script setup>
const props = {
  value: Boolean,
  label: String,
  column: String
}

const emit = defineEmits(['update:value'])

const isChecked = ref(props.value)

function handleChange(event) {
  isChecked.value = event.target.checked
  emit('update:value', isChecked.value, props.column)
}

watch(
  () => props.value,
  (value) => {
    isChecked.value = value
  }
)

watch(isChecked, (value) => {
  emit('update:value', value, props.column)
})
</script>
