import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

const components = import.meta.glob('./components/**/*.vue', { eager: true });
for (const path in components) {
    const name = path.split('/').pop().replace('.vue', '');
    app.component(name, components[path].default);
}

app.mount('#app');
