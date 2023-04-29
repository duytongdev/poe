import { createApp } from 'vue'
import BaseToast from '@/components/BaseToast.vue'

export default (options) => {
  const toast = createApp(BaseToast).mount(document.createElement('div'))

  Object.keys(options).forEach((key) => {
    toast[key] = options[key]
  })

  document.body.appendChild(toast.$el)
}
