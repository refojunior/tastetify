<template>
  <div class="page">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top custom-navbar">
      <div class="container">
        <inertia-link class="navbar-brand" href="/" @click.prevent="menuToggle()">Tastetify</inertia-link>
        <button class="navbar-toggler" type="button" @click.prevent="menuToggle()" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" :class="[menuOpen == false ? 'd-none' : 'd-block']" id="navbarCollapse">
          <ul class="navbar-nav ms-auto mb-2 mb-md-0" v-if="user.length != 0" >
            <li class="nav-item">
              <inertia-link class="nav-link" href="/top-artists" @click.prevent="menuToggle();">Top Artists</inertia-link>            
            </li>
            <li class="nav-item">
              <inertia-link class="nav-link" href="/top-tracks" @click.prevent="menuToggle();">Top Artists</inertia-link>
            </li>
            <li class="nav-item">
              <inertia-link class="nav-link" href="/generator" @click.prevent="menuToggle();">Generate Card</inertia-link>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"  v-if="user.length != 0" @click.prevent="logout(); menuToggle()">Logout</a>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto mb-2 mb-md-0" v-else>
            <li class="nav-item" >
              <a class="nav-link" href="/top-artists">Top Artists</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" href="/top-tracks">Top Tracks</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" href="/generator">Generate Card</a>
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
    data() {
      return {
        menuOpen: false
      }
    },
    methods: {
      menuToggle(){
        return this.menuOpen = !this.menuOpen
      }
    },
    setup() {
        function logout(){
            Inertia.post('/logout')
        }

        return {
            logout
        }
    }
    
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