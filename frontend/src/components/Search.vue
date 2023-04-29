<template>
  <!-- <TransitionRoot as="template" :show="openSearch">
    <Dialog as="div" class="relative z-10" @close="openSearch = false">
      <TransitionChild
        as="template"
        enter="ease-out duration-300"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="ease-in duration-200"
        leave-from="opacity-100"
        leave-to="opacity-0"
      >
        <div class="fixed inset-0 transition-opacity bg-dark-500 bg-opacity-75" />
      </TransitionChild>

      <div class="fixed inset-0 z-10 overflow-y-auto">
        <div
          class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0"
        >
          <TransitionChild
            as="template"
            enter="ease-out duration-300"
            enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            enter-to="opacity-100 translate-y-0 sm:scale-100"
            leave="ease-in duration-200"
            leave-from="opacity-100 translate-y-0 sm:scale-100"
            leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          >
            <DialogPanel
              class="relative overflow-hidden text-left transition-all transform bg-light rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-lg"
            >
              <div class="px-4 pt-5 pb-4 bg-light sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div
                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-error-100 rounded-full sm:mx-0 sm:h-10 sm:w-10"
                  >
                    <ExclamationTriangleIcon class="w-6 h-6 text-error-600" aria-hidden="true" />
                  </div>
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <DialogTitle as="h3" class="text-base font-semibold leading-6 text-dark-900"
                      >Deactivate account</DialogTitle
                    >
                    <div class="mt-2">
                      <p class="text-sm text-dark-500">
                        Are you sure you want to deactivate your account? All of your data will be
                        permanently removed. This action cannot be undone.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-4 py-3 bg-dark-50 sm:flex sm:flex-row-reverse sm:px-6">
                <button
                  type="button"
                  class="inline-flex justify-center w-full px-3 py-2 text-sm font-semibold text-light bg-error-600 rounded-md shadow-sm hover:bg-error-500 sm:ml-3 sm:w-auto"
                  @click="openSearch = false"
                >
                  Deactivate
                </button>
                <button
                  type="button"
                  class="inline-flex justify-center w-full px-3 py-2 mt-3 text-sm font-semibold text-dark-900 bg-light rounded-md shadow-sm ring-1 ring-inset ring-dark-300 hover:bg-dark-50 sm:mt-0 sm:w-auto"
                  @click="openSearch = false"
                  ref="cancelButtonRef"
                >
                  Cancel
                </button>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot> -->
</template>

<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ExclamationTriangleIcon } from '@heroicons/vue/24/outline'

const openSearch = ref(false)
</script>
