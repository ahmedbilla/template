<script setup>

</script>

<template>
    <!--Search-->
    <div
        class="hidden md:flex items-center bg-[#EFF2F5] dark:bg-dark-icons-primary text-[#64676B] w-72 rounded-xl h-[40px] px-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
        <input class="
                        md:block
                        hidden
                        border-none
                        dark:bg-dark-icons-primary
                        bg-[#EFF2F5]
                        placeholder-[#64676B]
                        ring-0
                        focus:ring-0
                    " :placeholder='$t("search")' type="text">

    </div>
</template>