<script setup>
import Search from '@/Components/Admin/NavBar/Search.vue';
import AddButton from '@/Components/Admin/Buttons/AddButton.vue';
import Modal from '@/Components/Modal.vue';
import CustomButton from '@/Components/Admin/Buttons/CustomButton.vue'
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import { QuillEditor } from '@vueup/vue-quill'
import { onMounted, ref } from 'vue';
import BlotFormatter from 'quill-blot-formatter'
import { useEdocsStore} from '@/stores/Edocs/edocs';
import { storeToRefs } from 'pinia'
import Toast from '@/Components/Admin/Toast.vue';

const useEdocsStates = useEdocsStore()
const { modalIsOpen, preview , isDisable , edocToEdit , isEdit , showModalIsOpen, edocToShow} = storeToRefs(useEdocsStates)

const props = defineProps({
    edocs: {
        type: Array,
        required: true
    }
})


const titleError = ref()
const headerError = ref()
const footerError = ref()

const footerEditor = ref()
const headerEditor = ref()
const contentEditor = ref()
const toast = ref()

const eDoc = useForm({
    title : null , 
    header  : null ,
    footer : null,
    content : null
})

//Modules For text editor
const modules = {
      name: 'blotFormatter',  
      module: BlotFormatter, 
      options: {/* options */}
}
        
const checkPreview = ()=>{
    preview.value = true
    eDoc.header  =  headerEditor.value.getHTML()
    eDoc.content = contentEditor.value.getHTML()
    eDoc.footer = footerEditor.value.getHTML()
}

//Reset Form :
const resetForm = ()=>{
        eDoc.title = null;
        eDoc.header = null;
        eDoc.content = null;
        eDoc.footer = null;
}

const openModal = () =>{
    resetForm()
    if (modalIsOpen.value) {
                modalIsOpen.value = false
                preview.value = false
            } else {
                modalIsOpen.value = true
            }
}

//Add Edoc
const addEDocTemplate = ()=>{
    eDoc.header = headerEditor.value.getHTML()
    eDoc.content = contentEditor.value.getHTML()
    eDoc.footer = footerEditor.value.getHTML()
    if(eDoc.title === null){
        titleError.value = true
        return
    }else if(eDoc.header.toString() === "<p><br></p>"){
        headerError.value = true
        return
    }else if(eDoc.footer.toString() === "<p><br></p>"){
        footerError.value = true
        return
    }else{
        router.post('/settings/edocs', eDoc , {
        preserveScroll: true,
        preserveState: true,
        onProgress : page =>{
            isDisable.value = true
        },
        onSuccess: page => {
            resetForm()
            eDoc.reset;
            modalIsOpen.value = false
            toast.value.show('This is a success message', 'success'); 
               }
    })

    }
    }
//Edit:
   const openEditModal = (edoc) => {
            headerEditor.setHTML(edoc.header)
        if (modalIsOpen.value) {
                modalIsOpen.value = false
                preview.value = false
            } else {
                preview.value = true
                isEdit.value = true
                modalIsOpen.value = true
            }
    }

    const editEdoc = ()=>{
    eDoc.header = headerEditor.value.getHTML()
    eDoc.content = contentEditor.value.getHTML()
    eDoc.footer = footerEditor.value.getHTML()
    if(eDoc.title === null){
        titleError.value = true
        return
    }else if(eDoc.header.toString() === "<p><br></p>"){
        headerError.value = true
        return
    }else if(eDoc.footer.toString() === "<p><br></p>"){
        footerError.value = true
        return
    }else{
        pack._method = 'PUT';
        router.post('/settings/edocs/'+packToEDitID, pack , {
        preserveScroll: true,
        preserveState: true,
        onProgress : page =>{
            //isDisable.value = true
        },
        onSuccess: page => {
        //closeEdPackModal();
        //items.value = props.projectsWithPackages;

        }
    });
    }
}
   
</script>

<template>
        <div class="grid grid-cols-2 items-center">
            <div class="flex justify-start">
                <Search/>
            </div>
            <div class="flex justify-end"><AddButton :handleClick="openModal">{{ $t("addTemplate") }}</AddButton></div>
        </div>
            <hr class="my-4" />

            <div class="py-36" v-if="edocs.length ===0">
                <p class="text-2xl text-light-text-primary dark:text-dark-text-primary font-bold text-center">Nothing to show</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3">
                <div v-for="edoc of edocs" class="bg-dark-text-secondary rounded-xl">
                <div class="flex justify-center items-center pt-2 gap-x-2">
                    
                <div @click.prevent="useEdocsStates.showEDoc(edoc)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white hover:text-yellow-600 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>

                <div @click="openEditModal(edoc)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white hover:text-green-600 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </div>

                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white hover:text-red-600 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </div>

                </div>
                <p class="py-6 px-4  text-white text-2xl flex justify-center items-center">{{ edoc.title }}</p>
                </div>
            </div>


            <!--Add edit edoc Templates-->
            <Modal :show="modalIsOpen" maxWidth="2xl">
                <div :dir="$i18n.locale === 'ar' ? 'rtl' : 'ltr'" class="p-4">

                    <div class="grid grid-cols-2 ">
                        <p>{{ $t("edocs") }}</p>
                        <div class="flex justify-end">
                            <button @click="openModal"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                            

                    <div class="grid" :class="{'xl:grid-cols-3' : preview}">
                        <div class="col-span-2 gap-y-5 px-4">

                        <div class="mb-12">
                            <input type="text" v-model="eDoc.title" 
                                class="ring-0 border-none placeholder-[#64676B] focus:ring-0 w-full"
                                :placeholder='$t("title")' />
                            <hr/>
                            <div v-if="titleError" class="text-red-600">{{ $t("titleError") }}</div>
                        </div>


                            <div class="mb-12">
                                <p>Header</p>
                                <QuillEditor theme="snow"  toolbar="full" :modules="modules"  ref="headerEditor"  @editor-change="checkPreview" />
                            </div>

                            <div class="mb-12">
                                <p>Content</p>
                                <QuillEditor theme="snow" toolbar="full" :modules="modules" ref="contentEditor" @editor-change="checkPreview" />
                            </div>

                            <div class="mb-12">
                                <p>Footer</p>
                                <QuillEditor theme="snow" toolbar="full" :modules="modules" ref="footerEditor" @editor-change="checkPreview" />
                            </div>

                        </div>


                        <div v-if="preview" class="mb-3">
                            <p class="text-xl font-bold py-2 text-gray-600">{{ $t("preview") }}</p>
                            <p>{{ eDoc.title }}</p>
                            <div class="border-dashed border-2 border-gray-500 p-2 rounded-xl" >
                                <div v-html="eDoc.header"></div>
                                <div v-html="eDoc.content"></div>
                                <div v-html="eDoc.footer"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end gap-x-2">
                    <CustomButton  :handleClick="openModal" buttonType="cancle">{{ $t("cancle") }}</CustomButton>
                    <CustomButton v-if="preview && !isEdit"  :disabled="isDisable" :class="{'text-white hover:text-white bg-gray-400 border border-gray-400 cursor-no-drop hover:bg-gray-400 ':isDisable}" :handleClick="addEDocTemplate" buttonType="save">{{ $t("save") }}</CustomButton>
                    <CustomButton v-if="preview && isEdit"  :disabled="isDisable" :class="{'text-white hover:text-white bg-gray-400 border border-gray-400 cursor-no-drop hover:bg-gray-400 ':isDisable}" :handleClick="addEDocTemplate" buttonType="save">{{ $t("edit") }}</CustomButton>
                    </div>
                </div>
            </Modal>

        <Toast ref="toast"/>


</template>