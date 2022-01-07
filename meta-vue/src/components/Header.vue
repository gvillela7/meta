<template>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <router-link to="/" class="nav-link">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/category" class="nav-link">Categoria</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/product" class ="nav-link">Produtos</router-link>
          </li>
        </ul>
        <form class="d-flex">
          <input
              class="form-control me-2"
              type="search"
              v-model="this.form.search"
              placeholder="Buscar produtos"
              aria-label="Search"
          />
        </form>
        <b-button v-on:click="getSearch">Buscar</b-button>
      </div>
    </div>
  </nav>

</template>
<script>

import api from "@/services/api";

export default {
  name: 'Header',
  data() {
    return {
      form: {
        search: '',
        products: {}
      },
      show: true
    }
  },
  methods: {
    async getSearch() {
      const result = await api.productSearch(this.form);
      if (this.form.search === '') {
        this.form.products = {}

      } else
        this.form.products = result.data.product
        this.form.search = ''
       this.$store.dispatch('updateProducts', this.form.products)
      }
  },
}
</script>
