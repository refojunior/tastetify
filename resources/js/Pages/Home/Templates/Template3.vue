<template>
    <div>
        <div>
            <div v-if="content" class="content-loading"></div>
        </div>
        <div class="container-box" v-if="content" ref="screenshot" id="capture">
            <div class="row p-2">
                <div class="col-6">
                    <div class="header">
                        <h1 class="mb-0 text-white">Tastetify</h1>
                        <p class="mb-0 text-white">Created by {{ user.name }}</p>
                    </div>
                </div>
                <div class="col-6 text-center">
                    <h3 class="text-white text-capitalize" v-if="time_frame == 'All Time'">best songs of all time</h3>
                    <h3 class="text-white text-capitalize" v-else-if="time_frame == 'Last Month'">best songs of the month</h3>
                    <h3 class="text-white text-capitalize" v-else>best songs for six month</h3>
                </div>
            </div>
            <div class="content-container">
                <div class="" v-for="(track, index) in tracks" :key="index">
                    <div class="card card-customize " :class="'card-' + (index+1)">
                        <img :src="track.image" class="card-img-top cover" alt="Album">
                        <div class="card-body">
                            <div class="title-container">
                                <h5 class="card-title text-white mb-0 song-title">{{ track.title }}</h5>
                                <span class="singer text-white">{{ track.artists }}</span>
                            </div>
                            <div class="player-container mt-2">
                                <img src="/img/player.png" alt="player" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="html2canvas-container text-center mb-5">
            <div id="canvasRendered" class="d-none"></div>
            <div class="canvas-content">
                <img :src="screenshotImage" class="img img-fluid d-block">
                <a @click.prevent="downloadImage" class="btn btn-outline-primary mt-3 download" id="download">Save as image</a>
                <inertia-link href="/generator" class="d-block mt-2 link">Go back</inertia-link>
            </div>
        </div>

    </div>
</template>

<script>
import html2canvas from 'html2canvas'
import download from 'downloadjs';

export default {
    props: {
        user: Object,
        tracks: Array,
        images: Array,
        time_frame: String
    },
    data() {
        return {
            content: true,
            screenshotImage: ''
        }
    },
    methods: {
        async screenshot() {
    
            const opts = {
                useCORS: true
            }
            const el = this.$refs.screenshot
            const canvas = await html2canvas(el, opts)
            
            this.screenshotImage = canvas.toDataURL('image/jpg')
            this.content = false
        },
        downloadImage() {
            download(this.screenshotImage, 'Testetify', 'image/png');
        },
    },
    async mounted(){           
        setTimeout(() => {
            this.screenshot()
        }, 500)
        
    }
}
</script>

<style scoped>

.content-loading {
    z-index:10;
}

.container-box {
    width: 500px!important;
    height: 899px!important;
    background-color: #0F0F0F;
    position: relative;
    overflow: hidden;
    background-image: url(/img/bg-card.jpg);
}

.card-customize {
    padding: 10px;
    max-width: 200px;
    border: 0;
    border-radius: 0;
    background-color: #28282A;
    /* box-shadow: 0px 1px 17px -2px rgba(0,0,0,0.47); */
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
.content-container {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 100%;
}

.card-customize img.cover {
    border-radius: 0;
    width: 90%;
    margin: auto;
    margin-top: 35px;
    /* box-shadow: -1px 1px 9px -1px rgba(0,0,0,0.56); */
}
.card-customize .card-body {
    padding:10px;
}
.title-container {
    overflow: hidden;
}
.song-title {
    font-size: 13px;
    white-space: nowrap;
}

span.singer {
    font-size: 9.5px;
    margin: 0;
    display: block;
    white-space: nowrap;
}


.card-1 {
    position: absolute;
    top: 24px;
    right: 0;
    transform: rotate(18deg);
    z-index: 3;
    background-color: #081b00;
}

.card-2 {
    position: absolute;
    transform: rotate(-3deg);
    left: 132px;
    top: -5px;
    background-color: #1C1B2A;
    z-index: 2;
}
.card-3 {
    position: absolute;
    right: -34px;
    top: 278px;
    transform: rotate(7deg);
    z-index: 3;
    background-color: #0F0F0F;
}
.card-4 {
    position: absolute;
    top: 306px;
    left: 133px;
    transform: rotate(-2deg);
    z-index: 3;
}

.card-5 {
    position: absolute;
    top: 75px;
    transform: rotate(-21deg);
    left: -46px;
    background-color: #2C2326;
    z-index: 1;
}

.card-6 {
    position: absolute;
    bottom: 70px;
    right: 0;
    transform: rotate(22deg);
    background-color: #2C2326;
    z-index: 1;
}

.card-7 {
    position: absolute;
    bottom: 50px;
    left: 95px;
    transform: rotate(-10deg);
    background-color: #705F54;
    z-index: 1;
}

.card-8 {
    position: absolute;
    bottom: 150px;
    left: -47px;
    transform: rotate(-15deg);
    background-color: #251a1b;
    z-index: 1;
}

.card-9, .card-10 {
    display: none;
}

.html2canvas-container {
    max-width: 385px;
    margin: 0 auto;
    padding: 15px;
    width: 100%;
}

.canvas-content img {
    width: 100%;
}

</style>