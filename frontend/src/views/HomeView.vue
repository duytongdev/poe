<script setup>
import TheHeader from '@/components/TheHeader.vue'
import TheFooter from '@/components/TheFooter.vue'

import { StarIcon } from '@heroicons/vue/20/solid'

const categories = ref()

onMounted(async () => {
  let { data } = await axios.get('http://localhost:8000/api/categories')
  categories.value = data
})

const products = [
  {
    id: 1,
    name: 'Organize Basic Set (Walnut)',
    price: '$149',
    rating: 5,
    reviewCount: 38,
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-05-image-card-01.jpg',
    imageAlt: 'TODO',
    href: '#'
  },
  {
    id: 2,
    name: 'Organize Pen Holder',
    price: '$15',
    rating: 5,
    reviewCount: 18,
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-05-image-card-02.jpg',
    imageAlt: 'TODO',
    href: '#'
  },
  {
    id: 3,
    name: 'Organize Sticky Note Holder',
    price: '$15',
    rating: 5,
    reviewCount: 14,
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-05-image-card-03.jpg',
    imageAlt: 'TODO',
    href: '#'
  },
  {
    id: 4,
    name: 'Organize Phone Holder',
    price: '$15',
    rating: 4,
    reviewCount: 21,
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-05-image-card-04.jpg',
    imageAlt: 'TODO',
    href: '#'
  }
  // More products...
]
</script>

<template>
  <div class="bg-light">
    <TheHeader />
    <!-- <div v-for="category in categories" :key="category.id">
      <router-link :to="{ name: 'category', params: { name: category.name } }">{{
        category.name
      }}</router-link>
    </div> -->
    <main>
      <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div
          class="grid grid-cols-1 mt-6 gap-y-6 sm:grid-cols-2 sm:grid-rows-2 sm:gap-x-6 lg:gap-8"
        >
          <div
            class="overflow-hidden rounded-lg group aspect-w-2 aspect-h-1 sm:aspect-h-1 sm:aspect-w-1 sm:row-span-2"
          >
            <img
              src="https://tailwindui.com/img/ecommerce-images/home-page-03-featuerror-category.jpg"
              alt="Two models wearing women's black cotton crewneck tee and off-light cotton crewneck tee."
              class="object-cover object-center group-hover:opacity-75"
            />
            <div aria-hidden="true" class="opacity-50 bg-gradient-to-b from-transparent to-black" />
            <div class="flex items-end p-6">
              <div>
                <h3 class="font-semibold text-light">
                  <a href="#">
                    <span class="absolute inset-0" />
                    New Arrivals
                  </a>
                </h3>
                <p aria-hidden="true" class="mt-1 text-sm text-light">Shop now</p>
              </div>
            </div>
          </div>
          <div
            class="overflow-hidden rounded-lg group aspect-w-2 aspect-h-1 sm:relative sm:aspect-none sm:h-full"
          >
            <img
              src="https://tailwindui.com/img/ecommerce-images/home-page-03-category-01.jpg"
              alt="Wooden shelf with dark and olive drab success baseball caps, next to wooden clothes hanger with sweaters."
              class="object-cover object-center group-hover:opacity-75 sm:absolute sm:inset-0 sm:w-full sm:h-full"
            />
            <div
              aria-hidden="true"
              class="opacity-50 bg-gradient-to-b from-transparent to-black sm:absolute sm:inset-0"
            />
            <div class="flex items-end p-6 sm:absolute sm:inset-0">
              <div>
                <h3 class="font-semibold text-light">
                  <a href="#">
                    <span class="absolute inset-0" />
                    Accessories
                  </a>
                </h3>
                <p aria-hidden="true" class="mt-1 text-sm text-light">Shop now</p>
              </div>
            </div>
          </div>
          <div
            class="overflow-hidden rounded-lg group aspect-w-2 aspect-h-1 sm:relative sm:aspect-none sm:h-full"
          >
            <img
              src="https://tailwindui.com/img/ecommerce-images/home-page-03-category-02.jpg"
              alt="Walnut desk organizer set with light modular trays, next to porcelain mug on wooden desk."
              class="object-cover object-center group-hover:opacity-75 sm:absolute sm:inset-0 sm:w-full sm:h-full"
            />
            <div
              aria-hidden="true"
              class="opacity-50 bg-gradient-to-b from-transparent to-black sm:absolute sm:inset-0"
            />
            <div class="flex items-end p-6 sm:absolute sm:inset-0">
              <div>
                <h3 class="font-semibold text-light">
                  <a href="#">
                    <span class="absolute inset-0" />
                    Workspace
                  </a>
                </h3>
                <p aria-hidden="true" class="mt-1 text-sm text-light">Shop now</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-light">
        <div class="mx-auto overflow-hidden max-w-7xl sm:px-6 lg:px-8">
          <h2 class="sr-only">Products</h2>

          <div class="grid grid-cols-2 -mx-px sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
            <div v-for="product in products" :key="product.id" class="relative p-4 group sm:p-6">
              <div
                class="overflow-hidden rounded-lg bg-dark-200 aspect-w-1 aspect-h-1 group-hover:opacity-75"
              >
                <img
                  :src="product.imageSrc"
                  :alt="product.imageAlt"
                  class="object-cover object-center w-full h-full"
                />
              </div>
              <div class="pt-10 pb-4 text-center">
                <h3 class="text-sm font-medium text-dark-900">
                  <a :href="product.href">
                    <span aria-hidden="true" class="absolute inset-0" />
                    {{ product.name }}
                  </a>
                </h3>
                <div class="flex flex-col items-center mt-3">
                  <p class="sr-only">{{ product.rating }} out of 5 stars</p>
                  <div class="flex items-center">
                    <StarIcon
                      v-for="rating in [0, 1, 2, 3, 4]"
                      :key="rating"
                      :class="[
                        product.rating > rating ? 'text-yellow-400' : 'text-dark-200',
                        'flex-shrink-0 h-5 w-5'
                      ]"
                      aria-hidden="true"
                    />
                  </div>
                  <p class="mt-1 text-sm text-dark-500">{{ product.reviewCount }} reviews</p>
                </div>
                <p class="mt-4 text-base font-medium text-dark-900">{{ product.price }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <TheFooter />
  </div>
</template>
