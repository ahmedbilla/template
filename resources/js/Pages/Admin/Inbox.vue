<script setup>
import CustomTitle from '@/Components/Admin/CustomTitle.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';

import { useGeneralStore } from '@/stores/general';
import { storeToRefs } from 'pinia';
import { onMounted } from 'vue';
const useGeneral = useGeneralStore()
const {messageToShow} = storeToRefs(useGeneral)

const setMessageToShow = (message)=>{
    if(messageToShow.value === null){
        messageToShow.value = message
    }else if(message.id === messageToShow.value.id){
        messageToShow.value = null
    }else{
        messageToShow.value = message
    }
}
onMounted(() => {
    messageToShow.value = null
})

//Messages for test : 
const messages = [
    {
        id: 1,
        sender: "Alice",
        content: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
        timestamp: new Date("2024-02-23T08:00:00")
    },
    {
        id: 2,
        sender: "Bob",
        content: "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.",
        timestamp: new Date("2024-02-23T08:15:00")
    },
    {
        id: 3,
        sender: "Alice",
        content: "I'm doing well, thanks! How about you?",
        timestamp: new Date("2024-02-23T08:30:00")
    },
    {
        id: 4,
        sender: "Bob",
        content: "I'm good too. Thanks for asking.",
        timestamp: new Date("2024-02-23T08:45:00")
    },
    {
        id: 5,
        sender: "Alice",
        content: "What have you been up to lately?",
        timestamp: new Date("2024-02-23T09:00:00")
    }
   
];


</script>

<template>
    <AdminLayout>
        <CustomTitle>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
            <h1>{{ $t("inbox") }}</h1>
        </CustomTitle>

        <div class="grid grid-cols-3">
            <div class="col-span-1">
                <div v-for="message in messages">
                    <div @click="setMessageToShow(message)"  class=" bg-light-bg-secondary dark:bg-dark-bg-secondary rounded-xl my-3 hover:cursor-pointer hover:bg-light-bg-primary dark:hover:bg-dark-bg-primary dark:text-dark-text-primary">
                        <div class="flex">
                            <div class="p-2"><img class="w-11 h-11 rounded-full bg-black" src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671116.jpg?w=826&t=st=1708681394~exp=1708681994~hmac=c04452bb226003457a10db285479ac94e3504577b0a665cebe16ab00e6d86a06"/></div>
                            <div class="px-2">
                                <p class="font-bold">{{ message.sender }}</p>
                                <p class="text-sm">{{ message.timestamp }}</p>
                            </div>
                            <div class="flex justify-end">...</div>
                        </div>
                        <p class="p-3">{{ message.content.substring(0, 100)+".."  }}</p>

                    </div>

                </div>
            </div>
            <div class="col-span-2">
                <div v-if="messageToShow === null">
                    <div class="flex justify-center items-center h-screen">
                        <p class="text-2xl text-gray-400 font-bold">Nothing to show</p>
                    </div>
                </div>
                <div v-else class="bg-light-bg-secondary dark:bg-dark-bg-secondary p-4 my-3 mx-10 rounded-2xl">
                    <div class="flex items-center gap-2 py-2">
                    <img class="w-11 h-11 rounded-full bg-black" src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671116.jpg?w=826&t=st=1708681394~exp=1708681994~hmac=c04452bb226003457a10db285479ac94e3504577b0a665cebe16ab00e6d86a06"/>
                    <p class="text-light-text-primary dark:text-dark-text-primary">{{ messageToShow.sender }}</p>
                    <p class="">...</p>
                    </div>
                    <hr class="my-2"/>
                    <p class="bg-light-bg-primary dark:bg-blue-400 p-2 rounded-br-2xl rounded-t-2xl text-black dark:text-white flex w-auto">{{ messageToShow.content }}</p>
                
                </div>
            </div>
        </div>
    </AdminLayout>
</template>