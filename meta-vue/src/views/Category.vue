<template>
  <Header />
  <div class="container pt-3">
  <FormCategory />
  </div>
</template>

<script>
import Header from "@/components/Header";
import FormCategory from "@/components/FormCategory";

export default {
  name: 'Category',
  components: {FormCategory, Header},
}
</script>
