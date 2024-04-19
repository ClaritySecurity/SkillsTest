import './bootstrap';

import { createApp } from '../../node_modules/vue/dist/vue.esm.browser.js';
import App from './App.vue';

const app = createApp(App);
// apply any configurations here

app.mount('#app');
