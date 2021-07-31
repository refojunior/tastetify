<template>
    <div class="px-4">
        <div class="container section-start">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Your Top Artists</h1>
                    <hr>
                    <nav class="nav nav-pills nav-fill flex-nowrap">
                        <inertia-link href="/top-artists" class="nav-link" :class="[page == 'short_term' ? 'active' : '']">4 Weeks</inertia-link>
                        <inertia-link href="/top-artists?t=m" class="nav-link" :class="[page == 'medium_term' ? 'active' : '']">Six Months</inertia-link>
                        <inertia-link href="/top-artists?t=l"  class="nav-link" :class="[page == 'long_term' ? 'active' : '']">All Time</inertia-link>
                    </nav>
                </div>
            </div>

            <TopArtists :data="data" />     
        </div>
    </div>
</template>

<script>
    import LayoutApp from '../../Layouts/App.vue'
    import TopArtists from '../../Components/TopArtists.vue'

    export default {
        layout: LayoutApp,
        components: {
            TopArtists
        },
        props: {
            user:Array,
            data:Array,
            page:String,
        },
        

    }
</script>
