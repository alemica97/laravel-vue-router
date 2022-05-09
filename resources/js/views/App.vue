<template>
  <div>
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

</style>