<template>
  <div class="app bg-neutral-900 text-white">
      <header class="bg-slate-600">
          <div class="container flex justify-between items-center p-6">
            <h1>Boolpress</h1>
            <nav>
                <ul class="flex justify-end gap-5">
                    <!-- uso router-link per creare dei link alle rotte create in index.js -->
                    <li>
                        <router-link :to="{name:'posts.index'}">Posts</router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'contact'}">Contact</router-link>
                    </li>
                </ul>
            </nav>
          </div>
      </header>

        <!-- <PostsGrid /> --> <!-- lo sostituisco con <router-view> -->
        <!-- per visualizzare il componente relativo alla rotta -->
        <router-view></router-view>

      <footer>
          footer
      </footer>
  </div>
</template>

<script>
import PostsGrid from '../pages/Posts.index.vue'

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