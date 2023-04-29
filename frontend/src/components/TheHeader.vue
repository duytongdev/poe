<script setup>
import {
  Dialog,
  DialogOverlay,
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
  Tab,
  TabGroup,
  TabList,
  TabPanel,
  TabPanels,
  TransitionChild,
  TransitionRoot
} from '@headlessui/vue'

import {
  MagnifyingGlassIcon,
  XMarkIcon,
  UserCircleIcon,
  ShoppingBagIcon,
  BuildingStorefrontIcon,
  BellIcon
} from '@heroicons/vue/24/outline'
// import { UserCircleIcon, ShoppingBagIcon, BuildingStorefrontIcon } from '@heroicons/vue/20/solid'
import SvgIcon from '@/components/SvgIcon.vue'

const navigation = {
  categories: [
    {
      id: 'women',
      name: 'Women',
      featurose: [
        {
          name: 'New Arrivals',
          href: '#',
          imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg',
          imageAlt: 'Models sitting back to back, wearing Basic Tee in black and bone.'
        },
        {
          name: 'Basic Tees',
          href: '#',
          imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg',
          imageAlt:
            'Close up of Basic Tee fall bundle with off-light, ochre, olive, and black tees.'
        }
      ],
      sections: [
        {
          id: 'clothing',
          name: 'Clothing',
          items: [
            { name: 'Tops', href: '#' },
            { name: 'Dresses', href: '#' },
            { name: 'Pants', href: '#' },
            { name: 'Denim', href: '#' },
            { name: 'Sweaters', href: '#' },
            { name: 'T-Shirts', href: '#' },
            { name: 'Jackets', href: '#' },
            { name: 'Activewear', href: '#' },
            { name: 'Browse All', href: '#' }
          ]
        },
        {
          id: 'accessories',
          name: 'Accessories',
          items: [
            { name: 'Watches', href: '#' },
            { name: 'Wallets', href: '#' },
            { name: 'Bags', href: '#' },
            { name: 'Sunglasses', href: '#' },
            { name: 'Hats', href: '#' },
            { name: 'Belts', href: '#' }
          ]
        },
        {
          id: 'brands',
          name: 'Brands',
          items: [
            { name: 'Full Nelson', href: '#' },
            { name: 'My Way', href: '#' },
            { name: 'Re-Arranged', href: '#' },
            { name: 'Counterfeit', href: '#' },
            { name: 'Significant Other', href: '#' }
          ]
        }
      ]
    },
    {
      id: 'men',
      name: 'Men',
      featurose: [
        {
          name: 'New Arrivals',
          href: '#',
          imageSrc:
            'https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg',
          imageAlt: 'Drawstring top with elastic loop closure and texturose interior padding.'
        },
        {
          name: 'Artwork Tees',
          href: '#',
          imageSrc:
            'https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg',
          imageAlt:
            'Three shirts in dark, light, and rose arranged on table with same line drawing of hands and shapes overlapping on front of shirt.'
        }
      ],
      sections: [
        {
          id: 'clothing',
          name: 'Clothing',
          items: [
            { name: 'Tops', href: '#' },
            { name: 'Pants', href: '#' },
            { name: 'Sweaters', href: '#' },
            { name: 'T-Shirts', href: '#' },
            { name: 'Jackets', href: '#' },
            { name: 'Activewear', href: '#' },
            { name: 'Browse All', href: '#' }
          ]
        },
        {
          id: 'accessories',
          name: 'Accessories',
          items: [
            { name: 'Watches', href: '#' },
            { name: 'Wallets', href: '#' },
            { name: 'Bags', href: '#' },
            { name: 'Sunglasses', href: '#' },
            { name: 'Hats', href: '#' },
            { name: 'Belts', href: '#' }
          ]
        },
        {
          id: 'brands',
          name: 'Brands',
          items: [
            { name: 'Re-Arranged', href: '#' },
            { name: 'Counterfeit', href: '#' },
            { name: 'Full Nelson', href: '#' },
            { name: 'My Way', href: '#' }
          ]
        }
      ]
    }
  ],
  pages: [
    { name: 'Company', href: '#' },
    { name: 'Stores', href: '#' }
  ]
}

const menu = [
  {
    name: 'Home',
    to: '/'
  },
  {
    name: 'Shop',
    to: '/'
  },
  {
    name: 'About',
    to: '/'
  },
  {
    name: 'Blog',
    to: '/'
  },
  {
    name: 'Contact',
    to: '/'
  }
]

const openMenu = ref(false)
</script>

<template>
  <!-- Mobile menu -->
  <TransitionRoot as="template" :show="openMenu">
    <Dialog as="div" class="fixed inset-0 z-40 flex lg:hidden" @close="openMenu = false">
      <TransitionChild
        as="template"
        enter="transition-opacity ease-linear duration-300"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="transition-opacity ease-linear duration-300"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
        <DialogOverlay class="fixed inset-0 bg-black bg-opacity-25" />
      </TransitionChild>

      <TransitionChild
        as="template"
        enter="transition ease-in-out duration-300 transform"
        enter-from="-translate-x-full"
        enter-to="translate-x-0"
        leave="transition ease-in-out duration-300 transform"
        leave-from="translate-x-0"
        leave-to="-translate-x-full"
      >
        <div
          class="relative flex flex-col w-full max-w-xs pb-12 overflow-y-auto bg-light shadow-xl"
        >
          <div class="flex px-4 pt-5 pb-2">
            <button
              type="button"
              class="inline-flex items-center justify-center p-2 -m-2 text-dark-400 rounded-md"
              @mouseover="openMenu = false"
            >
              <span class="sr-only">Close menu</span>
              <XMarkIcon class="w-6 h-6" aria-hidden="true" />
            </button>
          </div>

          <!-- Links -->
          <TabGroup as="div" class="mt-2">
            <div class="border-b border-dark-200">
              <TabList class="flex px-4 -mb-px space-x-8">
                <Tab
                  v-for="category in navigation.categories"
                  :key="category.name"
                  v-slot="{ selected }"
                  as="template"
                >
                  <button
                    :class="[
                      selected
                        ? 'text-rose-600 border-rose-600'
                        : 'text-dark-900 border-transparent',
                      'flex-1 lightspace-nowrap py-4 px-1 border-b-2 text-base font-medium'
                    ]"
                  >
                    {{ category.name }}
                  </button>
                </Tab>
              </TabList>
            </div>
            <TabPanels as="template">
              <TabPanel
                v-for="(category, categoryIdx) in navigation.categories"
                :key="category.name"
                class="px-4 pt-10 pb-6 space-y-12"
              >
                <div class="grid items-start grid-cols-1 gap-y-10 gap-x-6">
                  <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                    <div>
                      <p
                        :id="`mobile-featurose-heading-${categoryIdx}`"
                        class="font-medium text-dark-900"
                      >
                        Featurose
                      </p>
                      <ul
                        role="list"
                        :aria-labelledby="`mobile-featurose-heading-${categoryIdx}`"
                        class="mt-6 space-y-6"
                      >
                        <li v-for="item in category.featurose" :key="item.name" class="flex">
                          <a :href="item.href" class="text-dark-500">
                            {{ item.name }}
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div>
                      <p id="mobile-categories-heading" class="font-medium text-dark-900">
                        Categories
                      </p>
                      <ul
                        role="list"
                        aria-labelledby="mobile-categories-heading"
                        class="mt-6 space-y-6"
                      >
                        <li v-for="item in category.categories" :key="item.name" class="flex">
                          <a :href="item.href" class="text-dark-500">
                            {{ item.name }}
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="grid grid-cols-1 gap-y-10 gap-x-6">
                    <div>
                      <p id="mobile-collection-heading" class="font-medium text-dark-900">
                        Collection
                      </p>
                      <ul
                        role="list"
                        aria-labelledby="mobile-collection-heading"
                        class="mt-6 space-y-6"
                      >
                        <li v-for="item in category.collection" :key="item.name" class="flex">
                          <a :href="item.href" class="text-dark-500">
                            {{ item.name }}
                          </a>
                        </li>
                      </ul>
                    </div>

                    <div>
                      <p id="mobile-brand-heading" class="font-medium text-dark-900">Brands</p>
                      <ul role="list" aria-labelledby="mobile-brand-heading" class="mt-6 space-y-6">
                        <li v-for="item in category.brands" :key="item.name" class="flex">
                          <a :href="item.href" class="text-dark-500">
                            {{ item.name }}
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </TabPanel>
            </TabPanels>
          </TabGroup>

          <div class="px-4 py-6 space-y-6 border-t border-dark-200">
            <div v-for="page in navigation.pages" :key="page.name" class="flow-root">
              <a :href="page.href" class="block p-2 -m-2 font-medium text-dark-900">{{
                page.name
              }}</a>
            </div>
          </div>

          <div class="px-4 py-6 space-y-6 border-t border-dark-200">
            <div class="flow-root">
              <a href="#" class="block p-2 -m-2 font-medium text-dark-900">Create an account</a>
            </div>
            <div class="flow-root">
              <a href="#" class="block p-2 -m-2 font-medium text-dark-900">Sign in</a>
            </div>
          </div>

          <div class="px-4 py-6 space-y-6 border-t border-dark-200">
            <!-- Currency selector -->
            <form>
              <div class="inline-block">
                <label for="mobile-currency" class="sr-only">Currency</label>
                <div
                  class="relative -ml-2 border-transparent rounded-md group focus-within:ring-2 focus-within:ring-light"
                >
                  <select
                    id="mobile-currency"
                    name="currency"
                    class="bg-none border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-dark-700 group-hover:text-dark-800 focus:outline-none focus:ring-0 focus:border-transparent"
                  >
                    <option v-for="currency in currencies" :key="currency">{{ currency }}</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none">
                    <svg
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 20 20"
                      class="w-5 h-5 text-dark-500"
                    >
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M6 8l4 4 4-4"
                      />
                    </svg>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </TransitionChild>
    </Dialog>
  </TransitionRoot>

  <header class="relative">
    <nav aria-label="Top">
      <div class="bg-dark-900">
        <div class="container flex items-center justify-between h-10">
          <p class="text-light">Get free delivery on orders over $100</p>
          <div class="flex items-center">
            <router-link to="/" class="flex items-center text-light">
              <BellIcon class="w-6 h-6" aria-hidden="true" />
              <span>Notifications</span>
            </router-link>
          </div>
        </div>
      </div>
      <div class="py-2 bg-light">
        <div class="container flex items-center justify-between">
          <router-link
            to="/"
            class="flex items-center text-2xl font-medium tracking-tight uppercase"
          >
            <span class="text-rose-500">Raf</span><span class="text-dark-900">Cart</span>
          </router-link>
          <form action="" class="relative w-6/12">
            <input
              type="text"
              class="w-full text-sm border-2 rounded-sm border-rose-500 xl:pr-16 focus:ring-0 focus:border-rose-500 placeholder:text-dark-400"
              placeholder="Search for products, brands and more"
            />
            <button
              class="absolute flex items-center px-4 py-2 text-light transition-colors rounded-sm bg-rose-500 hover:bg-rose-400 focus:bg-rose-600 right-1 inset-y-1"
            >
              <MagnifyingGlassIcon class="w-5 h-5" />
            </button>
          </form>
          <div class="flex items-center space-x-4">
            <router-link to="/" class="flex flex-col items-center p-2">
              <BuildingStorefrontIcon
                class="w-6 h-6 text-dark-400 group-hover:text-dark-500"
                aria-hidden="true"
              />
              <span class="text-dark-900">Seller</span>
              <span class="text-xs text-dark-500">Become a Seller</span>
            </router-link>
            <router-link to="/" class="flex flex-col items-center p-2">
              <UserCircleIcon
                class="w-6 h-6 text-dark-400 group-hover:text-dark-500"
                aria-hidden="true"
              />
              <span class="text-dark-900">Account</span>
              <span class="text-xs text-dark-500">Login/Register</span>
            </router-link>
            <a href="#" class="relative flex flex-col items-center p-2 -m-2 group">
              <ShoppingBagIcon
                class="w-6 h-6 text-dark-400 group-hover:text-dark-500"
                aria-hidden="true"
              />
              <span
                class="absolute flex items-center justify-center w-5 h-5 text-xs font-medium rounded-full text-rose-500 bg-rose-100 left-6"
                >9</span
              >
              <span class="text-dark-900">Cart</span>
              <span class="text-xs text-dark-500">Your orders</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Secondary navigation -->
      <!-- <div class="shadow">
        <div class="container">
          <div class="flex items-center h-16 justify-evenly">


            <div class="flex items-center justify-end flex-1">
              <div class="flex items-center lg:ml-8">
                <div class="flow-root">
                  <a href="#" class="relative flex p-2 -m-2 group">
                    <ShoppingBagIcon
                      class="w-8 h-8 text-dark-400 group-hover:text-dark-500"
                      aria-hidden="true"
                    />
                    <span
                      class="absolute flex items-center justify-center w-5 h-5 text-xs font-medium rounded-full text-rose-800 bg-rose-100 left-6"
                      >9</span
                    >
                    <span class="sr-only">items in cart, view bag</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <div class="bg-dark-900">
        <div class="container flex items-center justify-between">
          <div class="flex space-x-4">
            <div>
              <button class="flex items-center px-4 py-3 text-light bg-rose-500">
                <SvgIcon name="regular" class="mr-2" />
                <span>All Categories</span>
              </button>
            </div>
            <div>
              <ul class="flex">
                <li v-for="item in menu" :key="item.name">
                  <router-link
                    :to="item.to"
                    class="block px-4 py-3 text-light transition-colors hover:text-rose-500"
                    >{{ item.name }}</router-link
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="flex">
            <router-link to="" class="text-light hover:text-rose-500">Login</router-link>
            <span class="mx-1 text-light">/</span>
            <router-link to="" class="text-light hover:text-rose-500">Register</router-link>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>
