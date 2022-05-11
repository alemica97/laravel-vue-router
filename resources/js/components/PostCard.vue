<template>

    <router-link class="post-card rounded-md bg-slate-600 p-5 cursor-pointer"
        tag="div"
        :to="{ name:'posts.show', params: { slug: post.slug } }">
        <figure class="post-card-img rounded-md overflow-hidden mb-6">
            <img :src="post.cover" alt="" class="w-full object-cover">
        </figure>
        <div class="post-card-body">
            <h3 class="post-card-title text-xl mb-2 font-bold">{{ post.title }}</h3>
            <span v-if="post.category" class="post-card-category text-base font-bold opacity-80">
                {{ post.category.name }}
            </span>
            <span v-else class="post-card-category text-base font-semibold opacity-80 line-through">
                No category
            </span>
            <ul class="flex gap-4 text-sm">
                <li class="post-card-tag bg-amber-600 rounded-full px-2" 
                    v-for="tag in post.tags" :key="tag.id">
                    <span class="post-tag">{{ tag.name }}</span>
                </li>
            </ul>
        </div>
    </router-link>

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
    .post-card{
        &:hover{
            background-color: #637388;
            transform: translateY(-2%);
            transition: all 600ms;

                .post-card-img{
                    img{
                        transform: scale(1.3, 1.3);
                        transition: all 1s;
                    }
                }
        }
    }

</style>