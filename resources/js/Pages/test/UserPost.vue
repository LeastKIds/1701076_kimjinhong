<template>
    <app-layout>

        <Table :data="users.data"/>
        <pagination :pages="users" v-if="users" class="flex justify-center items-center" />

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



    },
    mounted() {
        console.log(this.users)
    }
}
</script>

<style scoped>

</style>
