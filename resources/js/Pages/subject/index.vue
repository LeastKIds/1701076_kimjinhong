<template>
    <app-layout>
        <div class="mb-3 pt-0" style="max-width: 400px;">
            <input type="text" placeholder="과목명"
                   class="px-3 py-3 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full"
                   v-model="sub"
            />
            <input type="text" placeholder="학점"
                   class="px-3 py-3 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full"
                   v-model="point"
            />
        </div>

        <label class="block text-left" style="max-width: 400px;">
            <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="과목설명" v-model="explain"></textarea>
        </label>

        <button class="p-2 pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300"
                @click="createSub"
        >등록</button>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
    name: "index",
    components: {
        AppLayout,
    },
    data() {
        return {
            sub : '',
            point : '',
            explain : '',
        }
    },
    methods : {
        createSub() {
            const data = {sub : this.sub, point : this.point, explain : this.explain}
            axios.post('/test', data)
                .then(response => {
                    console.log(response);
                    alert('등록이 되었습니다.')
                    location.href="/showSubject";
                }).catch(err => {
                    console.log(err);
            })
        }
    }
}
</script>

<style scoped>

</style>
