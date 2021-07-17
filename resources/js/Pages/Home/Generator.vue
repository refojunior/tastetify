<template>
    <div class="px-4">
        <div class="container section-start">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Generate Your Own Menu</h1>
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
                    <div class="mt-5"></div>
                    <h4>Choose your template:</h4>
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="boxes" :class="{focus:template == 'template_1'}" @click="selectTemplate('template_1')">
                                <span>Template 1</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="boxes" :class="{focus:template == 'template_2'}" @click="selectTemplate('template_2')">
                                <span>Template 2</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="boxes" :class="{focus:template == 'template_3'}" @click="selectTemplate('template_3')">
                                <span>Template 3</span>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="text-center">
                        <button @click.prevent="generateContent(time_range, template)" class="btn btn-primary">Start Generate</button>
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
            template: '',
        }
        
    },
    methods: {
        selectTimeRange: function (value){
            this.time_range = value
        },
        selectTemplate: function(value){
            this.template = value
        }
    },
    setup(){
        function generateContent(time_range, template){
            if(time_range == ''){
                alert('Select the time frame first')
            } else if(template == ''){
                alert('Select select your template')
            } else {
                //console.log(time_range + " " + template)
                Inertia.post('/generator', {
                    time_range: time_range,
                    template: template,
                })
                
            }

        }

        return {
            generateContent
        }
    }
}
</script>