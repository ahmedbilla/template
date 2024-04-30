<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import NavBarItem from '../NavBarItem.vue'
import { router } from "@inertiajs/vue3";

</script>
<script>
export default {
    setup() {
        return {
            responsiveSettingsLanguage: ref(false),
        };
    },
    methods: {
        setLocale(locale) {
            router.post("/api/locale", {
                language: locale,
            });
            this.$i18n.locale = locale;
            this.responsiveSettingsLanguage = false;
            localStorage.setItem("language", locale);
        },
    },
};
</script>


<template>
    <Dropdown width="48">
        <template #trigger>
            <div>
                <NavBarItem>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802" />
                    </svg>

                </NavBarItem>
            </div>

        </template>

        <template #content>
            <div class="">
                <div class="flex items-center gap-2 p-2 hover:bg-gray-200 hover:cursor-pointer" @click="setLocale('ar')">
                    <svg width="30px" height="30px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                        class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <circle cx="32" cy="32" r="30" fill="#f42f4c"></circle>
                            <path
                                d="M23.3 44l3.3-9.9l-8.6-6.2h10.7L32 18l3.3 9.9H46L37.3 34l3.3 9.9l-8.6-6l-8.7 6.1m10.5-7.4l2.7 1.9l-1-3.1l-1.7 1.2m-5.3-1.2l-1 3.1l2.7-1.9l-1.7-1.2m.7-2.1l2.8 2l2.8-2l-1.1-3.2h-3.5l-1 3.2m-4.5-3.2l2.7 1.9l.6-1.9h-3.3M36.6 32l2.7-1.9H36l.6 1.9M31 27.9h2l-1-3.1l-1 3.1"
                                fill="#4f682e"></path>
                        </g>
                    </svg><span class="font-bold">Arabic</span></div>
                <div class="flex items-center gap-2 p-2 hover:bg-gray-200 hover:cursor-pointer" @click="setLocale('fr')">
                    <svg width="30px" height="30px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                        class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M1.9 32c0 13.1 8.4 24.2 20 28.3V3.7C10.3 7.8 1.9 18.9 1.9 32z" fill="#428bc1"></path>
                            <path d="M61.9 32c0-13.1-8.3-24.2-20-28.3v56.6c11.7-4.1 20-15.2 20-28.3" fill="#ed4c5c"></path>
                            <path
                                d="M21.9 60.3c3.1 1.1 6.5 1.7 10 1.7s6.9-.6 10-1.7V3.7C38.8 2.6 35.5 2 31.9 2s-6.9.6-10 1.7v56.6"
                                fill="#ffffff"></path>
                        </g>
                    </svg><span class="font-bold">French</span></div>
                <div class="flex items-center gap-2 p-2 hover:bg-gray-200 hover:cursor-pointer" @click="setLocale('en')">
                    <svg width="30px" height="30px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                        class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M48 6.6C43.3 3.7 37.9 2 32 2v4.6h16z" fill="#ed4c5c"> </path>
                            <path d="M32 11.2h21.6C51.9 9.5 50 7.9 48 6.6H32v4.6z" fill="#ffffff"> </path>
                            <path d="M32 15.8h25.3c-1.1-1.7-2.3-3.2-3.6-4.6H32v4.6z" fill="#ed4c5c"> </path>
                            <path d="M32 20.4h27.7c-.7-1.6-1.5-3.2-2.4-4.6H32v4.6" fill="#ffffff"> </path>
                            <path d="M32 25h29.2c-.4-1.6-.9-3.1-1.5-4.6H32V25z" fill="#ed4c5c"> </path>
                            <path d="M32 29.7h29.9c-.1-1.6-.4-3.1-.7-4.6H32v4.6" fill="#ffffff"> </path>
                            <path d="M61.9 29.7H32V32H2c0 .8 0 1.5.1 2.3h59.8c.1-.8.1-1.5.1-2.3c0-.8 0-1.6-.1-2.3"
                                fill="#ed4c5c"> </path>
                            <path d="M2.8 38.9h58.4c.4-1.5.6-3 .7-4.6H2.1c.1 1.5.4 3.1.7 4.6" fill="#ffffff"> </path>
                            <path d="M4.3 43.5h55.4c.6-1.5 1.1-3 1.5-4.6H2.8c.4 1.6.9 3.1 1.5 4.6" fill="#ed4c5c"> </path>
                            <path d="M6.7 48.1h50.6c.9-1.5 1.7-3 2.4-4.6H4.3c.7 1.6 1.5 3.1 2.4 4.6" fill="#ffffff"> </path>
                            <path d="M10.3 52.7h43.4c1.3-1.4 2.6-3 3.6-4.6H6.7c1 1.7 2.3 3.2 3.6 4.6" fill="#ed4c5c">
                            </path>
                            <path d="M15.9 57.3h32.2c2.1-1.3 3.9-2.9 5.6-4.6H10.3c1.7 1.8 3.6 3.3 5.6 4.6" fill="#ffffff">
                            </path>
                            <path d="M32 62c5.9 0 11.4-1.7 16.1-4.7H15.9c4.7 3 10.2 4.7 16.1 4.7" fill="#ed4c5c"> </path>
                            <path
                                d="M16 6.6c-2.1 1.3-4 2.9-5.7 4.6c-1.4 1.4-2.6 3-3.6 4.6c-.9 1.5-1.8 3-2.4 4.6c-.6 1.5-1.1 3-1.5 4.6c-.4 1.5-.6 3-.7 4.6c-.1.8-.1 1.6-.1 2.4h30V2c-5.9 0-11.3 1.7-16 4.6"
                                fill="#428bc1"> </path>
                            <g fill="#ffffff">
                                <path d="M25 3l.5 1.5H27l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M29 9l.5 1.5H31l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M21 9l.5 1.5H23l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M25 15l.5 1.5H27l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M17 15l.5 1.5H19l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M9 15l.5 1.5H11l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M29 21l.5 1.5H31l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M21 21l.5 1.5H23l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M13 21l.5 1.5H15l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M25 27l.5 1.5H27l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M17 27l.5 1.5H19l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M9 27l.5 1.5H11l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                                </path>
                                <path d="M11.8 13l1.2-.9l1.2.9l-.5-1.5l1.2-1h-1.5L13 9l-.5 1.5h-1.4l1.2.9l-.5 1.6">
                                </path>
                                <path
                                    d="M3.8 25l1.2-.9l1.2.9l-.5-1.5l1.2-1H5.5L5 21l-.5 1.5h-1c0 .1-.1.2-.1.3l.8.6l-.4 1.6">
                                </path>
                            </g>
                        </g>
                    </svg><span class="font-bold">English</span></div>
            </div>
        </template>
    </Dropdown>
</template>