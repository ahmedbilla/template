<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Table from '@/Components/Admin/Table/Table.vue';
import TableRow from '@/Components/Admin/Table/TableRow.vue';
import TableDataCell from '@/Components/Admin/Table/TableDataCell.vue';
import TableHeaderCell from  '@/Components/Admin/Table/TableHeaderCell.vue';
import CustomTitle from '@/Components/Admin/CustomTitle.vue';
import AddButton from '@/Components/Admin/Buttons/AddButton.vue';
import { Link, useForm } from '@inertiajs/vue3';
import Search from '@/Components/Admin/NavBar/Search.vue';
import Modal from '@/Components/Modal.vue';
import { ref } from 'vue';
import InputError from '@/Components/InputError.vue';
import CustomButton from '@/Components/Admin/Buttons/CustomButton.vue';
import { router } from '@inertiajs/vue3';
const props = defineProps({
    users:{
        type : Array
    }
})
const userModal  = ref(false)
const isDisable = ref(false)
const editIsOpen = ref(false)
const userToEdit = ref(null)
const deleteIsOpen = ref(false)
const userToDelete = ref(null)

const resetUserForm = () =>{
    userForm.name = ""
    userForm.email = ""
    userForm.password = ""
}
const openUserModal = () =>{
    resetUserForm()
    userModal.value = !userModal.value
}

//Form
const userForm = useForm({
    name: "",
    email : "",
    password : ""
})

const addUser = () => {
    router.post('users', userForm , {
        preserveScroll: true,
        preserveState: true,
        onProgress : page =>{
            isDisable.value = true
        },
        onSuccess: page => {
            userForm.name = ""
            userModal.value = false
            userForm.reset;
            //toast.value.show('This is a success message', 'success'); 
               }
    })
};

//Delete user :: 
const openDeleteModal = (user) => {
    userToDelete.value = user
    deleteIsOpen.value = !deleteIsOpen.value
}

const deleteUser = (userToDelete) =>{
    router.delete(`/users/${userToDelete.id}`,{
        preserveScroll: true,
        preserveState: true,
        onSuccess: page => {
            deleteIsOpen.value = null
        },
    })
}

// Edit user ::
const openEditModal = (user) => {
    if(user){
    userForm.name = user.name
    userForm.email = user.email
    userForm.password = user.password
    userToEdit.value = user
    userModal.value = !userModal.value
    editIsOpen.value = !editIsOpen.value
    }else{
    resetUserForm()
    userToEdit.value = null
    userModal.value = !userModal.value
    editIsOpen.value = !editIsOpen.value
    }
}

const edituser = (item) =>{
    if(userForm.name === ""){
        return false;
    }else{
        item.name = userForm.name
        item.email = userForm.email
        item.password = userForm.password
    item._method = 'PUT';
    router.post('/users/'+item.id, item, {
        preserveScroll: true,
        preserveState: true,
        onSuccess: page => {
            openEditModal(null)
        },
    });
    }
} 

</script>
<template>
    <AdminLayout>
        <CustomTitle>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
        <h1>{{ $t('users') }}</h1>
        </CustomTitle>

        <div class="bg-light-bg-secondary dark:bg-dark-bg-secondary p-3 rounded-xl text-light-text-primary dark:text-dark-text-primary">
            <div class="grid grid-cols-2 items-center">
                <div class="flex justify-start">
                    <Search/>
                </div>
                <div class="flex justify-end"><AddButton :handle-click="openUserModal
                ">{{ $t('addUser') }}</AddButton></div>
            </div>

            <div class="border-b-gray-300 border-b dark:border-b-gray-800 my-3"/>

        </div>

        <div class="my-6">
            <Table>
                <template #header>
                    <TableRow>
                        <TableHeaderCell><div class="flex justify-center items-center">{{ $t('id') }}</div></TableHeaderCell>
                        <TableHeaderCell><div class="flex justify-center items-center">{{ $t('name') }}</div></TableHeaderCell>
                        <TableHeaderCell><div class="flex justify-center items-center">{{ $t('email') }}</div></TableHeaderCell>
                        <TableHeaderCell><div class="flex justify-center items-center">{{ $t('action') }}</div></TableHeaderCell>
                    </TableRow>
                </template>
                <template #default>
                    <TableRow v-for="user in users.data" :key="user.id" class="border-b-gray-300 border-b dark:border-b-gray-800">
                        <TableDataCell><div class="flex justify-center items-center">{{ user.id }}</div></TableDataCell>
                        <TableDataCell><div class="flex justify-center items-center">{{ user.name }}</div></TableDataCell>
                        <TableDataCell><div class="flex justify-center items-center">{{ user.email }}</div></TableDataCell>
                        <TableDataCell>
                            <div class="flex justify-center items-center gap-x-2">
                                <div class="hover:text-green-600 cursor-pointer" @click="openEditModal(user)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg></div>
                                <div class="hover:text-red-600 cursor-pointer" @click="openDeleteModal(user)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg></div>
                            </div>
                        </TableDataCell>
                    </TableRow>
                </template>
            </Table>
        </div>

        <!--Add Modal-->
        <Modal :show="userModal" maxWidth="2xl">
                <div :dir="$i18n.locale === 'ar' ? 'rtl' : 'ltr'" class="p-4">  
                    <div class="grid grid-cols-2 ">
                        <p v-if="!editIsOpen">{{ $t('addUser') }}</p>
                        <p v-if="editIsOpen">Edit</p>
                        <div class="flex justify-end">
                            <button v-if="!editIsOpen" @click="openUserModal
                        "><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <button v-if="editIsOpen" @click="openEditModal(null)"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                        <div class="my-6">
                            <input type="text" v-model="userForm.name" name="name"
                                class="ring-0 border-none placeholder-[#64676B] focus:ring-0 w-full"
                                placeholder="name"/>
                            <hr/>
                            <InputError class="mt-2" :message="userForm.errors.name" />
                        </div>
                        
                        <div class="my-6">
                            <input type="email" v-model="userForm.email" name="name"
                                class="ring-0 border-none placeholder-[#64676B] focus:ring-0 w-full"
                                placeholder="email" />
                            <hr/>
                            <InputError class="mt-2" :message="userForm.errors.name" />
                        </div>

                        <div class="my-6">
                            <input type="password" v-model="userForm.password" name="name"
                                class="ring-0 border-none placeholder-[#64676B] focus:ring-0 w-full"
                                placeholder="password" />
                            <hr/>
                            <InputError class="mt-2" :message="userForm.errors.name" />
                        </div>


                        <div class="flex justify-end">
                            <CustomButton @click="addUser" buttonType="save" v-if="!editIsOpen">{{ $t("save") }}</CustomButton>
                            <CustomButton @click="edituser(userToEdit)" buttonType="save" v-if="editIsOpen">{{ $t("edit") }}</CustomButton>
                        </div>
                </div>
        </Modal>


         <!--Delete user-->
         <Modal :show="deleteIsOpen" maxWidth="2xl">
                <div :dir="$i18n.locale === 'ar' ? 'rtl' : 'ltr'" class="p-4">  
                    <div class="grid grid-cols-2 ">
                        <p>{{ $t('deleteUser') }}</p>
                        <div class="flex justify-end">
                            <button @click="openDeleteModal(null)"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="my-6">
                        <div class="flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-light-text-primary dark:text-dark-text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <p class="text-2xl text-light-text-primary dark:text-dark-text-primary text-center my-4">{{ $t('sureMessage') }}</p>
                    </div>

                    <div class="flex justify-end">
                            <CustomButton @click="deleteUser(userToDelete)" buttonType="cancle">{{ $t("delete") }}</CustomButton>
                        </div>
                </div>
        </Modal>

    </AdminLayout>
</template>