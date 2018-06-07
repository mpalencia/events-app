<template>
  <div class="main-layout">
    <navbar/>

    <div class="container mt-4">
      <child/>
    </div>
  </div>
</template>

<script>
import Navbar from '~/components_old/Navbar'

export default {
  name: 'MainLayout',

  components: {
    Navbar
  }
}
</script>
