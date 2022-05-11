<template>
    <div>
        <!-- Pagina show post per: <br>
        {{ $route.params.slug }} -->
        <!-- <figure class="jumbo-image">
            <img :src="post.cover" alt="">
        </figure> -->
        <template>
            <div :style="{backgroundImage:`url(${post.cover})`}"
            class="jumbo-image"> <!-- prendo l'immagine dal backend -->
            </div>
        </template>
        <section>
            <div class="container px-6 py-20">
            <h1 v-if="post" class="post-title text-5xl">{{ post.title }}</h1>
            <p class="pt-8 opacity-80">{{ post.content }}</p>
            <p class="text-lg pt-10">Category: {{ post.category.name }}</p>
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

    .jumbo-image{
        height: 600px;
        overflow: hidden;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

</style>