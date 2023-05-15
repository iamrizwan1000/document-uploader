<template>


    <div>
        <label for="password" class="text-sm font-medium text-gray-700"> First Name </label>
        <div>
            <input v-bind:value="first_name" v-on:input="$emit('update:first_name', $event.target.value)" type="text" placeholder="first name..." class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            <error-message v-if="v$.form.first_name.$error" :message="'First name '+v$.form.first_name.required.$message"/>
        </div>
    </div>


    <div>
        <label for="password" class="text-sm font-medium text-gray-700"> Last Name </label>
        <div>
            <input v-bind:value="last_name" v-on:input="$emit('update:last_name', $event.target.value)" type="text" placeholder="last name..." class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            <error-message v-if="v$.form.last_name.$error" :message="'Last name '+v$.form.last_name.required.$message"/>
        </div>
    </div>

</template>

<script>
import ErrorMessage from "../../Components/ErrorMessage.vue";

export default {
    components: {ErrorMessage},
    props: {
        v$: String,
        first_name: String,
        last_name: String,
    }
}
</script>

<style scoped>
.card-div{
    height: 100vh;
}
</style>
