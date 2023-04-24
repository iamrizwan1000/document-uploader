<template>
    <Layout>
        <Transition name="fade" mode="out-in" appear>
            <div class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
                <!--            <Breadcrumb class="mb-5"></Breadcrumb>-->
                <div class="mb-8">
                    <h2 class="text-2xl font-sans tracking-tight text-gray-900 sm:text-1xl">
                        <span class="block" v-if="form.isEditAble">Edit user</span>
                        <span class="block" v-else>Create new user</span>
                    </h2>
                </div>
                <div class="bg-white rounded-xl">

                    <div class="min-h-full flex flex-col justify-center py-1 sm:px-6 lg:px-8">
                        <div class="sm:mx-auto sm:w-full sm:max-w-xl">
                            <div class="py-5 px-4 sm:rounded-2xl sm:px-10">
                                <form class="space-y-6" @submit.prevent="submit" autocomplete="off">


                                    <div>
                                        <!--                        <label for="first_name" class="block text-sm font-medium text-gray-700"> First Name </label>-->
                                        <div class="mt-1">
                                            <input id="first_name" placeholder="First Name" v-model="form.first_name" name="first_name" type="text" autocomplete="first_name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.first_name" v-text="errors.first_name"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <!--                        <label for="name" class="block text-sm font-medium text-gray-700"> Last Name </label>-->
                                        <div class="mt-1">
                                            <input id="last_name" placeholder="Last Name" v-model="form.last_name" name="last_name" type="text" autocomplete="last_name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.last_name" v-text="errors.last_name"></span>
                                        </div>
                                    </div>
                                    <div>
                                        <!--                        <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>-->
                                        <div class="mt-1">
                                            <input id="email" placeholder="Email" v-model="form.email" name="email" type="email" autocomplete="email"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.email" v-text="errors.email"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <!--                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>-->
                                        <div class="mt-1">
                                            <input id="password" placeholder="Password" v-model="form.password" name="password" type="password" autocomplete="current-password"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.password" v-text="errors.password"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <!--                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>-->
                                        <div class="mt-1">
                                            <input id="linkedin" placeholder="LinkedIn Profile Link" v-model="form.linkedin" name="linkedin" type="text" autocomplete="linkedin"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.linkedin" v-text="errors.linkedin"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <!--                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>-->
                                        <div class="mt-1">
                                            <input id="company" placeholder="Company Name" v-model="form.company" name="company" type="text" autocomplete="current-password"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            <span v-if="errors.company" v-text="errors.company"></span>
                                        </div>
                                    </div>

                                    <div>
                                        <!--                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>-->
                                        <div class="mt-1">
                                            <Combobox @selectedValue="selectedValue" :placeholder="'Select Date'" :selectedId="form.role_id" :data="roles.data"></Combobox>
                                            <!--                                            <Combobox @selectedValue="selectedValue" :selectedId="form.role_id" :data="roles.data"></Combobox>-->
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <PrimaryButton>Save</PrimaryButton>
                                        <SecondaryButton>Cancel</SecondaryButton>
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
import Layout from "../Partials/Layout.vue";
import PrimaryButton from "../../Components/PrimaryButton.vue";
import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {toaster} from "../../Toast";
import Combobox from "../../Components/Combobox.vue";
import SecondaryButton from "../../Components/SecondaryButton.vue";


const props = defineProps(['user','errors','alert','roles','token'])


const form = reactive({
    first_name: props.user == undefined ? null : props.user.data.first_name,
    id: props.user == undefined ? null : props.user.data.id,
    last_name: props.user == undefined ? null : props.user.data.last_name,
    email: props.user == undefined ? null : props.user.data.email,
    linkedin: props.user == undefined ? null : props.user.data.linkedin,
    company: props.user == undefined ? null : props.user.data.company,
    role_id: props.user == undefined ? 1 : props.user.data.role.id,
    isEditAble: props.user == undefined ? false : true
})

function submit() {
    form.isEditAble === true ? update() : save()
}

function save() {
    Inertia.post(route('admin.user.adminCreateuserForFrontEnd',{token: props.token}), form,{
        onSuccess: (page) => {
            toaster.show(page.props.alert.message,{
                position:
                    "bottom"
            });
        },
    })
}

function update() {
    Inertia.post(route('admin.user.update',{token: props.token}), form,{
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
    Inertia.get(route('account'))
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
