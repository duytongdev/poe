<script setup>
import { Menu, MenuButton, MenuItems } from '@headlessui/vue'
</script>

<template>
  <Menu as="div" class="relative inline-block">
    <MenuButton class="focus:outline-none"><slot name="button" /></MenuButton>
    <transition
      enter-active-class="transition duration-100 ease-out"
      enter-from-class="transform scale-95 opacity-0"
      enter-to-class="transform scale-100 opacity-100"
      leave-active-class="transition duration-75 ease-in"
      leave-from-class="transform scale-100 opacity-100"
      leave-to-class="transform scale-95 opacity-0"
    >
      <MenuItems
        class="absolute right-0 z-50 w-32 p-1 mt-2 border rounded-md border-dark-300 bg-light"
      >
        <slot name="items" />
      </MenuItems>
    </transition>
  </Menu>
</template>
