import Axios from 'axios'

const axios = Axios.create({
  baseURL: import.meta.env.VITE_PUBLIC_BACKEND_URL,
  headers: {
    'X-Requested-With': 'XMLHttpRequest',
  },
  withCredentials: true,
})

axios.interceptors.response.use(
  r => r,
  error => {
    if (error.response.status == 401) {
      window.location.replace('/login')
    }
  }
)

export default axios
