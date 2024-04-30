<template>
  <div v-if="visible" class="fixed bottom-11 flex justify-center transform left-1/2 -translate-x-1/2 px-6 py-3 rounded-xl z-50"
  :class="{'bg-green-300  shadow-lg shadow-green-300/50': type === 'success', 'bg-red-500 text-white shadow-lg shadow-red-500/50': type== 'error'}"
  >
    <p>{{ message }}</p>
    <button @click="dismiss" class="ml-2 px-3 py-1 bg-transparent border-2 border-white rounded cursor-pointer">Dismiss</button>

  </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        visible: false,
        message: '',
        type: '' // warning, success, error
      };
    },
    methods: {
      show(message, type) {
        this.message = message;
        this.type = type;
        this.visible = true;
        setTimeout(() => {
          this.dismiss();
        }, 3000); // Automatically dismiss after 3 seconds
      },
      
      dismiss() {
        this.visible = false;
        this.message = '';
        this.type = '';
      }
    }
  };
  </script>

  <!--usage ::

const toast = ref()
function showWarningToast() {
      toast.value.show('This is a warning message', 'warning');
    }
    function showSuccessToast() {
      toast.value.show('This is a success message', 'success');
    }
    function showErrorToast() {
      toast.value.show('This is an error message', 'error');
    }

        <Toast ref="toast"/>

     <button @click="showWarningToast">Show Warning Toast</button>
    <button @click="showSuccessToast">Show Success Toast</button>
    <button @click="showErrorToast">Show Error Toast</button>

-->