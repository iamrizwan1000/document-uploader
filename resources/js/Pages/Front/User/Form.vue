<template>
    <Layout>
        <Transition name="fade" mode="out-in" appear>
            <div class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
                <!--            <Breadcrumb class="mb-5"></Breadcrumb>-->
                <div class="mb-8">
                    <h2 class="text-2xl font-sans tracking-tight text-gray-900 sm:text-1xl">
                        <span class="block">Edit My Profile Info</span>
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
                                            <input id="name" placeholder="First Name" v-model="form.name" name="name" type="text" autocomplete="off" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.name" v-text="errors.name"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <!--                        <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>-->
                                        <div class="mt-1">
                                            <input id="email" placeholder="Email" v-model="form.email" name="email" type="email" autocomplete="off"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.email" v-text="errors.email"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <!--                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>-->
                                        <div class="mt-1">
                                            <input id="password" placeholder="Password" v-model="form.password" name="password" type="password" autocomplete="off"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.password" v-text="errors.password"></span>
                                        </div>
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
import PrimaryButton from "../../Components/PrimaryButton.vue";
import {reactive,ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {toaster} from "../../Toast";
import Breadcrumb from "../../Components/Breadcrumb.vue";
import Combobox from "../../Components/Combobox.vue";
import SecondaryButton from "../../Components/SecondaryButton.vue";


const props = defineProps(['user','errors','alert','roles'])


const form = reactive({
    name: props.user == undefined ? null : props.user.data.name,
    id: props.user == undefined ? null : props.user.data.id,
    email: props.user == undefined ? null : props.user.data.email,
    isEditAble: props.user == undefined ? false : true
})

function submit() {
    Inertia.post(route('user.updateProfile'), form,{
        onSuccess: (page) => {
            toaster.show(page.props.alert.message,{
                position:
                    "bottom"
            });
        },
    })
}

function selectedValue(event){
    form.role_id = event.id
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
