import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    authUser: null
  }),
  getters: {
    user: (state) => state.authUser
  },
  actions: {
    async getToken() {
      await axios.get('sanctum/csrf-cookie')
    },
    async getUser() {
      await this.getToken()
      await axios
        .get('api/user')
        .then((response) => {
          this.authUser = response.data
        })
        .catch((error) => {
          if (error.response.status == 401) {
            this.router.push('login')
            console.log('You are not logged in')
          } else {
            throw error
          }
        })
    },
    async register(form, setErrors, processing) {
      axios
        .post('http://localhost:8000/register', form.value)
        .then((response) => {
          processing.value = false
          this.router.push({ name: 'home' })
        })
        .catch((error) => {
          if (error.response.status !== 422) throw error

          setErrors.value = Object.values(error.response.data.errors).flat()
          processing.value = false
        })
    },

    async login(processing, form) {
      await this.getToken()
      await axios
        .post('login', form)
        .then((response) => {
          processing.value = false
          this.router.push('/')
        })
        .catch((error) => {
          processing.value = false

          if (error.response.status !== 422) throw error
        })
    },

    async logout() {
      await axios
        .post('http://localhost:8000/logout')
        .then(() => {
          this.$reset()
          if (!this.userLogin.remember) {
            this.userLogin = {}
          }
          this.userData = {}
          this.authStatus = []

          this.router.push({ name: 'welcome' })
        })
        .catch((error) => {
          if (error.response.status !== 422) throw error
        })
    }
  }
})
