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
                <div class="column card-div">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                <i @click="goBack" v-if="activeComponent !== 0" class="fas fa-arrow-left pr-4"></i>
                                Create an account
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content px-5">
                                <form @submit.prevent="store">

                                    <email-pass
                                        v-if="activeComponent === 0"
                                        v-bind:email="form.email" v-on:update:email="form.email = $event" :v$="v$"
                                        v-bind:password="form.password" v-on:update:password="form.password = $event"
                                        v-bind:password_confirmation="form.password_confirmation" v-on:update:password_confirmation="form.password_confirmation = $event"
                                    />


                                    <name
                                        v-if="activeComponent === 1" :v$="v$"
                                        v-bind:first_name="form.first_name" v-on:update:first_name="form.first_name = $event"
                                        v-bind:last_name="form.last_name" v-on:update:last_name="form.last_name = $event"
                                    />

                                    <agreement
                                        v-if="activeComponent === 2" :v$="v$"
                                        v-bind:agreement="form.agreement" v-on:update:agreement="form.agreement = $event"
                                    />
                                </form>
                                <div class="" style="margin-top: 20px;">
                                    <div class="is-flex is-justify-content-center">
                                        <button v-if="activeComponent === 0 || activeComponent === 1" @click="goForward" class="button is-link is-rounded" style="background-color: #3399FD; width: 250px;">Next</button>
                                        <button v-if="activeComponent === 2" @click="store" class="button is-link is-rounded" style="background-color: #3399FD; width: 250px;">Create account</button>
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
import { useVuelidate } from '@vuelidate/core'

import { required, email } from '@vuelidate/validators'
import { sameAs } from '@vuelidate/validators'
import EmailPass from "../Front/Auth/EmailPass.vue";
import Name from "../Front/Auth/Name.vue";
import Agreement from "../Front/Auth/Agreement.vue";
import {Inertia} from "@inertiajs/inertia";

export default {
    setup () {
        return { v$: useVuelidate() }
    },
    components: {
        EmailPass,
        Name,
        Agreement,
    },
    validations () {
        return {
            form: {
                first_name: { required },
                last_name: { required },
                agreement: { required },
                email: { required, email },
                password: { required },
                password_confirmation: { required, sameAs: sameAs(this.form.password) }

            }
        }
    },
    data() {
        return {
            form : {
                first_name: '',
                last_name: '',
                agreement: false,
                email: '',
                password: '',
                password_confirmation: '',
            },
            activeComponent: 0,
        }
    },
    methods:{
        async goForward() {
            const email = await this.v$.form.email.$validate()
            const password = await this.v$.form.password.$validate()
            const password_confirmation = await this.v$.form.password_confirmation.$validate()
            const first_name = await this.v$.form.first_name.$validate()
            const last_name = await this.v$.form.last_name.$validate()
            if (email && password && password_confirmation){
                this.activeComponent = 1
            }

            if (first_name && last_name){
                this.activeComponent += 1
            }
        },
        goBack() {
            this.activeComponent -= 1
        },
        async store(){

            if (this.form.agreement){
                Inertia.post('/register', this.form)
            }
        },
    }
}
</script>

<style scoped>

</style>
