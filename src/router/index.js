import Vue from 'vue';
import VueRouter  from 'vue-router';

import HelloWorld from '@/components/HelloWorld';
import Authorisation from '../components/Authorisation';
import Registration from '../components/Registration';

Vue.use(VueRouter );

export default new VueRouter ({
  routes: [
        {
          path: '/',
          name: 'HelloWorld',
          component: HelloWorld
        },
        {
          path: '/auth',
          name: 'Authorisation',
          component: Authorisation
        },
        {
          path: '/registration',
          name: 'Registration',
          component: Registration
        }
  ]
})
