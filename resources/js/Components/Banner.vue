<template>
    <div class="container-fluid p-0 banner-container">
        <div class="px-4 text-left banner">
            <div class="container">
                <div class="row flex-lg align-items-center g-5 py-5">                    
                    <div class="col-lg-12 text-center">
                        <h1 class="display-5 fw-bold lh-1 mb-3">Tastetify</h1>
                        <p class="lead">Create a cool card with your taste of music!</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-center">
                            <a v-if="user.length == 0" href="/login" class="btn btn-success px-4 me-md-2">Create your own</a>
                            <inertia-link v-else href="/generator" class="btn btn-success px-4 me-md-2">Create your own</inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        user: Array
    },
    mounted(){
        console.log()
    }
}
</script>
<style scoped>
    
    .banner {
        background-image: url('/img/banner.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        padding-top: 15rem;
        padding-bottom: 15rem;
    }
</style>