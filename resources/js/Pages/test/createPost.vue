<template>
    <app-layout>
        <div class="mb-3 pt-0" style="max-width: 400px;">
            <input type="text" placeholder="제목"
                   class="px-3 py-3 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full"
                v-model="title"
            />
        </div>
        <label class="block text-left" style="max-width: 400px;">
            <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="내용" v-model="content"></textarea>
        </label>

        <form @submit.prevent="submit">
            <input type="file" id="img" accept="image/*"/>
            <button class="p-2 pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300"
                   type="submit"
            >첨부</button>
        </form>
    </app-layout>

</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
    name: "textEdit",
    components: {
        AppLayout,
    },
    methods : {
        submit() {
            const data = new FormData();
            const photoFile = document.getElementById("img");
            data.append('imgFile', photoFile.files[0]);
            data.append('title', this.title);
            data.append('content', this.content);
            const headers = {
                'Content-Type' : 'multipart/form-data'
            };

            axios.post('/test/post/store', data, headers)
                .then(response => {
                    console.log(response);
                    if(response.data.success === 1) {
                        location.href="/test";
                    }
                }).catch(err => {
                console.log(err);
            })
        },
    },
    data() {
        return {
            title : '',
            content : '',
        }
    }
}
</script>

<style scoped>

</style>
