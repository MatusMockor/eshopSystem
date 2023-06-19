<template>
    <div class="grid md:grid-cols-3 md:gap-6">
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="name" id="name"
                   v-model="name"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required/>
            <label for="name"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Name
            </label>
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <input type="number" name="price" id="price"
                   v-model="price"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required/>
            <label for="price"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Price
            </label>
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <input type="number" name="quantity" id="quantity"
                   v-model="quantity"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required/>
            <label for="quantity"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Price
            </label>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-6 group">
            <label for="statuses" class="sr-only">Select status</label>
            <select id="statuses"
                    v-model="productStatus"
                    name="status"
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                    required>
                <option v-for="status in statuses" :value="status" :key="status" :selected="status === productStatus">
                    {{ status }}
                </option>
            </select>
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <label for="statuses" class="sr-only">Select category</label>
            <select id="statuses"
                    v-model="categoryId"
                    name="category_id"
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option v-for="category in categories" :value="category.id" :key="category.id"
                        :selected="category === categoryId">
                    {{ category.name }}
                </option>
                <option @click="unsetCategory"
                        :selected="categoryId === ''"
                >
                    Without category
                </option>
            </select>
        </div>
    </div>
    <div class="w-full mb-10 group mt-10">
        <ckeditor :editor="editor" v-model="description" :config="editorConfig" class="h-full"></ckeditor>
    </div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">
        Upload multiple files
    </label>
    <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        id="multiple_files" name="images[]" type="file" accept="image/png, image/jpeg, image/jpg" multiple/>
    <button type="submit"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-10">
        Save
    </button>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-10">
        <div v-for="image in images">
            <img class="h-auto max-w-full rounded-lg"
                 :src="image.image_path" :alt="image.image_name">
        </div>
    </div>
</template>

<script>

import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
    name: "ProductForm",
    components: {
        ckeditor: CKEditor.component
    },
    props: {
        product: {
            type: Object,
            default: () => ({})
        },
        images: {
            type: Array,
            default: () => ([])
        },
        statuses: {
            type: Array,
            default: () => ([])
        },
        categories: {
            type: Object,
            default: () => ({})
        }
    },
    data() {
        return {
            editor: ClassicEditor,
            description: this.product.description ?? '',
            name: this.product.name ?? '',
            price: this.product.price ?? 0,
            quantity: this.product.quantity ?? 0,
            productStatus: this.product.status ?? '',
            categoryId: this.product.category_id ?? '',
            editorConfig: {
                toolbar: [
                    'bold', 'italic',
                    '|', 'numberedList',
                    '|', 'undo', 'redo',
                    '|', 'bulletedList'
                ]
            },
        }
    },
    methods: {
        unsetCategory() {
            this.categoryId = '';
        }
    }
}
</script>
