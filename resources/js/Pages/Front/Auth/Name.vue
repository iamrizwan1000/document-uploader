<template>

                    <div class="field">
                        <label class="label">First Name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input v-bind:value="first_name" v-on:input="$emit('update:first_name', $event.target.value)" class="input" type="text" placeholder="first name..." value="">
                            <error-message v-if="v$.form.first_name.$error" :message="'First name '+v$.form.first_name.required.$message"/>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                              </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Last Name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input v-bind:value="last_name" v-on:input="$emit('update:last_name', $event.target.value)" class="input" type="text" placeholder="last name..." value="">
                            <error-message v-if="v$.form.last_name.$error" :message="'Last name '+v$.form.last_name.required.$message"/>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
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
