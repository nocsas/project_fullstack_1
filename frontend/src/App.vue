<template>
  <div id="app">
    <ItemNavbar/>
    <div class="container pt-4">
      <router-view/>
    </div>
  </div>
</template>
<script> 
  import ItemNavbar from '@/components/ItemNavbar.vue'
  
  export default { 
    components: {
      ItemNavbar
    }
  }
</script>
<style>
  #app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; 
  color: #2c3e50;
  } 
  #app .navbar-nav a{ 
  color: #2c3e50;
  cursor: pointer;
  }
  #app .navbar-nav a.router-link-exact-active {
  color: #42b983;
  }
</style>