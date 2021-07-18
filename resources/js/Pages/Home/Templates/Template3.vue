<template>
    <div>
        <div class="container-box">
            <div class="row p-2">
                <div class="col-6">
                    <div class="header">
                        <h1 class="mb-0 text-white">Tastetify</h1>
                        <p class="mb-0 text-white">Created by Username</p>
                    </div>
                </div>
                <div class="col-6 text-center">
                    <h2 class="text-white">Best songs of all time</h2>
                </div>
            </div>
            <div class="">
                <div class="card card-customize card-1">
                    <img src="/img/album.jpg" class="card-img-top" alt="Album">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <span class="singer">Singer</span>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container pt-5">
            <div class="text-center">
                <h3>This template is still in progress :)</h3>
                <p>It will be done very soon!</p>
                <inertia-link href="/generator" class="d-block mt-2 link">Go back</inertia-link>
            </div>
        </div> -->
    </div>
</template>

<style scoped>

.container-box {
    width: 500px!important;
    height: 899px!important;
    background-color: #0F0F0F;
    position: relative;
}

.card-customize {
    padding: 10px;
    max-width: 200px;
    border: 0;
    border-radius: 0;
    position: relative;
    background-color: #28282A;
}

.card.card-customize:before {
    content: "...";
    position: absolute;
    right: 16px;
    top: 6px;
    color: #A5A5A7;
    font-size: 17px;
}
.card-customize:after {
    content: "";
    position: absolute;
    top: 16px;
    left: 10px;
    background-image: url(/img/v.png);
    width: 19px;
    height: 10px;
    background-size: cover;
}

.card-customize img {
    border-radius: 0;
    width: 90%;
    margin: auto;
    margin-top: 35px;
}
.card-customize .card-body {
    padding:10px;
}

</style>