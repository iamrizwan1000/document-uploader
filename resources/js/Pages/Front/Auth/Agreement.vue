<template>

                <div class="p-4">
                    <p style="color: #767C90;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi, quo. Tenetur earum error ad officia voluptatum! Mollitia quos architecto dolore!</p>
                    <p style="color: #767C90;" class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut reprehenderit mollitia, cum modi accusantium quidem quibusdam quos. Eligendi, nemo repudiandae.</p>
                    <p style="color: #767C90;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus libero minus tempora, ad eos modi nulla obcaecati vel incidunt eligendi!</p>
                    <div class="field mt-4">
                        <div class="control">
                            <label class="checkbox">
                                <input class="border"
                                       v-bind:checked="agreement"
                                       v-on:change="$emit('update:agreement', $event.target.checked)"
                                       type="checkbox">
                                I agree to the terms outlined above
                            </label>
                        </div>
                        <error-message v-if="agreement === false" :message="'Please accept agreement'"/>
                    </div>
                </div>



</template>

<script>
import ErrorMessage from "../../Components/ErrorMessage.vue";
export default {
    components: {ErrorMessage},
    props: {
        v$: String,
        agreement: Boolean,
    },
}
</script>

<style scoped>

</style>
