<template>
  <div class="row pt-lg-5">
    <h3>Categorias</h3>
    <div v-for="category in categories" :key="category.id" class="col-3" >
    <b-card
        border-variant="primary"
        :header=category.name
        header-bg-variant="primary"
        header-text-variant="white"
        align="center"
    >
      <b-card-text>Total de produtos cadastrados: <b-badge pill variant="warning">{{category.product.length}}</b-badge></b-card-text>
    </b-card>
    </div>
  </div>
</template>
<script>
export default {
  props: {categories: {type: Object, require: true}}
}
</script>
