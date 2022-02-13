<template>
    <div class="px-4">
        <div class="ellipse-1"></div>
        <div class="ellipse-2"></div>
        <div class="container section-start" style="z-index:2">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h1 class="text-center text-white mt-4 mb-5">Your Top Tracks</h1>
                    <nav class="nav nav-pills nav-fill flex-nowrap tastetify-nav">
                        <inertia-link href="/top-tracks" class="nav-link p-custom" :class="[page == 'short_term' ? 'active' : '']">4 Weeks</inertia-link>
                        <inertia-link href="/top-tracks?t=m" class="nav-link" :class="[page == 'medium_term' ? 'active' : '']">Six Months</inertia-link>
                        <inertia-link href="/top-tracks?t=l"  class="nav-link p-custom" :class="[page == 'long_term' ? 'active' : '']">All Time</inertia-link>
                    </nav>
                </div>
            </div>

            <div class="row" style="margin-top:15px">
                <div class="col">
                    <ol class="list-group list-group-numbered tastetify-track-list">
                        <li class="list-group-item d-flex justify-content-between align-items-start li-custom  text-white" v-for="(row, index) in data" :key="index" v-bind:style="{ backgroundImage: 'url(' + row.image + ')'  }">
                            <div class="me-auto m-custom">
                                <div class="fw-bold">{{ row.title }}</div>
                                {{ row.artists }}
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import LayoutApp from '../../Layouts/App.vue'

    export default {
        layout: LayoutApp,
        props: {
            user:Array,
            data:Array,
            page:String,
        },
        
    }
</script>

<style scoped>
    .m-custom {
        margin-left: 5em;
    }

    .li-custom {
        background-repeat: no-repeat;
        background-size: 42px;
        background-position: 55px;
    }

    .tastetify-track-list li {
        background-color: #1E1E1E;
        margin-bottom: 18px;
        border-radius: 10px;
    }
</style>
