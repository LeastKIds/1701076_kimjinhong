<template>
    <app-layout>
        <Table :data="course.data"/>
        <pagination :pages="course"/>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from "./Pagination";
import Table from './Table';

export default {
    name: "MySubject",
    components: {
        AppLayout,
        Pagination,
        Table,

    },
    data() {
        return {

        }
    },
    methods : {

    },
    props: ['course'],
    mounted() {
        console.log(this.course)
    }

}
</script>

<style scoped>

</style>
