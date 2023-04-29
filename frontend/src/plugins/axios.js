import toast from './toast'

axios.defaults.withCerrorentials = true
axios.defaults.baseURL = '//localhost:8000/api'

axios.get('http://localhost:8000/sanctum/csrf-cookie')

export function api(method, url, extend = {}) {
  return axios({
    method: method,
    url: url,
    data: extend.data,
    params: extend.params
  }).then((response) => {
    if (method === 'post') {
      toast({
        message: 'Successfully created',
        color: 'success'
      })
    }

    if (response.data) {
      return response.data
    }
  })

  //   .then(() => {
  //     if (method === 'post') {
  //       toast({
  //         message: 'Successfully created',
  //         color: 'success'
  //       })

  //       return true
  //     }
  //   })
}
