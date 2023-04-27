<template>
    <Layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
            <div class=" lg:flex lg:items-center lg:justify-between">

                <h2 class="text-2xl font-sans tracking-tight text-gray-900 sm:text-1xl">
                    <span class="block">Documents</span>
                </h2>
                <div
                    class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                    <div class="inline-flex rounded-md shadow">
                        <PrimaryButton @click="create">Add Documents</PrimaryButton>
                    </div>
                </div>
            </div>


            <div v-if="docs.data.length > 0" class="bg-white rounded-xl">
                <div class="flex flex-col mt-5">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-white">
                                    <tr class="pt-3">
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">view docs</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">actions</th>


                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr v-for="(doc, index) in docs.data" :key="doc.id" :class="[index % 2 === 0 ? 'bg-white' : 'bg-gray-50']">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                            {{doc.name}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{doc.description}}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <Link v-if="doc.extension === 'xlsx' || doc.extension === 'xls' || doc.extension === 'csv'"
                                                  class="text-indigo-500" :href="route('user.document.view',{  id: doc.id })">
                                                download
                                            </Link>

                                            <Link v-else
                                                  class="text-indigo-500" :href="route('user.document.view',{  id: doc.id })">
                                                view
                                            </Link>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center h-5">
                                                <Link class="text-indigo-500" :href="route('user.document.edit',{  id: doc.id })">
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
                                <span class="font-medium">{{docs.from}}</span>
                                {{ ' ' }}
                                to
                                {{ ' ' }}
                                <span class="font-medium">{{docs.to}}</span>
                                {{ ' ' }}
                                of
                                {{ ' ' }}
                                <span class="font-medium">{{docs.total}}</span>
                                {{ ' ' }}
                                results
                            </p>
                        </div>
                        <div>
                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-lg" aria-label="Pagination">
                                <Link class="px-4 py-2 text-sm" v-for="link in docs.links"
                                      :class="{'text-gray-600' : !link.url, 'bg-indigo-50': link.active}" :href="link.url" v-html="link.label">
                                </Link>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

<!--            <div class="bg-white rounded-xl mt-5">-->
<!--            <div v-if="docs.data.length > 0" class="mx-auto max-w-2xl px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">-->


<!--                <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">-->
<!--                    <a v-for="product in docs.data" :key="product.id" class="group">-->
<!--                        <div v-viewer  class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">-->
<!--                            <img :key="product" :src="product.image" class="h-full w-full object-cover object-center group-hover:opacity-75" />-->
<!--                        </div>-->


<!--                                                    <h3 class="mt-4 text-sm text-gray-700">{{ product.name }}</h3>-->
<!--                                                    <p class="mt-1 text-lg font-medium text-gray-900">{{ product.price }}</p>-->
<!--                    </a>-->

<!--                </div>-->
<!--            </div>-->

<!--            <div  v-else class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">-->
<!--                <div class="bg-white p-10 rounded-xl">-->
<!--                    <div class="text-center">-->
<!--                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />-->
<!--                        </svg>-->
<!--                        <h3 class="mt-2 text-sm font-medium text-gray-900">No documents are uploaded</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            </div>-->
        </div>
    </Layout>
</template>


<script setup>
import Layout from "../Front/Partials/Layout.vue";
import {Link} from '@inertiajs/inertia-vue3'
import PrimaryButton from "../Components/PrimaryButton.vue";
import {Inertia} from "@inertiajs/inertia";

function create(){
    Inertia.get(route('user.document.create'))
}

function show() {
    this.$viewerApi({
        images: this.images,
    })
};
const props = defineProps(['docs'])

</script>
