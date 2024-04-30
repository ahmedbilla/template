<script setup>
import Dropdown from '@/Components/Dropdown.vue';

</script>

<template>
    <Dropdown width="64">
        <template #trigger>
            <div>
                <img src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671142.jpg?w=826&t=st=1708343848~exp=1708344448~hmac=b3f01b51e67279e7d712cbf8ef636ace2ba81d4a0bdc4ff11a463fecae521fae"
                    class="rounded-full w-11 h-11" />
            </div>
        </template>

        <template #content>
            <div class="flex p-2">
                <div class="px-1"><img
                        src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671142.jpg?w=826&t=st=1708343848~exp=1708344448~hmac=b3f01b51e67279e7d712cbf8ef636ace2ba81d4a0bdc4ff11a463fecae521fae"
                        class=" rounded-xl w-14 h-14" /></div>
                <div class="gris justify-start">
                    <p class="text-sm font-bold">Jhon Doe</p>
                    <p class="text-gray-600 text-sm">jhon.doe@gmail.com</p>
                </div>
                <div>
                    <p class="bg-green-50 font-bold text-sm text-green-600 px-2 rounded-xl">Pro</p>
                </div>
            </div>

            <div class="mt-2">
                <div class="flex items-center text-black hover:text-blue-600 hover:bg-blue-50 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span class="ml-1">Profile</span>
                </div>
                <div class="flex items-center text-black hover:text-blue-600 hover:bg-blue-50 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                    </svg>
                    <span class="ml-1">Inbox</span>
                </div>
                <hr />
                <div class="flex items-center text-red-400 hover:text-red-700 hover:bg-red-50 p-2 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
                    <span class="ml-1">Logout</span>
                </div>
            </div>
        </template>
    </Dropdown>
</template>