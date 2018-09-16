<template>
  <div id="app">
    <!--<img src="./assets/logo.png">-->
    <img :src="require('@/assets/img/logo_mediumm.png')"
          height="120px"
          width="120px">
    <br>
    <h1 >{{title}}</h1>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App',

    data () {
      return {
          title: 'Medium MOVIE',
          notificationSystem: {
              options: {
                  show: {
                      theme: 'dark',
                      icon: 'icon-person',
                      position: 'topCenter',
                      progressBarColor: 'rgb(0, 255, 184)',
                      buttons: [
                          ['<button>Ok</button>', function (instance, toast) {
                              alert("Hello world!");
                          }, true],
                          ['<button>Close</button>', function (instance, toast) {
                              instance.hide({
                                  transitionOut: 'fadeOutUp',
                                  onClosing: function (instance, toast, closedBy) {
                                      console.info('closedBy: ' + closedBy);
                                  }
                              }, toast, 'buttonName');
                          }]
                      ],
                      onOpening: function (instance, toast) {
                          console.info('callback abriu!');
                      },
                      onClosing: function (instance, toast, closedBy) {
                          console.info('closedBy: ' + closedBy);
                      }
                  },
                  ballon: {
                      balloon: true,
                      position: 'bottomCenter'
                  },
                  info: {
                      position: 'bottomLeft'
                  },
                  success: {
                      position: 'bottomRight'
                  },
                  warning: {
                      position: 'topLeft'
                  },
                  error: {
                      position: 'topRight'
                  },
                  question: {
                      timeout: 20000,
                      close: false,
                      overlay: true,
                      toastOnce: true,
                      id: 'question',
                      zindex: 999,
                      position: 'center',
                      buttons: [
                          ['<button><b>YES</b></button>', function (instance, toast) {
                              instance.hide({transitionOut: 'fadeOut'}, toast, 'button');
                          }, true],
                          ['<button>NO</button>', function (instance, toast) {
                              instance.hide({transitionOut: 'fadeOut'}, toast, 'button');
                          }]
                      ],
                      onClosing: function (instance, toast, closedBy) {
                          console.info('Closing | closedBy: ' + closedBy);
                      },
                      onClosed: function (instance, toast, closedBy) {
                          console.info('Closed | closedBy: ' + closedBy);
                      }
                  }
              }
          }
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
