<template>
    <div class="template-2 overflow-hidden">
        <div>
            <div v-if="content" class="content-loading"></div>
        </div>
        <div class="container-box" v-if="content" ref="screenshot" id="capture">
            <div class="p-3">
                <div class="header-content">
                    <h1 class="title mb-0"></h1>
                    <hr class="top">
                    <div class="d-flex justify-content-between align-items-center vol">
                        <div>
                            Vol. 1 No. 1
                        </div>
                        <div>
                            News For Today
                        </div>
                        <div class="username">
                            By {{ user.name }}
                        </div>
                    </div>
                    <hr class="bottom">
                    <div class="text-center">
                        <h2 class="mt-2" v-if="time_frame == 'All Time'">BEST SONGS OF ALL TIME</h2>
                        <h2 class="mt-2" v-else-if="time_frame == 'Last Month'">BEST SONGS OF THE MONTH</h2>
                        <h2 class="mt-2"  v-else>BEST SONGS FOR SIX MONTH</h2>
                    </div>
                    <hr class="mt-0 mb-0">
                </div>
            </div>

            <div class="main-content container">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li v-for="(track, index) in tracks" :key="index">
                                <div class="d-flex justify-content-between" :class="[index > 4 ? 'd-none' : '']">
                                    <div class="track">
                                        {{ track.title }} <span class="artist">by {{ track.artists }}</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <div v-for="(image, index) in images1" :key="index" class="album-container mb-3 text-right">
                            <img :src="image" alt="img" class="album-image">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 mt-2">
                        <div v-for="(image, index) in images2" :key="index" class="album-container mb-3 text-left">
                            <img :src="image" alt="img" class="album-image">
                        </div>
                    </div>
                    <div class="col-6">
                        <ul>
                            <li v-for="(track, index) in tracks" :key="index">
                                <div class="d-flex justify-content-between" :class="[index < 4 ? 'd-none' : '']">
                                    <div class="track">
                                        {{ track.title }} <span class="artist">by {{ track.artists }}</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>                
                </div>
            </div>
            <div class="footer-content container">
                <hr class="mt-0 mb-2">
                <div class="d-flex justify-content-between align-items-center vol">
                    <div>
                        221b Baker St, London NW1 6XE, UK
                    </div>
                    <div class="username">
                        &copy; Tastetify 2021
                    </div>
                </div>
                <hr class="mt-2 mb-0">
            </div>
        </div>

        <div class="html2canvas-container text-center mb-5">
            <div id="canvasRendered" class="d-none"></div>
            <div class="canvas-content">
                <img :src="screenshotImage" class="img img-fluid d-block">
                <a @click.prevent="downloadImage" class="btn btn-outline-primary mt-3 download" id="download">Save as image</a>
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
            images1: [],
            images2: [],
            src: '',
            screenshotImage: ''
        }
    },
    methods: {
        formated() {
            let array = this.$props.images

            if(array.length > 2) {
                var indexToSplit = array.indexOf(array[2]);
                this.images1 = array.slice(0, indexToSplit);
                this.images2 = array.slice(indexToSplit);
                
                if(this.images2.length > 2) {
                    this.images2.length = 2
                }
            } else {
                this.images1 = array
            }
        },

        async screenshot() {
            //console.log(document.querySelector('.template-2').offsetHeight)     
            await this.formated()

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
        }
    },
    async mounted(){           
        setTimeout(() => {
            this.screenshot()
        }, 500)
        
    }
}
</script>

<style scoped>
h1.title {
    font-family: "Chomsky";
    font-size: 59px;
    color: #444444;
    white-space: nowrap;
    letter-spacing: -0.2px!important;
    background-image: url('/img/head-title.png');
    width: 100%;
    height: 74px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}
h2 {
    font-family: "Bitter";
    font-weight: 800;
    font-size: 33px;
    color: #444444;
}
.container-box {
    width: 500px!important;
    height: 899px!important;
    background-color: red;
    background-image: url('/img/paper_bg.jpg');
    background-size: cover;
    position: relative;
}
hr {
    border: 1px solid black;
}
hr.top {
    margin-top: 0;
    margin-bottom: 5px;
}
hr.bottom {
    margin-bottom: 0;
    margin-top: 5px;
}
.username {
    max-width: 270px;
    text-align: right;
    min-width: 98px;
}
.vol {
    overflow: hidden;
}
.vol div{
    font-family: "Bitter";
    font-weight: 600;
    line-height: 1.2em;
}
.main-content {
    max-width: 390px;
}
ul {
    margin: 0;
    padding: 0 0 0 10px;
    list-style: none;
}
.track {
    margin-bottom: 10px;
    font-family: "Bitter";
}
span.artist {
    display: block;
    font-size: 12px;
}
.album-image {
    -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
    filter: grayscale(100%);
    width: 120px;
}
.text-right {
    text-align: right;
}
.footer-content {
    position: absolute;
    width: 100%;
    bottom: 12px;
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