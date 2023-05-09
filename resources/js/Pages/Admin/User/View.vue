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

                <div class="bg-white rounded-xl mt-5">
                    <div v-if="doc.data.length > 0" class="mx-auto max-w-2xl px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">


                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-1 xl:gap-x-8">
                            <a v-for="docs in doc.data" :key="docs.id" class="group" style="height: 600px">
                                <iframe :src="docs.image" frameborder="0" class="h-full w-full object-cover object-center group-hover:opacity-75"></iframe>
                            </a>

                        </div>
                    </div>

                    <div  v-else class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
                        <div class="bg-white p-10 rounded-xl">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No Documents are uploaded</h3>
                            </div>
                        </div>
                    </div>

                </div>

<!--                <div class="bg-white rounded-xl">-->

<!--                    <div class="min-h-full flex flex-col justify-center py-1 sm:px-6 lg:px-8">-->
<!--                        <div class="sm:mx-auto sm:w-full sm:max-w-xl">-->
<!--                            <div v-for="docs in doc.data" class="py-5 px-4 sm:rounded-2xl sm:px-10">-->
<!--                                <iframe :src="docs.image" frameborder="0" style="width:100%;min-height:640px;"></iframe>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </Transition>
    </Layout>
</template>
<script setup>
import Layout from "../Partials/Layout.vue";
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
