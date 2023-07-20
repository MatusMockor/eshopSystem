import './bootstrap';
import {createApp} from "vue";
import 'flowbite';
import CategoryForm from "../components/dashboard/CategoryForm.vue";
import ProductForm from "../components/dashboard/ProductForm.vue";
import CKEditor from '@ckeditor/ckeditor5-vue';
import FlashMessage from "../components/dashboard/FlashMessage.vue";
import PageForm from "../components/dashboard/PageForm.vue";
// import Alpine from 'alpinejs';

// window.Alpine = Alpine;
// Alpine.start();

const app = createApp({});

app.component('CategoryForm', CategoryForm);
app.component('ProductForm', ProductForm);
app.component('FlashMessage', FlashMessage);
app.component('PageForm', PageForm)

app.use(CKEditor);
app.mount('#app');
