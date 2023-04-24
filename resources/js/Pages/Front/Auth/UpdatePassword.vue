
<template>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <Alert v-if="$page.props.alert.message" :alert="alert"></Alert>
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" @submit.prevent="submit">


                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                        <div class="mt-1">
                            <input id="password" v-model="form.password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            <span v-if="errors.password" v-text="errors.password"></span>
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700"> Confirmation Password </label>
                        <div class="mt-1">
                            <input id="password_confirmation" v-model="form.password_confirmation" name="password_confirmation" type="password" autocomplete="current-password_confirmation" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            <span v-if="errors.password_confirmation" v-text="errors.password_confirmation"></span>
                        </div>
                    </div>



                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Reset</button>
                    </div>
                    <div>
                        <Link :href="route('login')" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

import { Link } from "@inertiajs/inertia-vue3";
import Alert from "../../Components/Alert.vue";

export default {
    data(){
        return{
            form: {
                password: null,
                password_confirmation: null,
            },
        }
    },
    created() {
    },
    props:{
        errors : Object,
        alert: Object,
    },
    methods:{
        submit(){
            console.log(this.form)
            this.$inertia.post(route('updatePassword'), this.form)
        }
    },
    components:{
        Alert,
        Link,
    }

}
</script>
