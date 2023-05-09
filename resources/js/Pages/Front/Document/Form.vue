<template>
    <Layout>
        <Transition name="fade" mode="out-in" appear>
            <div class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
                <!--            <Breadcrumb class="mb-5"></Breadcrumb>-->
                <div class="mb-8">
                    <h2 class="text-2xl font-sans tracking-tight text-gray-900 sm:text-1xl">
                        <span class="block">Upload Documents</span>
                    </h2>
                </div>
                <div class="bg-white rounded-xl">

                    <div class="min-h-full flex flex-col justify-center py-1 sm:px-6 lg:px-8">
                        <div class="sm:mx-auto sm:w-full sm:max-w-xl">
                            <div class="py-5 px-4 sm:rounded-2xl sm:px-10">
                                <form class="space-y-6" @submit.prevent="submit" autocomplete="off">


                                    <div>
                                        <!--                        <label for="name" class="block text-sm font-medium text-gray-700"> First Name </label>-->
                                        <div class="mt-1">
                                            <input id="name" placeholder="Document Name" v-model="form.name" name="name" type="text" autocomplete="off" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.name" v-text="errors.name"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <!--                        <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>-->
                                        <div class="mt-1">
                                            <input id="description" placeholder="Description" v-model="form.description" name="description" type="text" autocomplete="off"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.description" v-text="errors.description"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <!--                        <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>-->
                                        <div class="mt-1">
                                            <input type="file" class="form-control" v-on:change="onChange">
                                        </div>
                                        <span v-if="errors.file" v-text="errors.file"></span>
                                    </div>



                                    <div class="grid grid-cols-2 gap-4">
                                        <PrimaryButton>Save</PrimaryButton>
                                        <SecondaryButton :type="'button'" @click="cancel">Cancel</SecondaryButton>
                                    </div>



                                </form>
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


const props = defineProps(['user','errors','alert','docs'])

const file = ref();
const form = reactive({
    name: props.docs == undefined ? null : props.docs.data.name,
    description: props.docs == undefined ? null : props.docs.data.description,
    id: props.docs == undefined ? null : props.docs.data.id,
    email: props.docs == undefined ? null : props.docs.data.email,
    isEditAble: props.docs == undefined ? false : true
})

function onChange(e) {
    file.value = e.target.files[0];
}

function submit() {
    props.docs == undefined ? save() : update()
}

function save() {

    let data = new FormData();
    data.append('file', file.value);
    data.append('name', form.name);
    data.append('description', form.description);
    data.append('id', form.id);

    Inertia.post(route('user.document.store'), data,{
        onSuccess: (page) => {
            toaster.show(page.props.alert.message,{
                position:
                    "bottom"
            });
        },
    })
}

function update() {

    let data = new FormData();
    data.append('file', file.value);
    data.append('name', form.name);
    data.append('description', form.description);
    data.append('id', form.id);

    Inertia.post(route('user.document.update'), data,{
        onSuccess: (page) => {
            toaster.show(page.props.alert.message,{
                position:
                    "bottom"
            });
        },
    })
}


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
