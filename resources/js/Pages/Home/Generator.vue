<template>
    <div class="px-4 my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Generate your own menu</h1>
                    <hr>
                </div>
                <div class="col-md-12 text-center">
                    <h4>Choose your timeframe:</h4>
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="boxes" :class="{focus:time_range == 'short_term'}" @click="selectTimeRange('short_term')">
                                <span>4 Weeks</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="boxes" :class="{focus:time_range == 'medium_term'}" @click="selectTimeRange('medium_term')">
                                <span>6 Months</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="boxes" :class="{focus:time_range == 'long_term'}" @click="selectTimeRange('long_term')">
                                <span>All Time</span>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="text-center">
                        <button @click.prevent="generateContent(time_range)" class="btn btn-primary">Start Generate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import LayoutApp from '../../Layouts/App.vue'

export default {
    layout: LayoutApp,
    data() {
        return {
            time_range: '',
        }
        
    },
    methods: {
        selectTimeRange: function (value){
            this.time_range = value
        }
    },
    setup(){
        function generateContent(time_range){
            if(time_range == ''){
                alert('Select the time frame first')
            } else {
                Inertia.post('/generator', {
                    time_range: time_range,                
                })
            }

        }

        return {
            generateContent
        }
    }
}
</script>