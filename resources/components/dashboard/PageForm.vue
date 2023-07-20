<template>
  <div class="grid md:grid-cols-1 md:gap-6">
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
</template>

<script>

import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
  name: "PageForm",
  components: {
    ckeditor: CKEditor.component
  },
  props: {
    page: {
      type: Object,
      default: () => ({})
    },
  },
  data() {
    return {
      editor: ClassicEditor,
      name: this.page.name ?? '',
      description: this.page.description ?? '',
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
}
</script>
