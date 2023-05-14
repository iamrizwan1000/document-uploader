<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <Layout v-slot="slotProps">

        <Transition name="fade" mode="out-in" appear>
            <div class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
                <div class=" lg:flex lg:items-center lg:justify-between">

                    <h2 class="text-2xl font-sans tracking-tight text-gray-900 sm:text-1xl">
                        <span class="block">  Users </span>
                    </h2>
                    <div
                        class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                        <div class="inline-flex rounded-md shadow">
                            <!--                        <PrimaryButton @click="create">Add More Documents</PrimaryButton>-->
                        </div>
                    </div>
                </div>


            <div v-if="users.data.length > 0" class="bg-white rounded-xl">
                <div class="flex flex-col mt-5">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-white">
                                    <tr class="pt-3">
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">view docs</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">actions</th>


                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr v-for="user in users.data" :key="user.id" :class="[index % 2 === 0 ? 'bg-white' : 'bg-gray-50']">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                            {{user.first_name}} {{user.last_name}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{user.email}}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <Link class="text-indigo-500" :href="route('admin.user.view',{  id: user.id })">
                                                view
                                            </Link>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center h-5">
                                                <Link class="text-indigo-500" :href="route('admin.user.profile',{  id: user.id })">
                                                    Edit
                                                </Link>
<!--                                                <button  @click="destroy(user.id)" class="text-indigo-500 p-1">Remove</button>-->
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                    <div class="flex flex-1 justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                        <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing
                                {{ ' ' }}
                                <span class="font-medium">{{users.from}}</span>
                                {{ ' ' }}
                                to
                                {{ ' ' }}
                                <span class="font-medium">{{users.to}}</span>
                                {{ ' ' }}
                                of
                                {{ ' ' }}
                                <span class="font-medium">{{users.total}}</span>
                                {{ ' ' }}
                                results
                            </p>
                        </div>
                        <div>
                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-lg" aria-label="Pagination">
                                <Link class="px-4 py-2 text-sm" v-for="link in users.links"
                                      :class="{'text-gray-600' : !link.url, 'bg-indigo-50': link.active}" :href="link.url" v-html="link.label">
                                </Link>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </Transition>
        <DeleteConfirmation v-if="show" @close="show = false" @delete="deletes(id)"></DeleteConfirmation>
    </Layout>
</template>

<script setup>
import Layout from "../Partials/Layout.vue";
import {Link} from '@inertiajs/inertia-vue3'
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import DeleteConfirmation from "../../Components/DeleteConfirmation.vue";


const props = defineProps(['errors','users'])

const show = ref(false)


const id = ref()



function create(){
    Inertia.get(route('admin.user.create'))
}


function destroy(id) {
    show.value = true
    this.id = id
}

function deletes(id){
    Inertia.post(route('admin.user.delete',{ id : id}),'',{
        preserveScroll: true
    })
    show.value = false
}

function active(id){
    Inertia.post(route('admin.user.active',{ id : id}),'',{
        preserveScroll: true
    })
    show.value = false
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
