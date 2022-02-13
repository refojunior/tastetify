<template>
    <div class="container-fluid p-0 banner-container">
        <div class="px-4 text-left banner position-relative overflow-hidden">
            <div class="ellipse-1"></div>
            <div class="ellipse-2" style="z-index:1"></div>
            <div class="container">
                <div class="row flex-lg align-items-center g-5 py-5">                    
                    <div class="col-lg-12 text-center">
                        <h1>Generate a cool card with several templates or get to know your most played songs or artists in Spotify!</h1>
                        <div class="d-grid gap-2 d-md-flex justify-content-center">
                            <a v-if="user.length == 0" href="/login" class="btn btn-tastetify p-tastetify font-weight-bold me-md-2">CREATE YOUR OWN</a>
                            <inertia-link v-else href="/generator" class="btn btn-tastetify p-tastetify font-weight-bold me-md-2">CREATE YOUR OWN</inertia-link>
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
    h1 {
        color: #fff;
        margin: auto;
        margin-bottom: 20px;
        font-size: 48px;
        font-weight: 500;
    }
    .banner {
        background-image: url('/img/banner.png');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        padding-top: 25rem;
        padding-bottom: 15rem;
    }

    .btn {
        margin-top: 50px;
    }

    @media screen and (max-width: 767px) {
        .banner {
            padding: 0;
            margin-top: 80px;
        }

        h1 {
            font-size: 24px;
            line-height: 140%;
        }
    }
</style>