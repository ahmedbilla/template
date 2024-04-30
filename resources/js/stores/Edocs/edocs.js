import { defineStore } from 'pinia'

export const useEdocsStore = defineStore('edocs', {
    state: () => ({
        //Add edoc states 
        modalIsOpen : false,
        preview : false,
        isDisable : false,
        isEdit : false,
        edocToEdit : null,

        //Show EDoc
        showModalIsOpen : false,
        edocToShow : null,
        theme : 'light'
 
    }),

    actions : {
        //Open Add || Edit Edoc Modal ::        
        showEDoc(edoc){
            if(this.showModalIsOpen) {
                this.edocToShow= null
                this.showModalIsOpen = false
            } else {
                this.edocToShow = edoc
                this.showModalIsOpen = true
            }
        },

    },
    persist: true,
})