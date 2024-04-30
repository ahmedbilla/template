<script setup>
const props = defineProps({

    buttonType : {
        type : String,
        required : true,
    }
});

</script>

<template>

<div>
  <button class="text-white px-4 py-2 border-none rounded-xl font-bold" :class="{'bg-green-500 shadow-lg shadow-green-500/50': buttonType === 'save', 'bg-red-500 shadow-lg shadow-red-500/50': buttonType== 'cancle'}">
    <slot/>
  </button>
</div>
</template>