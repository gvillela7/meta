<template>
  <Header />
  <div class="container pt-3">
    <router-view />
  </div>
</template>

<script>

import Header from "@/components/Header";

export default {
  name: 'App',
  components: {Header},
}
</script>
