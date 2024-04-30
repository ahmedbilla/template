<script setup>
import SettingsLayouts from '@/Layouts/SettingsLayouts.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import AddButton from '@/Components/Admin/Buttons/AddButton.vue';
import Search from '@/Components/Admin/NavBar/Search.vue';
import Modal from '@/Components/Modal.vue';
import CustomButton from '@/Components/Admin/Buttons/CustomButton.vue'
import { ref } from 'vue';
import AddEDoc from './AddEDoc.vue'
import ShowEDoc from './ShowEDoc.vue';

//Props Data : 
const props = defineProps({
    edocs: {
        type: Array,
        required: true
    }
})
 
</script>

<template>
    <AdminLayout>
    <SettingsLayouts>
        <div class="bg-light-bg-secondary dark:bg-dark-bg-secondary p-3 rounded-xl text-light-text-primary dark:text-dark-text-primary">
            <!--Show Edocs Templates-->
            <AddEDoc :edocs = "edocs" />
        </div>

        <ShowEDoc/>
    </SettingsLayouts>
    </AdminLayout>
</template>