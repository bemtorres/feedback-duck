import './bootstrap';


import { createApp } from 'vue/dist/vue.esm-bundler';
import Welcome from './Welcome.vue';

const app = createApp({});

app.component('Welcome', Welcome);

app.mount('#app');
