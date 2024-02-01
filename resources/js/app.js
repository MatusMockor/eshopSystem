import './bootstrap';
import {createApp} from "vue";
import 'flowbite';
import CategoryForm from "../components/dashboard/CategoryForm.vue";
import ProductForm from "../components/dashboard/ProductForm.vue";
import CKEditor from '@ckeditor/ckeditor5-vue';
import FlashMessage from "../components/dashboard/FlashMessage.vue";
import SubPageForm from "../components/dashboard/SubPageForm.vue";
// import Alpine from 'alpinejs';

// window.Alpine = Alpine;
// Alpine.start();

const app = createApp({});

app.component('CategoryForm', CategoryForm);
app.component('ProductForm', ProductForm);
app.component('FlashMessage', FlashMessage);
app.component('SubPageForm', SubPageForm)

app.use(CKEditor);
app.mount('#app');


var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

        // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }

});
