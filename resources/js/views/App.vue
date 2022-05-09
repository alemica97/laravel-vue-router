<template>
  <div class="app bg-neutral-900 text-white">
      <header>
          <nav>
              navbar
          </nav>
      </header>

      <PostsGrid />

      <footer>
          footer
      </footer>
  </div>
</template>

<script>
import PostsGrid from './Posts.index.vue'

export default {
    components: {
        PostsGrid,
    }
}
</script>

<style long="scss" socped>

.app{
    min-height: 100vh;
}

</style>