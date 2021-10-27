<template>
    <app-layout>
        <div id="whoobe-3fery" class="w-full justify-center items-center bg-white shadow-lg rounded-lg flex flex-col">
            <div id="whoobe-1okdg" class="w-full p-4 justify-start flex flex-col">
                <h4 class="border-b-2 text-3xl" id="whoobe-3mr7n" >{{ post.title }}</h4>
                <p class="my-4" id="whoobe-950fw">{{ post.content }}</p>

                <div class=" rounded overflow-hidden border w-full lg:w-2/12 md:w-2/12 bg-white mx-3 md:mx-0 lg:mx-0" v-if="post.img">
                    <img class="w-full bg-cover" :src="imgPath" width="50%"/>
                </div>

                <button value="button" class="my-4 px-4 py-2 text-white hover:bg-blue-700 bg-blue-500"
                        v-if="post.user_id !=$page.props.user.id"
                        @click="likeButton">{{this.like}}</button>
                <button value="button" class="my-4 px-4 py-2 text-white hover:bg-blue-700 bg-blue-500"
                        @click="editPost" v-if="$page.props.user.id == this.post.user_id">수정</button>
                <button value="button" class="my-4 px-4 py-2 text-white hover:bg-blue-700 bg-blue-500"
                        @click="deletePost" v-if="$page.props.user.id == this.post.user_id">삭제</button>

                <button value="button" class="my-4 px-4 py-2 text-white hover:bg-blue-700 bg-blue-500" @click="menu">목록</button>
                <comment :post="this.post"/>
        </div>
        </div>
    </app-layout>

</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Comment from './Comment.vue';
export default {
    name: "textEdit",
    components: {
        AppLayout,
        Comment,
    },
    props : ['post'],
    methods : {
        deletePost() {
            axios.delete('http://localhost:8000/test/post/delete/'+this.post.id)
                .then(response => {
                    console.log(response.data);
                    location.href='/test'
                }).catch(err => {
                    console.log(err);
            })
        },
        menu() {
            // location.href='http://localhost:8000/test'
            window.history.back()
        },
        editPost() {
            location.href='http://localhost:8000/test/post/edit/'+this.post.id;
        },
        likeButton() {
            if(this.like === '♥') {
                axios.delete('/test/disLike/'+this.post.id)
                    .then(response => {
                        console.log(response.data.success)
                        if(response.data.success === 1)
                            this.like = '♡';
                        console.log(this.like);
                    }).catch(err => {
                        console.log(err);
                })
            }else {
                axios.post('/test/like/' + this.post.id)
                    .then(response => {
                        console.log(response);
                        if(response.data.success === 1)
                            this.like = '♥';
                        console.log(this.like);
                    }).catch(err => {
                        console.log(err);
                })
            }
        }
    },
    mounted() {
        console.log(this.post)
        this.imgPath = 'http://localhost:8000/storage/img/' + this.post.img;
        if(this.post.like)
            this.like = '♥';
        else
            this.like = '♡';
    },
    data() {
        return {
            imgPath : '',
            like : '',
        }
    }
}
</script>

<style scoped>

</style>
