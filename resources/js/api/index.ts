import axios from 'axios'
import cookie from 'cookiejs'
import { toast } from '../helpers';

const instance = axios.create({
  baseURL: '/api',
  timeout: 1000,
  withCredentials: true,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    'X-Requested-With': 'XMLHttpRequest'
  },
})

instance.interceptors.request.use(function (config) {
    if (! cookie.get('test2')) {
      instance.get('/sanctum/csrf-cookie')
        .then(data => console.log(data))
      // cookie.set('XSRF-TOKEN', 'tank')
    }

    return config;
  }, function (error) {
    return Promise.reject(error);
  }
)

instance.interceptors.response.use(function (config) {
    return config;
  }, function (error) {
    if (error.response) {
      const { message } = error.response.data
      toast(message, 'ERROR')
    }

    return Promise.reject(error);
  }
)

export default instance