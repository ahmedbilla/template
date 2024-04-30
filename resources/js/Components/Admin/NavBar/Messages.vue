<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import NavBarItem from '../NavBarItem.vue'
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Dropdown width="72">
        <template #trigger>
            <div>
                <NavBarItem>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>

                </NavBarItem>
            </div>
        </template>

        <template #content>
            <div>
                <p class="px-4 py-2 text-lg font-semibold">Messages</p>
            </div>
            <hr />
            <div class="px-6">
                <p class="font-bold py-2">Messages Here</p>
            </div>

            <hr />
            <Link href="#" class="flex items-center justify-center text-blue-500 hover:underline hover:gap-2 py-4">
            <p>View All Activities</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
            </Link>
        </template>
    </Dropdown>
</template>