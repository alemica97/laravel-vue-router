<template>
    <div class="error-page bg-neutral-900 text-white flex items-center">
        <div class="container text-center">
            <h1 class="error-title">404</h1>
            <p class="text-2xl">Page not found!</p>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    .error-page{
        min-height: calc(100vh - 80px);
    }
    .error-title{
        font-size: 120px;
        font-weight: 700;
    }
</style>