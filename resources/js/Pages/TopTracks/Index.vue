<template>
    <div class="px-4">
        <div class="container section-start">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Your Top Tracks</h1>
                    <hr>
                    <nav class="nav nav-pills nav-fill flex-nowrap">
                        <inertia-link href="/top-tracks" class="nav-link p-custom" :class="[page == 'short_term' ? 'active' : '']">4 Weeks</inertia-link>
                        <inertia-link href="/top-tracks?t=m" class="nav-link" :class="[page == 'medium_term' ? 'active' : '']">Six Months</inertia-link>
                        <inertia-link href="/top-tracks?t=l"  class="nav-link p-custom" :class="[page == 'long_term' ? 'active' : '']">All Time</inertia-link>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start li-custom" v-for="(row, index) in data" :key="index" v-bind:style="{ backgroundImage: 'url(' + row.image + ')'  }">
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
</style>
