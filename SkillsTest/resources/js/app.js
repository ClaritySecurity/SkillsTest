import './bootstrap';

import { createApp } from '../../node_modules/vue/dist/vue.esm-bundler';
import SearchProperties from "./components/SearchProperties.vue";

const app = createApp({
    components: {
        SearchProperties,
    },
});

app.mount('#app');
