<template>
    <div>
        <div id="login">
            <h1>First, log in to spotify</h1>
            <div v-if="user.length == 0">
                <a href="/login">Log in</a>
            </div>
        </div>
        <div v-if="user.length != 0" id="loggedin">
            <p>Welcome, {{ user.name }}</p>
            <button class="btn btn-danger btn-sm" @click.prevent="logout()">Logout</button>
        </div>
    </div>
</template>

<script>
    import LayoutApp from '../../Layouts/App.vue'

    import { Inertia } from '@inertiajs/inertia'
    
    export default {
        //layout
        layout: LayoutApp,
        props: {
            user: Array
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