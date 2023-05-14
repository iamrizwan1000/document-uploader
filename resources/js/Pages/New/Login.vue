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
                               <form @submit.prevent="store">

                                   <div>
                                       <label for="email" class="text-sm font-medium text-gray-700"> Email </label>
                                       <div>
                                           <input id="email" v-model="form.email" name="email" type="text"  class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
<!--                                           <error-message v-if="v$.form.email.$error" :message="'Email '+v$.form.email.required.$message"/>-->
                                           <span v-if="errors.email" v-text="errors.email"></span>
                                       </div>
                                   </div>

                                   <div>
                                       <label for="password" class="text-sm font-medium text-gray-700"> Password </label>
                                       <div>
                                           <input id="password" v-model="form.password" name="password" type="password"  class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
<!--                                           <error-message v-if="v$.form.password.$error" :message="'Password '+v$.form.password.required.$message"/>-->
                                           <span v-if="errors.password" v-text="errors.password"></span>
                                       </div>
                                   </div>

                                   <div class="is-flex">
                                       <div class="ml-auto">
                                           <Link :href="route('forgotPassword')" class="has-text-grey is-underlined mb-4">Forgot Password</Link>
                                       </div>
                                   </div>
                                   <div>
                                       <p class="has-text-centered mt-5">or sign-in with google or Facebook</p>
                                       <div class="is-flex is-justify-content-center">
                                           <div class="mr-3">
                                               <img width="40" class="mr-2" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIUAAACFCAMAAABCBMsOAAABFFBMVEX////lQzU0o1NCgO/2twQ7fe9rl/FLh/DlQTOIqvP2tQDkPC0soU7kNiXkMyH+9eX2sQAzee7D1PkAmDb87ezjHgD52tjjLxvjJw7U6dkgnkbp9Oz+9fT0urbreHD75+b40tD//ff4xFT86ML3vj33wUr3uiv4y2z979P63J785rfg6fzO2/rz+fW53MLy9v6hz6xgs3Xvkovpa2LnVEn2xcLtiIHwnJfzr6voXlTxpqHrdSrjMTT50HfwkzHynyPmUznpZDbtgjT51Yj3xq6hu/VfkPHY37ncuDBCqWN3oPPFtz+csUl2vIdgrFjPtjWwtkt+r1QbcO1Jmq9An4g2oGdHidxFkr48mo9JkcxAmZuGw5X4oENiAAAEcElEQVR4nO2YfXfaNhSHjTCJY8sGypsRr2m2rF0KwYGEJGvXbm3aui3tlq3bOr7/95hscLBlGWxZNufs6Pkj5ySxwnPu715JjiQJBAKBQCAQCAQCgSAN9cFgUN/bp3eHvYup1mg0TNPEX5XpRa/ZzVeh3uvPNEPXlIKHoumGMutf5leWXl9vacrG4MFE0UzlapiHwmDuKIQMNjUxC72sk6nPNT1aYS2iz7L1uJ4Zuxxcj9ZNMzOH5k0rjoODZl5kJHGrazEdHPRZJuXoxwrDVw6tx91hMNMTORSc7phzlhgWkqThaTSGXCWaiVrCk+AcSXPLNhVNg7cESyXMS64S3dk2CcWB8mOd84T0o6ZD0YyWaWh4GMyWHgxNaV3zlbg16Qq6OXu4UnSH11ea75DjHYc0pHamoheuiEtN93LqTZJi8N6wqE2hGfMB5dnmjbu/KgbnOKS5QSlEqx91peoVdBwH70rUKaeopmz5lO7UaHE/Py7C86EVaGFsuLrlLVH+6Tkpoc9yvmlL0gv550IwEu0md4myLMsvX/k1FCX/N6CnKtao/LJJRTGGuUtIsmMhy78+98rR4t55uylX5BUvvaaY5t4U60BcKq/cVMxh/hLHjx8sZNkZWa2fv4RU9knIzsjuozWlk4rfAo9sYQ8S0uughVx5sw+Lx2rQQn5Cf+7uIA5HbBLH3wUt1O+P6Q8eVUu7qb5lsyifEhY/RDx4VCrG4PCcyeIJkUflaSqL4hmbBdEWlZNUFqVnTBYnpEVEc2Zr8SNpUU5lUX0kLB4SYbPg3RdsFqFJTTcjjIlw3i8YZ4Tz3llks4h/jmS5d8Y+UzM9R8j7hSq/i7AoHlIg24LxTCXuWup7YCdZfRCsUOkDo0Xg3ql+BAC14y8+I4pRvWO08N3BVfUTAAAu4i9+Vg1a3LONCOa1Z6GefgYOtfjF+EC0bIlxRPC+tW4M9YvtSgBoxV16RpSidMAq4b2nqr8BDzSJuZKcXua2kFaviOrp72BDzAYlS1G8Zw7E/f+F+v6zTwJAMIqx7vyA7IpDdglJelH5CIIgK4bGEVmKNIHgYnyCILnGHSnBfIisWYYsALQ7SSWqrBvnmg4KWeDeGG9ZcR6KA1swb1lrJhQNgJaRqbT/uA8dscxnyAY7nAkuB5xQY2lbCP35NtSb6brC/cM0C1wOO+QxGlsQP4y+/hXUqDK+rgeY1KgaACFr2fZMRu3JAqGVMER/+zVKRcb7TZAFrTVWuaAaArZtYyMEfTWr/VPcNAfj5ZtkRG0Nn0v4175UuOTh0KZ8zg6g/W2lwXzTo2kktcCp/FsqcWuKtQZK7oFHFnukH1K/BmDQ+PqNw04RoGNHTcoWDcRZQtoysJEScS4BiZkkG5Uth00qkqSC4LaDNx0TEM8DZlWIFZ0l3O0BoZXgLY7NYwK3bh74bFlk7eAyXkSJYAWLfvPIgs54YUMUUHG/tSbtLPshzKg9Xlqw5gGt5bidWxVCMqMOZl+fLhAIBAKBQCAQCAT/C/4Dc4hzPPfpooQAAAAASUVORK5CYII=" alt="Google Icon">
                                           </div>
                                           <div>
                                               <img width="35" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAAB6CAMAAABHh7fWAAAAclBMVEX///87WZnn7vIdRIwzUpKkrcPi6O1+kbkrTpX///vt8/bR1eMUPoguUZI0VJf///19jbk7Wpb2+vfR2OGntMqAj7JTa5sAOIhIYZg3VJrv8ffFzdtcc6T19vp4irA9WpHb4Olsfamyvc+OnLxje6yWpL7d4xhgAAABzElEQVRoge3a3XKCMBAF4CBRA2JipBQp4k9r3/8Vi9W2CAkOM9mkF+dcecU3CbDZHWEMQRAEQcJGJSxRt5/bdPEYpej9Jn8pXjWXopKdlG+U5veyVsVOCFFFkY4ekr1Rrrq9dr2/qqZkaUJJN4fMAtPSii2OQtpkSlqxE6+0VSZd9SyyL5mSbp+wMx+TKelajOw2Id1Wqt0oTHmv8zgYXYhQtIrH7zQh/XS/6ej5s/2mowtbOeE/KVMamV2MtDjuz5t7zkR0ow3lW+7q7hGd0LQp6dqw5iOF1I9qDE+ZeL/3LbT0bPhuyfXJA62YkW6oXSvNfdDMREfciwwadChahqNJV739nZ1zQw3nvfm6cVlWV0Ly9TXcMOTpdqZed1LOXBb01ch0F/XHoHjrlDad0tY4Pcam0HIfjj4wlx3pJPojGF3NnXaFU+hrpxaIjutgdLYIR7vt1CZtuFN5Eq2D0fwSjJZLt3Qe3w9EaTzBqs6RGX+6pU+H5S3FZmjrqlj+ZeP2te4kHTZIutebEU1+pkkz4h7+cGCWthA0aNCgQYMGDRo0aNCgQYMGDRo0aNCgQZPTpRgk9kOnc0P80P8sysfH/zenFy8sgiDGfAHsxiO84dH+CAAAAABJRU5ErkJggg==" alt="Facebook Icon">
                                           </div>
                                       </div>
                                   </div>

                                   <div class="is-flex is-justify-content-center">
                                       <div class="">
                                           <Link :href="route('register')" class="is-underlined mb-4" style="color: #3399FD;">Register a new account</Link>
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
            form : {
                email: '',
                password: ''
            },
        }
    },

    methods:{


         store(){
             Inertia.post(route('login'), this.form, {
                 onSuccess: (page) => {
                     toaster.show(page.props.alert.message,{
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
