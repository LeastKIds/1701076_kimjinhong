<template>
    <div class="w-2/3 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">과목명</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">학점</th>
                </tr>
                </thead>

                <tbody>
                    <tr class="hover:bg-grey-lighter" v-for="(d, index) in data" :key="index" >
                        <td class="py-4 px-6 border-b border-grey-light" >{{ d.sub }}</td>
                        <td class="py-4 px-6 border-b border-grey-light" >{{ d.point }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Table",
    props : ['data'],
    methods : {
    }
}
</script>

<style scoped>

</style>
