<template>
  <Header />
  <div class="container pt-3">
    <FormProduct />
  </div>
</template>

<script>
import Header from "@/components/Header";
import FormProduct from "@/components/FormProduct";

export default {
  name: 'Product',
  components: {FormProduct, Header},
}
</script>
