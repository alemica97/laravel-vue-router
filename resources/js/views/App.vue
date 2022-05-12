<template>
  <div class="app bg-neutral-900 text-white">
      <header class="bg-slate-600/95 fixed w-full z-10">
          <div class="container flex justify-between items-center px-6 py-4">
            <h1 class="header-title">Boolpress</h1>
            <nav>
                <ul class="flex justify-end gap-5 text-lg">
                    <!-- uso router-link per creare dei link alle rotte create in index.js -->
                    <li class="opacity-60 hover:opacity-100">
                        <router-link :to="{name:'posts.index'}">Posts</router-link>
                    </li>
                    <li class="opacity-60 hover:opacity-100">
                        <router-link :to="{name:'contact'}">Contact</router-link>
                    </li>
                </ul>
            </nav>
          </div>
      </header>

        <!-- <PostsGrid /> --> <!-- lo sostituisco con <router-view> -->
        <!-- per visualizzare il componente relativo alla rotta -->
        <router-view></router-view>

      <footer class="boolpress-footer bg-slate-900 flex items-center">
          <div class="container px-6">
              <span>Boolpress - Boolean©️</span>
          </div>
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

.header-title{
    font-size: 35px;
    text-transform: uppercase;
    font-weight: 600;
}

.boolpress-footer{
    height: 80px;
}
</style>