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
            
            <!-- <div id="login">
                <h1>How to use</h1>
                <div v-if="user.length == 0">
                    <a href="/login">Log in</a>
                </div>
            </div>
            <div v-if="user.length != 0" id="loggedin">
                <p>Welcome, {{ user.name }}</p>
                <button class="btn btn-danger btn-sm" @click.prevent="logout()">Logout</button>
            </div> -->
        </div>
    </div>
</template>

<script>
    import LayoutApp from '../../Layouts/App.vue'
    import Banner from '../../Components/Banner.vue'

    import { Inertia } from '@inertiajs/inertia'
    
    export default {
        //layout
        layout: LayoutApp,
        props: {
            user: Array
        },
        components: {
            Banner
        },

        setup() {
            function logout(){
                Inertia.post('/logout')
            }

            return {
                logout
            }
        }
    }
</script>

<style scoped>
.custom-list {
    line-height: 2em;
}
</style>