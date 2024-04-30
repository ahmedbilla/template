<script setup>
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3'
import { onMounted } from 'vue';
import { ref } from 'vue';
const props = defineProps({
    href: {
        type: String,
        required: true,
    }
});

const page = usePage()
const currentRoute = ref(null);
onMounted(() => {
    currentRoute.value = page.url
})
</script>

<template>
    <Link :href="href" :class="{ 'text-light-text-secondary dark:text-dark-text-secondary font-bold': currentRoute &&  currentRoute.includes(href) }" class="px-3 flex items-center gap-1 text-xl text-light-text-primary dark:text-dark-text-primary hover:text-light-text-secondary hover:font-bold dark:hover:text-dark-text-secondary "> 
        <slot/>
    </Link>
</template>