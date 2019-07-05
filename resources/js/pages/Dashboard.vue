<template>
    <div class="container">
        <div class="card card-default">
        </div>
        <div class="card card-default">
            <div class="card-header">List</div>
            <div class="card-body">
                <Servers></Servers>
            </div>
        </div>
    </div>
</template>
<script>
  import Servers from '../components/Servers.vue'
  export default {
    mounted() {
      //
    },
    components: {
      Servers
    }
  }
</script>