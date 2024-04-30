<script setup>
import Modal from '@/Components/Modal.vue';
import { useEdocsStore} from '@/stores/Edocs/edocs';
import { storeToRefs } from 'pinia'
const useEdocsStates = useEdocsStore()
const { showModalIsOpen, edocToShow} = storeToRefs(useEdocsStates)

</script>

<template>

            <Modal :show="showModalIsOpen">
                <div :dir="$i18n.locale === 'ar' ? 'rtl' : 'ltr'" class="p-4">
                    <div class="grid grid-cols-2 ">
                        <p>{{ edocToShow.title  }}</p>
                        <div class="flex justify-end">
                            <button @click="useEdocsStates.showEDoc(edoc)"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <p class="text-xl text-center text-gray-600 my-3">{{ edocToShow.title }}</p>
                    <div class="border-dashed border-2 border-gray-500 rounded-2xl p-4">
                        <div v-html="edocToShow.header"></div>
                        <div v-html="edocToShow.content"></div>
                        <div v-html="edocToShow.footer"></div>
                    </div>
                </div>
                    
            </Modal>



</template>