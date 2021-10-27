<template>
    <div class="w-2/3 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">이름</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">title</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">content</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">좋아요</th>
                </tr>
                </thead>

                <tbody>
                    <tr class="hover:bg-grey-lighter" v-for="(d, index) in data" :key="index" >
                        <td class="py-4 px-6 border-b border-grey-light" @click="userPost(d.user_id)">{{ d.user.name }}</td>
                        <td class="py-4 px-6 border-b border-grey-light" @click="showPost(d.id)">{{ d.title }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            {{d.content}}</td>
                        <td class="py-4 px-6 border-b border-grey-light" v-if="d.like">하트</td>
                        <td class="py-4 px-6 border-b border-grey-light" v-if="!d.like">빈하트</td>
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
        showPost(id) {
            location.href="/test/post/show/"+id;
        },
        userPost(id) {
            location.href="/test/user/"+id;
        }
    }
}
</script>

<style scoped>

</style>
