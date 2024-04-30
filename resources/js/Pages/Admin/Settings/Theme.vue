<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import SettingsLayouts from '@/Layouts/SettingsLayouts.vue';



</script>

<template>
    <AdminLayout>
    <SettingsLayouts>
    <p>Hello Theme</p>
    <button @click="changeTheme">TEO</button>    
    </SettingsLayouts>
    </AdminLayout>
</template>