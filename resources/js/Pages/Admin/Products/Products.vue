<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import CustomTitle from '@/Components/Admin/CustomTitle.vue';
import AddButton from '@/Components/Admin/Buttons/AddButton.vue';
import Modal from '@/Components/Modal.vue'
import { ref } from 'vue';
import {Link} from '@inertiajs/vue3'
import Search from '@/Components/Admin/NavBar/Search.vue';
</script>

<template>
    <AdminLayout>
        <!--Modal-->

        <CustomTitle>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
        </svg>
        <h1>{{ $t("products") }}</h1>
        </CustomTitle>
        <div class="bg-light-bg-secondary dark:bg-dark-bg-secondary p-3 rounded-xl text-light-text-primary dark:text-dark-text-primary">
            <div class="grid grid-cols-2 items-center">
                <div class="flex justify-start">
                    <Search/>
                </div>
                <div class="flex justify-end"><AddButton><Link href="/addproduct">{{ $t("addproduct") }}</Link></AddButton></div>
            </div>

            <hr class="my-4" />

        </div>






      
            
        
     
    
    </AdminLayout>
</template>