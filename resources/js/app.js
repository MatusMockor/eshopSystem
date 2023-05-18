import './bootstrap';
import {createApp} from "vue";
import 'flowbite';
import CategoryForm from "../components/dashboard/CategoryForm.vue";
// import Alpine from 'alpinejs';

// window.Alpine = Alpine;
// Alpine.start();

const app = createApp({});

app.component('CategoryForm', CategoryForm);

app.mount('#app');