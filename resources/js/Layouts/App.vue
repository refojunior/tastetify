<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container">
        <inertia-link class="navbar-brand" href="/">TASTETIFY</inertia-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <inertia-link class="nav-link" href="/posts/">POSTS</inertia-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <main>
      <slot />
    </main>
    
    <Footer />
    
  </div>
</template>

<script>
  import Footer from '../Components/Footer.vue'

  export default {
    components: {
      Footer,
    }
  }
</script>

<style scoped>
    .mt-5 {
      margin-top: 100px!important;
    }
</style>