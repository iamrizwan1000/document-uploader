
<template>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-xl">
            <div class="bg-white py-5 px-4 shadow sm:rounded-2xl sm:px-10">
                <div class="sm:mx-auto sm:w-full sm:max-w-lg m-3">
                    <h2 class="text-center text-3xl font-sans font-semibold text-[#111827] pb-2">Sign up</h2>
                </div>
                <form class="space-y-6" @submit.prevent="submit">

                    <div>
                        <!--                        <label for="name" class="block text-sm font-medium text-gray-700"> First Name </label>-->
                        <div class="mt-1">
                            <input id="name" placeholder="Name" v-model="form.name" name="name" type="text" autocomplete="name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            <span v-if="errors.name" v-text="errors.name"></span>
                        </div>
                    </div>

                    <div>
                        <!--                        <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>-->
                        <div class="mt-1">
                            <input id="email" placeholder="Email" v-model="form.email" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            <span v-if="errors.email" v-text="errors.email"></span>
                        </div>
                    </div>

                    <div>
                        <!--                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>-->
                        <div class="mt-1">
                            <input id="password" placeholder="Password" v-model="form.password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            <span v-if="errors.password" v-text="errors.password"></span>
                        </div>
                    </div>

                    <div class="sm:mx-auto sm:w-full sm:max-w-lg">
                        <p class="text-center font-sans text-gray-500">By signing up, you agree to the Terms of Service and Privacy Policy</p>
                    </div>
                    <div class="text-center">
                        <button type="submit" class=" justify-center py-3 px-12 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign up</button>
                    </div>
                    <div class="sm:mx-auto sm:w-full sm:max-w-lg">
                        <p class="text-center font-sans text-gray-500">Already have an account? <Link :href="route('login')" class="text-indigo-500">Login</Link></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

import {Link} from "@inertiajs/inertia-vue3";

export default {
    data(){
        return{
            form: {
                name: null,
                email: null,
                password: null,
            },
        }
    },
    props:{
        errors : Object
    },
    methods:{
        submit(){
            console.log(this.form)
            this.$inertia.post(route('register'), this.form)
        }
    },
    components:{
        Link,
    }

}
</script>
