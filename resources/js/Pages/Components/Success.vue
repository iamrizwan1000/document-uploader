
<template>

    <div class="min-h-full flex flex-col justify-center py-3 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-14 w-14" :src="route('home')+'/icons/test.png'" alt="Workflow" />
        </div>
    </div>
    <div class="min-h-full flex flex-col justify-center py-3 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-lg m-3">
            <h2 class="text-center text-3xl font-sans font-semibold text-[#111827] pb-2">Verify Your Email</h2>
            <p class="text-center font-sans text-gray-500 pb-2 pt-2">
                We have sent an email to "{{user.email}}" with the verification link.
                Open your email and click on the link to complete your sign up. </p>
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
    props: {
        user : Object,
        success : String,
        message : String,
    }
}
</script>
