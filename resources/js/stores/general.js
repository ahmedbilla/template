import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useGeneralStore = defineStore('general', {
    state: () => ({
        messageToShow : null,
        storeName : null,
        storeLogo : null,
        address : null,
        email : null,
        phoneNumber : null,
        description : null,
        theme : 'light'
 
    }),

    actions : {
        changeTheme (){
            this.theme = this.theme === 'light' ? 'dark' : 'light';
        }
    },
    persist: true,

  
})