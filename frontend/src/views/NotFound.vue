<template>
  <main class="grid min-h-full px-6 py-24 bg-light place-items-center sm:py-32 lg:px-8">
    <div class="text-center">
      <p class="text-base font-semibold text-primary-600">404</p>
      <h1 class="mt-4 text-3xl font-bold tracking-tight text-dark-900 sm:text-5xl">
        Page not found
      </h1>
      <p class="mt-6 text-base leading-7 text-dark-600">
        Sorry, we couldn’t find the page you’re looking for.
      </p>
      <div class="flex items-center justify-center mt-10 gap-x-6">
        <router-link
          to="/"
          class="rounded-md bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-light shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600"
          >Go back home</router-link
        >
        <a href="#" class="text-sm font-semibold text-dark-900"
          >Contact support <span aria-hidden="true">&rarr;</span></a
        >
      </div>
    </div>
  </main>
</template>
