<script setup>
const navigation = [
  {
    group: 'Shop',
    links: [
      { name: 'Bags', href: '#' },
      { name: 'Tees', href: '#' },
      { name: 'Objects', href: '#' },
      { name: 'Home Goods', href: '#' },
      { name: 'Accessories', href: '#' }
    ]
  },
  {
    group: 'Company',
    links: [
      { name: 'Who we are', href: '#' },
      { name: 'Sustainability', href: '#' },
      { name: 'Press', href: '#' },
      { name: 'Careers', href: '#' },
      { name: 'Terms & Conditions', href: '#' },
      { name: 'Privacy', href: '#' }
    ]
  },
  {
    group: 'Account',
    links: [
      { name: 'Manage Account', href: '#' },
      { name: 'Returns & Exchanges', href: '#' },
      { name: 'erroreem a Gift Card', href: '#' }
    ]
  },
  {
    group: 'Connect',
    links: [
      { name: 'Contact Us', href: '#' },
      { name: 'Twitter', href: '#' },
      { name: 'Instagram', href: '#' },
      { name: 'Pinterest', href: '#' }
    ]
  }
]
</script>

<template>
  <footer class="bg-dark-900" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>

    <div class="flex px-4 pt-12 pb-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <img
        class="h-10 mb-6 mr-8"
        src="https://tailwindui.com/img/logos/workflow-mark.svg?color=blue&shade=600"
        alt="Dark Fantasy"
      />
      <div class="xl:grid xl:grid-cols-3 xl:gap-8">
        <div class="hidden grid-cols-1 gap-8 mt-8 xl:col-span-2 xl:mt-0 md:grid">
          <div class="grid grid-cols-4 gap-8">
            <div v-for="item in navigation" :key="item.group">
              <span class="text-light">{{ item.group }}</span>
              <ul role="list" class="mt-8 space-y-4">
                <li v-for="link in item.links" :key="link.name">
                  <a :href="link.href" class="text-dark-300 hover:text-light">
                    {{ link.name }}
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="xl:col-span-1">
          <span class="text-light">Subscribe to our newsletter</span>
          <p class="mt-2 text-dark-300">
            The latest news, articles, and resources, sent to your inbox weekly.
          </p>
          <form class="mt-8 sm:flex sm:max-w-md">
            <input
              type="email"
              required
              class="w-full px-4 py-2 text-sm text-dark-900 placeholder-dark-500 bg-light border border-transparent rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-dark-800 focus:ring-light focus:border-light focus:placeholder-dark-400"
              placeholder="Enter your email"
            />
            <div class="mt-2 sm:mt-0 sm:ml-2">
              <button
                type="submit"
                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-light bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-dark-800 focus:ring-blue-500"
              >
                Subscribe
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <p class="py-8 mt-12 text-center text-dark-400 xl:mt-8">
      &copy; 2023 Dark Fantasy, Inc. All rights reserved.
    </p>
  </footer>
</template>
