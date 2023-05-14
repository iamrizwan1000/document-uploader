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
                                Reset Password
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content px-5">
                                <form class="space-y-6" @submit.prevent="store">


                                    <div>
                                        <label for="password" class=" text-sm font-medium text-gray-700"> Password </label>
                                        <div class="mt-1">
                                            <input id="password" v-model="form.password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.password" v-text="errors.password"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="password_confirmation" class=" text-sm font-medium text-gray-700"> Confirmation Password </label>
                                        <div class="mt-1">
                                            <input id="password_confirmation" v-model="form.password_confirmation" name="password_confirmation" type="password" autocomplete="current-password_confirmation" required="" class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.password_confirmation" v-text="errors.password_confirmation"></span>
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

import { useVuelidate } from '@vuelidate/core'
import {Link} from '@inertiajs/inertia-vue3'
import {toaster} from "../Toast";
import { required, email } from '@vuelidate/validators'
import {Inertia} from "@inertiajs/inertia";
import ErrorMessage from "../Components/ErrorMessage.vue";

export default {
    setup () {
        return { v$: useVuelidate() }
    },

    components:{
        ErrorMessage,
        Link
    },
    props:{
        errors : Object,
    },
    // validations () {
    //     return {
    //         form: {
    //             email: { required, email },
    //             password: { required }
    //         }
    //     }
    // },
    data() {
        return {
            form: {
                password: null,
                password_confirmation: null,
            },
        }
    },

    methods:{


        store(){
            Inertia.post(route('updatePassword'), this.form, {
                onSuccess: (page) => {
                    toaster.show('Password updated',{
                        position:
                            "bottom"
                    });
                },
            })
        },
    }
}
</script>

<style scoped>

</style>
