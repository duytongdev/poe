<template>
  <div class="relative h-screen scroll-x-auto">
    <p class="whitespace-nowrap">
      This element will be centered horizontally by body and vertically by parent This element will
      be centered horizontally by body and vertically by parent
    </p>
    <div class="absolute inset-0 flex items-center justify-center">
      <div class="w-64 h-64 bg-gray-500">
        <!-- This element will be centered horizontally by body and vertically by parent -->
        <div class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
          Hello
        </div>
      </div>
    </div>
  </div>
</template>
