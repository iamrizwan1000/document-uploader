<template>

    <div>
        <section>
            <nav class="navbar" role="navigation" aria-label="main navigation">

            </nav>
            <div class="columns has-background-light has-text-dark" style="height: 100vh;">
                <div class="column has-background is-relative is-two-fifths bg-img" style="background-image: url('https://images.unsplash.com/photo-1683497727598-2b9334818703?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw4OHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=60');background-repeat: no-repeat;background-size: cover;">left
                    <div class="specification p-4" style="background-color: #171C2E;color: #FFFFFF; bottom: 100px;left: 50px;right: 50px; position: absolute;">
                        <p class="is-size-4 has-text-weight-bold">Specification Engine</p>
                        <p class="is-size-7 mt-2">Take a guided walk through of your space and start defining your specification. This will give you an idea of total cost</p>
                    </div>
                </div>
                <div class="column" style="padding-left: 7.75rem;padding-right: 7.75rem;margin-top: 2rem;">
                    <div class="card">
                        <header class="">
                            <p class="card-header-title">
                                <i class="fas fa-arrow-left pr-4"></i>
                                Sign in
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content px-5">
                                <form class="space-y-6" @submit.prevent="submit" autocomplete="off">


                                    <div>
                                                                <label for="email" class=" text-sm font-medium text-gray-700"> Email address </label>
                                        <div class="mt-1">
                                            <input id="email" placeholder="Email" v-model="form.email" name="email" type="email" autocomplete="disable" required="" class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.email" v-text="errors.email"></span>
                                        </div>
                                    </div>

                                    <div>
                                                                <label for="password" class=" text-sm font-medium text-gray-700"> Password </label>
                                        <div class="mt-1">
                                            <input id="password" placeholder="Password" v-model="form.password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.password" v-text="errors.password"></span>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <!--                                            <div class="flex items-center">-->
                                        <!--                                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />-->
                                        <!--                                                <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>-->
                                        <!--                                            </div>-->

                                        <div class="text-sm">
                                            <!--                            <Link href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Register </Link>-->
                                        </div>
                                    </div>

                                    <div class="" style="margin-top: 20px;">
                                        <div class="is-flex is-justify-content-center">
                                            <button type="submit" class="button is-link is-rounded" style="background-color: #3399FD; width: 50%;">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>

<script>

import { Link } from "@inertiajs/inertia-vue3";
import Alert from "../../Components/Alert.vue";

export default {
    data(){
        return{
            form: {
                email: null,
                password: null,
            },
        }
    },
    props:{
        errors : Object,
        token : String,
        alert: Object,
    },
    methods:{
        submit(){
            this.$inertia.post(route('admin.login', { token: this.token }), this.form)
        }
    },
    components:{
        Link,
        Alert
    }

}
</script>

<style scoped>

</style>
