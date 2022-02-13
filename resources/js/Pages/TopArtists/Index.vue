<template>
    <div class="px-4">
        <div class="ellipse-1"></div>
        <div class="ellipse-2"></div>
        <div class="container section-start" style="z-index:2">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h1 class="text-center text-white mt-4 mb-5">Your Top Artists</h1>
                    <nav class="nav nav-pills nav-fill flex-nowrap tastetify-nav">
                        <inertia-link href="/top-artists" class="nav-link p-custom" :class="[page == 'short_term' ? 'active' : '']"><span>4 WEEKS</span></inertia-link>
                        <inertia-link href="/top-artists?t=m" class="nav-link" :class="[page == 'medium_term' ? 'active' : '']">SIX MONTHS</inertia-link>
                        <inertia-link href="/top-artists?t=l"  class="nav-link p-custom" :class="[page == 'long_term' ? 'active' : '']">ALL TIME</inertia-link>
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
