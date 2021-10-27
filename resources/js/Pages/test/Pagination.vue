<template>
    <div class="flex items-center space-x-1">
        <a @click="this.$emit('previous',pages.prev_page_url)"
           class="flex items-center px-4 py-2 text-gray-500 bg-gray-300 rounded-md"
            v-if="pages.prev_page_url"
        >
            Previous
        </a>

        <a @click="select(page)"
           class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white"
            v-for="page in pages.last_page" :key="page"
        >
            {{ page }}
        </a>
        <a :href="pages.next_page_url"
           class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white"
            v-if="pages.next_page_url"
        >
            Next
        </a>
    </div>
</template>

<script>
export default {
    name: "Pagination",
    props : ['pages'],
    methods : {
        select(page) {
            location.href=this.pages.path+"?page=" + page;
        }
    }
}
</script>

<style scoped>

</style>
