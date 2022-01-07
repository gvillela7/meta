<template>
  <Header />
  <div class="container pt-3">
    <CategoryCard :categories="categories" />
    <b-dropdown-divider />
    <ViewSearchProduct :products="this.$store.state.products" />
    <b-dropdown-divider />
    <ProductCard :products="products" />
  </div>
</template>

<script>
import {onMounted, reactive, toRefs} from "vue";
import api from "@/services/api";
import ProductCard from "@/components/ProductCard";
import Header from "@/components/Header";
import CategoryCard from "@/components/CategoryCard";
import ViewSearchProduct from "@/components/ViewSearchProduct";

export default {
  name: 'Home',
  components: {ViewSearchProduct, CategoryCard, Header, ProductCard},
  setup() {
    const data = reactive({
      products: {},
      categories: {},
    })
    onMounted(async () =>{
      const response = await  api.product()
      data.products = response.data.product

      const result = await api.category()
      data.categories = result.data.categories
    })

    return {...toRefs(data)}
  },

}
</script>
