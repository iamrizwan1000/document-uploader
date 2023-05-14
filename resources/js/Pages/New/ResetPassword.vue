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
                       <header class="card-header">
                           <p class="card-header-title">
                               <i class="fas fa-arrow-left pr-4"></i>
                               Reset Password
                           </p>
                       </header>
                       <div class="card-content">
                           <div class="content px-5">
                               <div class="field is-flex is-justify-content-center">
                                   <span class="has-text-centered is-size-3 lock-wraper"><i class="fas fa-lock"></i></span>
                               </div>
                               <div>
                                   <p class="has-text-centered custom-line-height mt-4">Please use your email address, and we'll</p>
                                   <p class="has-text-centered custom-line-height">send you the link to reset your password</p>
                               </div>

                               <form @submit.prevent="store">

                                   <div>
                                       <label for="email" class="text-sm font-medium text-gray-700"> Email </label>
                                       <div>
                                           <input id="email" v-model="form.email" name="email" type="text"  class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                           <!--                                           <error-message v-if="v$.form.email.$error" :message="'Email '+v$.form.email.required.$message"/>-->
                                           <span v-if="errors.email" v-text="errors.email"></span>
                                       </div>
                                   </div>




                               <div class="is-flex is-justify-content-center mt-5">
                                   <div class="">
                                       <a href="#" class="is-underlined mb-4" style="color: #3399FD;">I don't have access to my registered email</a>
                                   </div>
                               </div>

                               <div class="" style="margin-top: 20px;">
                                   <div class="is-flex is-justify-content-center">
                                       <button class="button is-link is-rounded" style="background-color: #3399FD; width: 250px;">Next</button>
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
            form : {
                email: '',
            },
        }
    },

    methods:{


         store(){
             Inertia.post(route('resetPassword'), this.form, {
                 onSuccess: (page) => {
                     toaster.show('Email Sent',{
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
