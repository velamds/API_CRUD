<template>
<div>
    <h3>Servers List</h3>
    <div class="alert alert-danger" v-if="has_error">
        <p>Error, Something is wrong</p>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Specs</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="server in servers" v-bind:key="server.id" style="margin-bottom: 5px;">
            <th scope="row">{{ server.id }}</th>
            <td>{{ server.name }}</td>
            <td>{{ server.specs }}</td>
            <td><button @click="editServer(server)" class="btn btn-success mb-2">Edit</button></td>
        </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getServers(pagination.prev_page_url)">Previous</a></li>

                    <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                
                    <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getServers(pagination.next_page_url)">Next</a></li>
                </ul>
            </nav>
                </td>
            </tr>
            
        </tfoot>
        
    </table>
    <hr>
    <h4>Add a Server</h4>
    <form @submit.prevent="addServer" class="mb-3">
      <div class="form-group">
          <div class="row">
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Name" v-model="server.name">
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Specs" v-model="server.specs">
              </div>
          </div>
          
      </div>
      <div class="row">
          <div class="col-sm-8"></div>
          <div class="col-sm-2"><button @click="clearForm()" class="btn btn-light btn-block">Cancel</button></div>
          <div class="col-sm-2"><button type="submit" class="btn btn-dark btn-block">Save</button></div>
      </div>
      
    </form>
    
    <div class="alert alert-success" v-if="was_added">
            <p>New server added</p>
    </div>
    <div class="alert alert-success" v-if="was_updated">
            <p>server updated</p>
    </div>
    
</div>
</template>
<script>
  export default {
    data() {
    return {
      servers: [],
      server: {
        id: '',
        name: '',
        specs: ''
      },
      pagination: {},
      has_error: false,
      was_added: false,
      was_updated: false,
      edit: false
    };
  },
    mounted() {
      this.getServers()
    },
    methods: {
      getServers(page_url) {
        let vm = this;
        page_url = page_url || '/auth/servers';
        this.$http({
          url: page_url,
          method: 'GET'
        })
        .then(res => res.data)
        .then((res) => {
          this.servers = res.data;
          //console.log(res);
          vm.makePagination(res.meta, res.links);
          this.clearForm();
        })
        .catch(err => console.log(err));
      },
      
      makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    },
    
    addServer() {
      if (this.edit === false) {
        // Add
        this.$http({
          url: 'auth/server',
          method: 'POST',
          data: JSON.stringify(this.server),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.data)
          .then(data => {
            this.was_added=true;
            this.getServes();
          })
          .catch(err => console.log(err));
      } else {
        // Update
        this.$http({
          url: 'auth/server',
          method: 'PUT',
          data: JSON.stringify(this.server),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.data)
          .then(data => {
            this.was_updated=true;
            this.getServes();
          })
          .catch(err => console.log(err));
      }
    },
    editServer(server) {
      this.edit = true;
      this.server.id = server.id;
      this.server.server_id = server.id;
      this.server.name = server.name;
      this.server.specs = server.specs;
    },
    clearForm() {
      this.edit = false;
      this.server.id = null;
      this.server.server_id = null;
      this.server.name = '';
      this.server.specs = '';
      this.was_added = '',
      this.was_updated = ''
    }

    }
  }
</script>