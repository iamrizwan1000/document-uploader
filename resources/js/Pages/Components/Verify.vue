
<template>
    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
<!--        <div class="sm:mx-auto sm:w-full sm:max-w-md">-->
<!--            <img class="mx-auto h-10 w-auto" :src="route('home')+'/logo/.png'" alt="Workflow" />-->
<!--        </div>-->

    </div>

    <div class="min-h-full flex flex-col justify-center py-3 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-14 w-14" :src="route('home')+'/icons/congrates.png'" alt="Workflow" />
        </div>
    </div>
    <div class="min-h-full flex flex-col justify-center py-3 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-lg m-3">
            <h2 class="text-center text-3xl font-sans font-semibold text-[#111827] pb-2">Congratulation!</h2>
            <p class="text-center font-sans text-gray-500 pb-2 pt-2">
                We have sent an link to your email to reset your Password.  </p>

            <div class="text-center">
<!--                <button type="submit" @click="jumpToDashboard" class=" justify-center py-3 px-12 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Jump to Login</button>-->
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    name: "Success",
    components:{
        Link
    },
    methods:{
        jumpToDashboard(){
            console.log(this)
            this.$inertia.post(route('jumpToDashboard', { token : this.token }))
        }
    },
    props: {
        user : Object,
        token : String,
        success : String,
        message : String,
    }
}
</script>
