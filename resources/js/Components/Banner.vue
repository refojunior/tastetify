<template>
    <div class="container-fluid p-0 bg-light">
        <div class="px-4 my-5 text-left banner">
            <div class="container">
                <div class="row flex-lg align-items-center g-5 py-5">                    
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold lh-1 mb-3">Tastetify</h1>
                            <p class="lead">Create your own restourant menu with your own taste of music!</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button type="button" class="btn btn-success px-4 me-md-2">Create your own</button>
                        </div>
                    </div>
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Image" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .banner {
        /* background-image: url('/img/banner.jpeg'); */
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        padding-top: 10rem;
        padding-bottom: 10rem;
    }
</style>