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
    <ckeditor :editor="editor" v-model="body" :config="editorConfig" class="h-full"></ckeditor>
  </div>
</template>

<script>

import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
  name: "SubPageForm",
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
      body: this.page.body ?? '',
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
