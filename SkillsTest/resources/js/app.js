import './bootstrap';

import { createApp } from '../../node_modules/vue/dist/vue.esm-bundler';
import ListProperties from "./components/ListProperties.vue";

const app = createApp({
    components: {
        ListProperties,
    },
});

app.mount('#app');
