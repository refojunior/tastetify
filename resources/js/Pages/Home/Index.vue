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
                            <div class="service">
                                <img src="/img/icon1.jpg" alt="icon1" class="img-fluid">
                                <p class="fs-5">Generate card with your music</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="service">
                                <img src="/img/icon2.jpg" alt="icon1" class="img-fluid">
                                <p class="fs-5">Find your best tracks</p>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="service">
                                <img src="/img/icon3.jpg" alt="icon1" class="img-fluid">
                                <p class="fs-5">Find your top played artists</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid grey-bg">
            <div class="container">
                <div class="row section-start">
                    <div class="col-md-12">
                        <h1>How to create a card?</h1>
                        <div class="pt-3"></div>
                        <p>To use this tool is very simple, you just need to:</p>
                        <ul class="custom-list">
                            <li>Login using your Spotify accounts.</li>
                            <li>Select the time frame activity.</li>
                            <li>Select the template.</li>
                            <li>Click generate.</li>
                            <li>Done, your card is ready.</li>                        
                        </ul>
                        <p>You can save it as image by clicking the download button.</p>
                        <p>Don't forget to share it with your friends!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LayoutApp from '../../Layouts/App.vue'
    import Banner from '../../Components/Banner.vue'
    import Swal from 'sweetalert2'
    import axios from 'axios'
    import { usePage } from '@inertiajs/inertia-vue3'
    
    export default {
        //layout
        layout: LayoutApp,
        props: {
            user: Array,
        },
        data() {
            return {
                email: "",
            }
        },
        components: {
            Banner
        },
        async mounted(){
            if(usePage().props.value.flash.error == null){
                const { value: email } = await Swal.fire({
                    title: 'Greetings!',
                    html: 'Before you start, please put your Spotify email here to be added to the white-list, if you have already done so, just ignore this message :)',
                    imageUrl: '/img/icon4.png',
                    imageHeight: 85,
                    showCancelButton: true,
                    confirmButtonText: 'Done',
    
                    input: 'email',
                    inputLabel: 'Your Spotify email',
                    inputPlaceholder: 'Enter your Spotify email address'
                })
    
                if (email) {
                    this.email = email
                    this.addEmail(this.email)
                }
            }
        },
        setup() {
            function addEmail(email) {
                
                axios({
                    method: 'post',
                    url: '/add-email',
                    data: {
                        email: email,
                    }
                }).then(res => {
                    if(res.data == 1){
                        Swal.fire(
                            'Success!',
                            'Your Spotify email has been added to our white-list.',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Hold on!',
                            'Your Spotify email already registered to our white-list, just wait a few minutes :)',
                            'info'
                        )
                    }
                })

            }

            return {
                addEmail
            }
        }
    }
</script>

<style scoped>
    .grey-bg {
        background-color: #edededbd!important;
        background-image: url(/img/bg.png);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: right;
    }
    .service img {
        max-width: 240px;
        margin-bottom: 29px;
    }
</style>