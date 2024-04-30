<script setup>
import EditButton from '@/Components/Admin/Buttons/EditButton.vue';
import Modal from '@/Components/Modal.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import SettingsLayouts from '@/Layouts/SettingsLayouts.vue';
import { ref } from 'vue';
import 'vue-advanced-cropper/dist/style.css';
import Toast from '@/Components/Admin/Toast.vue';
import { Cropper, RectangleStencil } from 'vue-advanced-cropper'
import { useGeneralStore } from '@/stores/general';
import { storeToRefs } from 'pinia';
import CustomButton from '@/Components/Admin/Buttons/CustomButton.vue';
import { router } from '@inertiajs/vue3';
const useGeneral = useGeneralStore()
const { storeName, storeLogo , address , email , phoneNumber , description} = storeToRefs(useGeneral)

const props = defineProps({
    settings: {
        type: Array,
        required: true
    }
})

const storeNameEdit = ref("")
const addressEdit = ref("")
const emailEdit = ref("")
const phoneNumberEdit = ref("")
const descriptionEdit = ref("")
let uploadedImage = ref(null)

storeNameEdit.value = storeName.value
addressEdit.value = address.value
emailEdit.value = email.value
phoneNumberEdit.value = phoneNumber.value
descriptionEdit.value = description.value
uploadedImage.value = storeLogo.value
const editIsOpen = ref(false)
const toast = ref()


const openEdit = () => {
        editIsOpen.value = !editIsOpen.value
}


let cropper = ref(null)
let croppedImageData = {
    file: null,
    imageUrl: null,
    height: null,
    width: null,
    left: null,
    top: null,
}
const getUploadedImage = (e) => {
    const file = e.target.files[0]
    uploadedImage.value = URL.createObjectURL(file)
}
const crop = () => {
    const { canvas } = cropper.value.getResult()
    croppedImageData.imageUrl = canvas.toDataURL()
    uploadedImage.value = croppedImageData.imageUrl
}


</script>

<template>
    <AdminLayout>
        <SettingsLayouts>

            <div class="flex items-center gap-2 py-4">
                <img class="rounded-full  w-28 h-28 p-2" :src="storeLogo" />
                <p class="text-2xl font-bold text-light-text-primary dark:text-dark-text-primary ">{{ storeName }}</p>
            </div>
            <div class="grid gap-y-3">
                    <p class="text-xl text-gray-600 font-bold">{{ $t("address") }} : <span class="font-normal">{{ address }}</span></p>
                    <hr class="w-full p-2 lg:w-[700px]" />
                    <p class="text-xl text-gray-600 font-bold">{{ $t("email") }} : <span class="font-normal">{{ email }}</span></p>
                    <hr class="w-full p-2 lg:w-[700px]" />
                    <p class="text-xl text-gray-600 font-bold">{{ $t("phoneNumber") }} : <span class="font-normal">{{ phoneNumber }}</span></p>
                    <hr class="w-full p-2 lg:w-[700px]" />
                    <p class="text-xl text-gray-600 font-bold">Description : </p>
                    <p class="font-normal text-xl text-gray-600 lg:w-[700px] ">{{ description }}</p>
                    <hr class="w-full p-2 lg:w-[700px]" />

            </div>
   
            <div class="flex justify-end my-2">
                <EditButton :handleClick="openEdit">{{ $t("edit") }}</EditButton>
            </div>
            <Modal :show="editIsOpen">
                <div :dir="$i18n.locale === 'ar' ? 'rtl' : 'ltr'" class="p-4">
                    <div class="grid grid-cols-2 ">
                        <p>{{ $t("general") }}</p>
                        <div class="flex justify-end">
                            <button @click="openEdit"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="grid py-6 gap-y-3">
                        <div>
                            <input type="text" v-model="storeNameEdit"
                                class="ring-0 border-none placeholder-[#64676B] focus:ring-0 w-full"
                                :placeholder='$t("storeName")' />
                            <hr/>
                        </div>

                        <div>
                            <input type="text" v-model="addressEdit"
                                class="ring-0 border-none placeholder-[#64676B] focus:ring-0  w-full"
                                :placeholder='$t("address")' />
                            <hr/>
                        </div>

                        <div>
                            <input type="email" v-model="emailEdit"
                                class="ring-0 border-none placeholder-[#64676B] focus:ring-0  w-full"
                                :placeholder='$t("email")' />
                            <hr/>
                        </div>

                        <div>
                            <input type="text" v-model="phoneNumberEdit"
                                class="ring-0 border-none placeholder-[#64676B] focus:ring-0  w-full"
                                :placeholder='$t("phoneNumber")' />
                            <hr/>
                        </div>

                        <textarea rows="6" v-model="descriptionEdit" class="p-3 border-1 border-[#64676B] focus:ring-0 ring-0 "/>



                        <input type="file" id="image" ref="fileInput" @change="getUploadedImage">
                        <div class="w-[350px] mx-auto">
                            <Cropper class="object-cover" ref="cropper" :stencil-component="RectangleStencil"
                                :src="uploadedImage" />
                        </div>

                    </div>
                    <div class="flex justify-end">
                    <CustomButton   :handleClick="editClicked" buttonType="save">{{ $t("save") }}</CustomButton>
                    </div>
                </div>
            </Modal>
            <Toast ref="toast"/>


        </SettingsLayouts>
    </AdminLayout>
</template>