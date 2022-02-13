<template>
    <div class="row mt-4">
        <div class="col-4 col-md-3 mb-4 custom-spacing" v-for="(row, index) in data" :key="index">
            <div class="card tastetify-card">
                <img :src="row.images[1]['url']" class="card-img-top card-image tastetify-card-img" alt="">
                <div class="card-body">
                    <h5 class="card-title mb-0 text-white">{{ row.name }}</h5>
                </div>
            </div>
        </div>
    </div>   
</template>

<script>
export default {        
    props: {
        data:Array,
    }
}    
</script>

<style scoped>
@media screen and (max-width:576px) {
    .custom-spacing {
        padding:2px;
        margin-bottom:4px!important;
    }
    .custom-spacing img{
        height: 28.5vw;
    }
    .custom-spacing .card-body {
        padding:7px;
    }
}
</style>