import bearer from '@websanova/vue-auth/drivers/auth/bearer'
import axios from '@websanova/vue-auth/drivers/http/axios.1.x'
import router from '@websanova/vue-auth/drivers/router/vue-router.2.x'

const config = {
  auth: bearer,
  http: axios,
  router: router,
  tokenDefaultName: 'SeedBoxTest',
  tokenStore: ['localStorage'],

  loginData: {url: 'auth/login', method: 'POST', redirect: '', fetchUser: true},
  logoutData: {url: 'auth/logout', method: 'POST', redirect: '/', makeRequest: true},
  refreshData: {url: 'auth/refresh', method: 'GET', enabled: true, interval: 30},
  
  addServer: {url: 'auth/server', method: 'POST', redirect: '/dashboard'},

  //registerData: {url: 'auth/register', method: 'POST', redirect: '/login'},
  fetchData: {url: 'auth/user', method: 'GET', enabled: true}
  
}
export default config