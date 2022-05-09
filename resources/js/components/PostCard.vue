<template>
    <div class="post-card">
        <figure class="post-card-img">
            <img :src="post.cover" alt="">
        </figure>
        <div class="post-card-body">
            <h3 class="post-card-title">{{ post.title }}</h3>
            <span v-if="post.category" class="post-card-category">
                {{ post.category.name }}
            </span>
            <ul>
                <li class="post-card-tag" 
                    v-for="tag in post.tags" :key="tag.id">
                    <span class="post-tag">{{ tag.name }}</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {

    props:{
        post: {
            type: Object,
            required: false,
        }
    }
}
</script>

<style lang="scss" scoped>

</style>