<template>
    <div class="row mt-4">
        <div class="col-4 mb-4" v-for="(row, index) in data" :key="index">
            <div class="card">
                <img :src="row.images[1]['url']" class="card-img-top card-image" alt="">
                <div class="card-body">
                    <h5 class="card-title mb-0">{{ row.name }}</h5>
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