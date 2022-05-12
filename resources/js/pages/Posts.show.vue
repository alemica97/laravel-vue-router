<template>
    <div v-if="post" class="wrapper">
        <template>
            <div :style="{backgroundImage:`url(${post.cover})`}"
            class="jumbo-image"> <!-- prendo l'immagine dal backend -->
            </div>
        </template>
        <section>
            <div class="container px-6 py-20">
            <h1 v-if="post" class="post-title text-5xl">{{ post.title }}</h1>
            <p class="pt-8 opacity-80">{{ post.content }}</p>
            <p class="text-lg pt-10" v-if="post.category">Category: {{ post.category.name }}</p>
            <p v-else class="text-lg pt-10">Category: <span class="line-through">No category</span></p>
            <ul class="pt-10 flex gap-4">
                <li v-for="tag in post.tags" :key="tag.id"
                    class="py-1 px-5 rounded-full bg-amber-600">
                    {{ tag.name }}
                </li>
            </ul>
        </div>
        </section>
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
                console.log(res.data.post);
                this.post = res.data.post;

            })
            .catch( err => {
                console.warn( err );
                //redirect error 404
                this.$router.push('/404');
            });
        }
    },
    beforeMount() {
        this.fetchSlugPost();
    },
}
</script>

<style lang="scss" scoped>

    .wrapper{
        min-height: calc(100vh - 80px);
    }

    .jumbo-image{
        height: 600px;
        overflow: hidden;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

</style>