<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <!--UNLOGGED-->
            <div v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                <router-link  :to="{ name : route.path }" :key="key" class="nav-item nav-link btn btn-outline-primary">
                    {{route.name}}
                </router-link>
            </div>
        <!--LOGGED USER-->
            <div v-if="$auth.check()" v-for="(route, key) in routes.user" v-bind:key="route.path" >
                <router-link  :to="{ name : route.path }" :key="key" class="nav-item nav-link btn btn-outline-success">
                    {{route.name}}
                </router-link>
            </div>
            <!--LOGOUT-->
            <div v-if="$auth.check()">
                <a href="#" @click.prevent="$auth.logout()" class="nav-item nav-link btn btn-outline-danger">Logout</a>
            </div>
      </div>
    </div>
    </nav>
</template>
<script>
  export default {
    data() {
      return {
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Login',
              path: 'login'
            }
          ],
          // LOGGED USER
          user: [
            {
              name: 'Dashboard',
              path: 'dashboard'
            }
          ],
        }
      }
    },
    mounted() {
      //
    }
  }
</script>