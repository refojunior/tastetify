<template>
    <div>
        <Banner />

        <div class="container">
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
</style>