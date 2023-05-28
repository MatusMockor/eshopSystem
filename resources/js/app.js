import './bootstrap';
import {createApp} from "vue";
import 'flowbite';
import CategoryForm from "../components/dashboard/CategoryForm.vue";
import ProductForm from "../components/dashboard/ProductForm.vue";
import CKEditor from '@ckeditor/ckeditor5-vue';
// import Alpine from 'alpinejs';

// window.Alpine = Alpine;
// Alpine.start();

const app = createApp({});

app.component('CategoryForm', CategoryForm);
app.component('ProductForm', ProductForm);

app.use(CKEditor);
app.mount('#app');
