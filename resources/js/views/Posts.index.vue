<template>
    <div class="container">
        <div v-for="post in posts" :key="post.id">
            {{ post.title }}
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return{
            posts: [],
        }
    },

    methods: {
        fetchPostsData() {
            axios.get('/api/posts')
            .then( res => {
                // console.log(res.data.posts);
                this.posts = res.data.posts;
                // console.log(this.posts);
            })
            .catch( err => {
                console.warn(err);
            })
        }
    },

    mounted() {
        this.fetchPostsData();
    }
}
</script>

<style lang="scss" scoped>

</style>