<script setup>

const props = defineProps({
    number: {
        type: Number,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },


});
</script>

<template>
    <div class="bg-light-bg-secondary dark:bg-dark-bg-secondary rounded-xl py-3 shdow-lg hover:cursor-pointer">
        <div class="grid grid-cols-2">
            <div class="p-4">
                <p class="font-bold text-lg text-gray-500 dark:text-dark-text-primary">{{ title }}</p>
                <p class="text-2xl text-light-text-primary dark:text-dark-text-primary">{{ number }}</p>
            </div>

            <div class="flex justify-center items-center">
                <slot/>
            </div>
        </div>
    </div>
</template>