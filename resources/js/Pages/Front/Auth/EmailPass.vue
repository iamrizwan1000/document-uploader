<template>

    <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input" v-bind:value="email" v-on:input="$emit('update:email', $event.target.value)" type="email" placeholder="Email input" value="">
            <error-message v-if="v$.form.email.$error" :message="'Email '+v$.form.email.$silentErrors[0].$message"/>

            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                              </span>
        </div>
    </div>

    <div class="field">
        <label class="label">Password</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input" v-bind:value="password" v-on:input="$emit('update:password', $event.target.value)" type="password" placeholder="password..." value="">
            <error-message v-if="v$.form.password.$error" :message="'Password '+v$.form.password.required.$message"/>
            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                              </span>
        </div>
    </div>

    <div class="field">
        <label class="label">Confirm Password</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input" v-bind:value="password_confirmation" v-on:input="$emit('update:password_confirmation', $event.target.value)" type="password" placeholder="password..." value="">
            <error-message v-if="v$.form.password_confirmation.$error" :message="'Password '+v$.form.password_confirmation.sameAs.$message"/>
            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                              </span>
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
