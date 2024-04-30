<script setup>
import NavBarItem from '../NavBarItem.vue'
import Dropdown from '@/Components/Dropdown.vue';

</script>

<template>
    <Dropdown width="72">
                        <template #trigger>
                            <div>
                                <NavBarItem>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                    </svg>

                                </NavBarItem>
                            </div>
                        </template>

                        <template #content>
                            <div class="grid grid-cols-2 p-2 items-centers">
                                <p class="px-2 text-lg font-semibold">Notifications</p>
                                <div class="flex justify-end">
                                    <p class="text-violet-600 rounded-lg  font-semibold px-2">3 New</p>
                                </div>
                            </div>
                            <hr />
                            <div class="flex gap-2 p-2 py-4">
                                <div><img
                                        src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671142.jpg?w=826&t=st=1708343848~exp=1708344448~hmac=b3f01b51e67279e7d712cbf8ef636ace2ba81d4a0bdc4ff11a463fecae521fae"
                                        class="rounded-full w-11 h-11" />
                                </div>
                                <div>
                                    <div><span class="font-bold">Yassine</span> invite you to <span
                                            class="font-bold">Origin</span></div>
                                    <div class="text-sm text-gray-600">9h Ago</div>
                                </div>
                            </div>
                            <hr />
                            <div class="flex gap-2 p-2 py-4">
                                <div><img
                                        src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671116.jpg?w=826&t=st=1708355687~exp=1708356287~hmac=c5fd68a8e6785ff05b14dc07eaf39b21de3045cee4a315d7832a286efdbd174f"
                                        class="rounded-full w-11 h-11" />
                                </div>
                                <div>
                                    <div><span class="font-bold">Yassine</span> invite you to <span
                                            class="font-bold">Origin</span></div>
                                    <div class="text-sm text-gray-600">9h Ago</div>
                                </div>
                            </div>
                            <hr />
                            <div class="flex justify-center mt-1">
                                <button class="text-white px-8 py-2 rounded-lg  bg-violet-600 hover:bg-violet-500">
                                    Read All Notifications
                                </button>
                            </div>
                        </template>
                    </Dropdown>
</template>