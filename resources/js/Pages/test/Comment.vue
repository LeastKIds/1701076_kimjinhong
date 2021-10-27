<template>
    <div class="flex mx-auto items-center justify-center shadow-lg mt-5 mx-8 mb-4">
        <div class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" >
            <div class="flex flex-wrap -mx-3 mb-6" v-for="(c, index) in comments" :key="index">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">작성자 : {{c.user.name}} ({{c.created_at}})</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                              name="body" placeholder='댓글작성' required readonly="readonly">{{c.comments}}</textarea>
                </div>
                <button  class="my-4 px-4 py-2 text-white hover:bg-blue-700 bg-blue-500" @click="deleteComment(c.id)">삭제</button>
            </div>
        </div>
    </div>

    <div class="flex mx-auto items-center justify-center shadow-lg mt-5 mx-8 mb-4">
        <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">댓글 작성</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                              name="body" placeholder='댓글작성' required v-model="comment"></textarea>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">

                    <div class="-mr-1">
                        <input type="button" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                               value='Post Comment' @click="createComment">
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "Comment",
    props : ['post'],
    data() {
        return {
            comment : '',
            comments : null,
        }
    },
    methods : {
        createComment() {
            const data = { 'comments' : this.comment }
            axios.post('/test/post/comment/'+this.post.id,data)
                .then(response => {
                    console.log(response);
                    this.comments = response.data.comments;
                    this.comment = '';
                }).catch(err => {
                    console.log(err);
            })
        },
        deleteComment(id) {
            axios.delete('/test/post/comment/'+id)
                .then(response => {
                    console.log(response);
                    this.getComments();
                }).catch(err => {
                    console.log(err);
            })
        },
        getComments() {
            axios.get('/test/post/comment/'+this.post.id)
                .then(response => {
                    this.comments = response.data.comments;
                }).catch(err => {
                console.log(err);
            });
        }

    },
    mounted() {
        this.getComments();
    }
}
</script>

<style scoped>

</style>
