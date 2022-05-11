<template>
    <div>
        <!-- Pagina show post per: <br>
        {{ $route.params.slug }} -->

        <h1 v-if="post">{{ post.title }}</h1>
    </div>
</template>

<script>
export default {
    data() {
        return { 
            post: null,
        }
    },
    methods: {
        fetchSlugPost() {
            axios.get(`/api/posts/${ this.$route.params.slug }`)
            .then( res => {
                console.log(res);
                this.post = res.data.post;

            })
            .catch( err => {
                console.warn( err );
            });
        }
    },
    beforeMount() {
        this.fetchSlugPost();
    },
}
</script>

<style lang="scss" scoped>

</style>