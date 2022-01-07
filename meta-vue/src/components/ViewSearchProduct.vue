<template>
  <div class="row pt-lg-4">
    <h3>Busca</h3>
    <div v-for="product in products" :key="product.id" class="col-3 pt-md-2">
      <b-card :title=product.name :sub-title=product.ref>
        <b-card-text>
          <b-badge pill variant="dark">{{product.category.name}}</b-badge>
        </b-card-text>

        <b-card-text>{{product.description}}</b-card-text>

        <div class="d-flex flex-row-reverse bd-highlight me-1">
          <b-badge variant="primary">R$ {{product.price}}</b-badge>
          <b-badge variant="success" class="me-2">Garantia: {{product.warranty}}</b-badge>
        </div>
      </b-card>
    </div>
  </div>
</template>
<script>
export default {
  props: {products: {type: Object, require: true}}
}
</script>
