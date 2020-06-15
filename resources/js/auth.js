import bearer from '@websanova/vue-auth/drivers/auth/bearer'
import axios from '@websanova/vue-auth/drivers/http/axios.1.x'
import router from '@websanova/vue-auth/drivers/router/vue-router.2.x'
/**
 * Authentication configuration, some of the options can be override in method calls
 */
const config = {
  auth: bearer,
  http: axios,
  router: router,
  tokenDefaultName: 'laravel-jwt-auth',
  tokenStore: ['localStorage'],
  authRedirect: {path: '/'},

  // API endpoints used in Vue Auth.
  registerData: {
    url: 'auth/register',
    method: 'POST',
    redirect: '/'
  },
  loginData: {
    url: 'api/v1/auth/login',
    method: 'POST',
    redirect: '',
    fetchUser: true
  },
  logoutData: {
    url: '/api/v1/auth/logout',
    method: 'POST',
    redirect: '/',
    makeRequest: true
  },
  fetchData: {
    url: 'auth/user',
    method: 'GET',
    enabled: true
  },
  refreshData: {
    url: 'auth/refresh',
    method: 'GET',
    enabled: true,
    interval: 30
  },
  _parseUserData:function({data}){
    return data.data;
  }
}

export default config