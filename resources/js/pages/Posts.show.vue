<template>
    <div>
        Pagina show post per: <br>
        {{ $route.params.slug }}
    </div>
</template>

<script>
export default {
    data() {
        return { 
            post: null,
        }
    }
    // beforeMount() {
    //     fetchSlugPost();
    // },
    // methods: {
    //     fetchSlugPost() {
    //         axios.get(`/api/posts/${ this.$route.params.slug }`)
    //         .then( res => {
    //             console.log(res);
    //         });
    //     }
    // }
    mounted() {
        console.log(this.$route);
    }
}
</script>

<style lang="scss" scoped>

</style>