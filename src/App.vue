<template>
  <div id="app">
    <!--<img src="./assets/logo.png">-->
    <img :src="require('@/assets/img/logo_mediumm.png')"
          height="120px"
          width="120px">
    <br>
    <hi >{{title}}</hi>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App',

    data () {
      return {
          title: 'Medium MOVIE'
      }
    }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
