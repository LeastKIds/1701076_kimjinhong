<template>
    <app-layout>
        <Table :data="subject.data"/>
        <pagination :pages="subject"/>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from "./Pagination";
import Table from './Table';

export default {
    name: "show",
    components: {
        AppLayout,
        Pagination,
        Table
    },
    data() {
        return {

        }
    },
    methods : {

    },
    props : ['subject'],
    mounted() {
        console.log(this.subject)
    }
}
</script>

<style scoped>

</style>
