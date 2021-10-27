<template>
    <app-layout>
        <div id="whoobe-3fery" class="w-full justify-center items-center bg-white shadow-lg rounded-lg flex flex-col">
            <div id="whoobe-1okdg" class="w-full p-4 justify-start flex flex-col">
                <h4 class="border-b-2 text-3xl" id="whoobe-3mr7n" >과목명 : {{ subject.sub }}</h4>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" >
                        학점
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" placeholder="Username"
                           readonly="readonly"
                           :value="subject.point"
                    >
                    <label class="block text-gray-700 text-sm font-bold mb-2" >
                        설명
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" placeholder="Username"
                           readonly="readonly"
                           :value="subject.explain"
                    >
                    <label class="block text-gray-700 text-sm font-bold mb-2" >
                        등록일
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" placeholder="Username"
                           readonly="readonly"
                           :value="subject.created_at"
                    >
                    <label class="block text-gray-700 text-sm font-bold mb-2" >
                        변경일
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" placeholder="Username"
                           readonly="readonly"
                           :value="subject.updated_at"
                    >
                </div>
                <button value="button" class="my-4 px-4 py-2 text-white hover:bg-blue-700 bg-blue-500" @click="editSub">수정</button>
                <button value="button" class="my-4 px-4 py-2 text-white hover:bg-blue-700 bg-blue-500" @click="deleteSub">삭제</button>
                <button value="button" class="my-4 px-4 py-2 text-white hover:bg-blue-700 bg-blue-500" @click="apply">{{this.check}}</button>
            </div>
        </div>
    </app-layout>

</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
    name: "showSub",
    props : ['subject'],
    methods : {
        deleteSub() {
            axios.delete('/showSubject/'+this.subject.id)
                .then(response => {
                    console.log(response);
                    alert('삭제되었습니다.')
                    location.href="/showSubject";
                }).catch(err => {
                    console.log(err);
            })
        },
        apply() {
            if(this.check==='수강신청') {
                axios.post('/showSubject/apply/'+this.subject.id)
                    .then(response => {
                        console.log(response)
                        if(response.data.success === 1)
                            this.check='수강취소'
                    }).catch(err => {
                    console.log(err);
                })
            } else {
                axios.post('/showSubject/disApply/'+this.subject.id)
                    .then(response => {
                        console.log(response)
                        if(response.data.success === 1)
                            this.check='수강신청'
                    }).catch(err => {
                    console.log(err);
                })
            }

        },
        editSub() {
            location.href="/showSubject/edit/"+this.subject.id;
        }
    },
    components: {
        AppLayout,
    },
    mounted(){
        console.log('/showSubject/check'+this.subject.id);
        axios.get('/showSubject/check/'+this.subject.id)
            .then(response => {
                console.log(response);
                if(response.data.check === 0)
                    this.check = '수강신청';
                else
                    this.check = '수강취소';
            }).catch(err => {
            console.log(err);
        })
    },
    data() {
        return {
            check : '',
        }
    }
}
</script>

<style scoped>

</style>
