<template>
    <app-layout>
        <div class="flex">
            <span class="text-sm border border-2 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap"
                @click="search"
            >검색</span>
            <input name="field_name"
                   class="border border-2 rounded-r px-4 py-2 w-full" type="text"
                   placeholder="Write something here..."
                    v-model="this.word"
                   @keyup.enter="search"
            />
        </div>
        <Table :data="users.data"/>
        <pagination :pages="users" v-if="users" class="flex justify-center items-center" :previous="test"/>
        <div class="text-center">
            <button class="p-2 pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300"
                @click="createPost"
            >새 글</button>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from "./Pagination";
import Table from './Table';

export default {
    name: "test",
    components: {
        AppLayout,
        Pagination,
        Table,
    },
    props : ['users'],
    data() {
        return {
            word : '',
        }
    },
    methods : {
        search() {
            console.log(this.word);
            if(this.word === '')
                location.href="http://localhost:8000/test"
            else
                location.href="http://localhost:8000/test/search/"+this.word;
        },
        createPost() {
            location.href='/test/post/create'
        },
        test(page) {
            axios.get(previous)
                .then(response => {
                    console.log(response);
                }).catch(err => {
                    console.log(err);
            })
        }


    },
    mounted() {
        console.log(this.users)
    }
}
</script>

<style scoped>

</style>
