<template>
    <app-layout>
        <div class="mb-3 pt-0" style="max-width: 400px;">
            <input type="text" placeholder="과목명"
                   class="px-3 py-3 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full"
                    v-model="this.sub.sub"
            />
            <input type="text" placeholder="학점"
                   class="px-3 py-3 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full"
                    v-model="this.sub.point"
            />
        </div>

        <label class="block text-left" style="max-width: 400px;">
            <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="과목설명"  v-model="this.sub.explain"></textarea>
        </label>

        <button class="p-2 pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300"
            @click="updateSub"
        >수정</button>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
    name: "EditSub",
    components: {
        AppLayout,
    },
    props : ['subject'],
    mounted (){
        this.sub = this.subject;
        console.log(this.sub);
    },
    data() {
        return {
            sub : '',
        }
    },
    methods : {
        updateSub(){
            const data = {sub : this.sub.sub, point : this.sub.point, explain : this.sub.explain}
            axios.patch('/showSubject/update/'+this.sub.id, data)
                .then(response => {
                    console.log(response);
                    if(response.data.success === 1) {
                        alert('수정 완료');
                        location.href="/showSubject/"+this.sub.id;

                    }
                }).catch(err => {
                    console.log(err);
            })
        }
    }
}
</script>

<style scoped>

</style>
