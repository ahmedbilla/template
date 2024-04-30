<script setup>

</script>

<template>
    

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-light-text-primary  dark:text-dark-text-primary">
        <thead class="text-xs text-gray-700 uppercase bg-light-bg-secondary dark:bg-dark-bg-secondary dark:text-gray-400">
           <slot name="header"></slot>
        </thead>
        <tbody>
            <slot></slot>
        </tbody>
    </table>
</div>


</template>