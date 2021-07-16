<template>
    <div>
        <Banner :user="user" />

        <div class="container">
            <div class="row section-start">
                <div class="col-md-12 text-center">
                    <h1>What We Have</h1>
                    <p>We have some tools that you can use to:</p>

                    <div class="row inner-content">
                        <div class="col-md-4">
                            Generate menu with your music
                        </div>
                        <div class="col-md-4">
                            Find your best tracks
                        </div>
                        <div class="col-md-4">
                            Find your top played artists
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5 pb-5">
                <div class="col-md-12">
                    <h1>How to use it?</h1>
                    <div class="pt-3"></div>
                    <p>To use this tool is very simple, you just need to:</p>
                    <ul class="custom-list">
                        <li>Login using your Spotify accounts</li>
                        <li>Select the time frame activity</li>
                        <li>Select the background and font as you wish</li>
                        <li>Done, your menu is ready</li>                        
                    </ul>
                    <p>Don't forget to share it with your friends!</p>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
    import LayoutApp from '../../Layouts/App.vue'
    import Banner from '../../Components/Banner.vue'
    
    export default {
        //layout
        layout: LayoutApp,
        props: {
            user: Array
        },
        components: {
            Banner
        },
    }
</script>

<style scoped>
.custom-list {
    line-height: 2em;
}

.section-start {
    padding-top: 10em;
    padding-bottom: 10em;
}

.inner-content {
    padding-top: 5em;
    padding-bottom: 5em;
}
</style>