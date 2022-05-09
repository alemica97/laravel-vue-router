<template>
    <div class="container">
        <PostCard v-for="post in posts" :key="post.id" :post="post"/>
    </div>
</template>

<script>
import PostCard from '../components/PostCard.vue'

export default {

    components: {
        PostCard,
    },

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