<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3'
import { onMounted } from 'vue';
import { ref } from 'vue';
const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    
});
const page = usePage()
const currentRoute = ref(null);
onMounted(() => {
    currentRoute.value = page.url
})

</script>

<template>
     <Link :href="href" :class="{ 'text-light-text-secondary dark:text-dark-text-secondary  bg-light-icons-secondary dark:bg-dark-icons-secondary  font-bold group': currentRoute &&  currentRoute.includes(href) }" class="flex gap-2 rounded-xl my-1 items-center p-2 pl-4 text-light-text-primary dark:text-dark-text-primary hover:text-light-text-secondary dark:hover:text-dark-text-secondary  hover:bg-light-icons-secondary dark:hover:bg-dark-icons-secondary  hover:font-bold group" >
        <slot />
    </Link>
</template>

<style>
.active{
    color: blue;
}
</style>