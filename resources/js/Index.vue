<template>
<div class="container">
    <div id="main">
        <header id="header">
            <h1>
                SeedBox Test
            </h1>
            <navigationMenu></navigationMenu>
        </header>
        <div id="content">
           <router-view></router-view>
        </div>
    </div>
</div>
</template>


<script>
  import navigationMenu from './components/Menu.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      navigationMenu
    }
  }
</script>