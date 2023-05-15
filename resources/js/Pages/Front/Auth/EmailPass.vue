<template>

    <div>
        <label for="password" class="text-sm font-medium text-gray-700"> Email </label>
        <div>
            <input v-bind:value="email" v-on:input="$emit('update:email', $event.target.value)" type="email" placeholder="Email input" class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            <error-message v-if="v$.form.email.$error" :message="'Email '+v$.form.email.$silentErrors[0].$message"/>
        </div>
    </div>

    <div>
        <label for="password" class="text-sm font-medium text-gray-700"> Password </label>
        <div>
            <input v-bind:value="password" v-on:input="$emit('update:password', $event.target.value)" type="password" placeholder="password..." class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            <error-message v-if="v$.form.password.$error" :message="'Password '+v$.form.password.required.$message"/>
        </div>
    </div>


    <div>
        <label for="password" class="text-sm font-medium text-gray-700"> Confirm Password </label>
        <div>
            <input v-bind:value="password_confirmation" v-on:input="$emit('update:password_confirmation', $event.target.value)" type="password" placeholder="password..." class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            <error-message v-if="v$.form.password_confirmation.$error" :message="'Password '+v$.form.password_confirmation.sameAs.$message"/>
        </div>
    </div>




</template>

<script>
import ErrorMessage from "../../Components/ErrorMessage.vue";
export default {
    components: {ErrorMessage},
    props: {
        v$: String,
        email: String,
        password: String,
        password_confirmation: String
    }
}
</script>

<style scoped>

</style>
