<template>
    <div>
        <section style="height: 100%;">
            <nav class="navbar" role="navigation" aria-label="main navigation">

            </nav>
            <div class="columns  has-text-dark">
                <div class="column has-background is-relative is-two-fifths bg-img" style="background-image: url('https://images.unsplash.com/photo-1683497727598-2b9334818703?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw4OHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=60');background-repeat: no-repeat;background-size: cover;">
                    <div class="specification p-4" style="background-color: #171C2E;color: #FFFFFF; bottom: 100px;left: 50px;right: 50px; position: absolute;">
                        <p class="is-size-4 has-text-weight-bold">Specification Engine</p>
                        <p class="is-size-7 mt-2">Take a guided walk through of your space and start defining your specification. This will give you an idea of total cost</p>
                    </div>
                </div>
                <div class="column card-div" style="height: 100vh;">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                <i class="fas fa-arrow-left pr-4"></i>
                                Congratulations
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content px-5">
                                <div class="field is-flex is-justify-content-center">
                                    <span class="has-text-centered is-size-3 lock-wraper"><i class="fas fa-envelope"></i></span>
                                </div>
                                <div>
                                    <p class="has-text-centered custom-line-height mt-4">Your Password has been Updated</p>
                                </div>


                                <div class="" style="margin-top: 40px;">
                                    <div class="is-flex is-justify-content-center">
                                        <button  @click="login" class="button is-link is-rounded" style="background-color: #3399FD; width: 250px;">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

import {Inertia} from "@inertiajs/inertia";

export default {
    props : {
        user :Object
    },
    methods:{
        login(){
            Inertia.get('/login', this.form)
        }
    }
}
</script>

<style>
html{
    background-color: #F2F2F5;
}
.card-div{
    padding-left: 7.75rem;
    padding-right: 7.75rem;margin-top: 2rem;
}
.lock-wraper{
    padding-left: 22px;
    padding-right: 22px;
    padding-top: 10px;
    padding-bottom: 15px;

    border-radius: 100%;
    color: #FF694E;
    background-color: rgb(255,105,78,0.2);
}
.custom-line-height{
    line-height: 0.5;
}

@media (max-width: 1100px) {
    .card-div{
        padding-left: 2.75rem;
        padding-right: 2.75rem;margin-top: 2rem;
    }
}

@media (max-width: 874px) {
    .bg-img{
        display: none;

    }
}
</style>
