<template>
    <Layout>
        <Transition name="fade" mode="out-in" appear>
            <div class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
                <!--            <Breadcrumb class="mb-5"></Breadcrumb>-->
                <div class="mb-8">
                    <h2 class="text-2xl font-sans tracking-tight text-gray-900 sm:text-1xl">
                        <span class="block">Uploaded Documents</span>
                    </h2>
                </div>
                <div class="bg-white rounded-xl">

                    <div class="min-h-full flex flex-col justify-center py-1 sm:px-6 lg:px-8">
                        <div class="sm:mx-auto sm:w-full sm:max-w-xl">
                            <div class="py-5 px-4 sm:rounded-2xl sm:px-10">
                                <iframe :src="doc.data.image" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </Layout>
</template>
<script setup>
import Layout from "../../Front/Partials/Layout.vue";
import Uploader from "vue-media-upload";
import PrimaryButton from "../../Components/PrimaryButton.vue";
import {reactive,ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {toaster} from "../../Toast";
import SecondaryButton from "../../Components/SecondaryButton.vue";


const props = defineProps(['user','errors','alert','doc'])




function cancel(){
    window.location = route('account.account')
}



</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 1.15s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
