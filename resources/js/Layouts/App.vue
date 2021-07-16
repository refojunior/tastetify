<template>
  <div class="page">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top custom-navbar">
      <div class="container">
        <inertia-link class="navbar-brand" href="/">Tastetify</inertia-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item">

              <inertia-link  v-if="user.length != 0" class="nav-link" href="/generator">Generate Your Menu</inertia-link>
              <a class="nav-link" href="/generator" v-else>Generate Your Menu</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"  v-if="user.length != 0" @click.prevent="logout()">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <Alert />

    <main>
      <slot />
    </main>
    
    <Footer />

  </div>
</template>

<script>
  import Footer from '../Components/Footer.vue'
  import Alert from '../Components/Alert.vue'
  import { Inertia } from '@inertiajs/inertia'

  export default {
    props: {
      user: Array,
    },
    components: {
      Footer,
      Alert,
    },
    setup() {
        function logout(){
            Inertia.post('/logout')
        }

        return {
            logout
        }
    },
    
  }
</script>

<style scoped>
    .mt-5 {
      margin-top: 100px!important;
    }

    .custom-navbar {
      background-color: #0507089e!important;
      padding-top: 20px;
      padding-bottom: 20px;
      box-shadow: 0px 0px 7px 0px rgb(0 0 0 / 55%);
    }
</style>