<template>
    <Layout>
        <div class="bg-white">

            <div class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
                <div class=" lg:flex lg:items-center lg:justify-between">

                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-1xl">
                        <span class="block">Documents</span>
                    </h2>
                    <div
                        class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                        <div class="inline-flex rounded-md shadow">
                            <PrimaryButton @click="create">Add More Documents</PrimaryButton>
                        </div>
                    </div>
                </div>
                <div v-if="docs.data.length > 0" class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">


                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        <a v-for="product in docs.data" :key="product.id" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                <img :src="product.image" :alt="product.image" class="h-full w-full object-cover object-center group-hover:opacity-75" />
                            </div>
<!--                            <h3 class="mt-4 text-sm text-gray-700">{{ product.name }}</h3>-->
<!--                            <p class="mt-1 text-lg font-medium text-gray-900">{{ product.price }}</p>-->
                        </a>
                    </div>
                </div>

                <div  v-else class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
                    <div class="bg-white p-10 rounded-xl">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Please Subscribe to see records here</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </Layout>
</template>


<script setup>
import Layout from "../Front/Partials/Layout.vue";
import PrimaryButton from "../Components/PrimaryButton.vue";
import {Inertia} from "@inertiajs/inertia";

function create(){
    Inertia.get(route('user.document.create'))
}
const props = defineProps(['docs'])
const products = [
    {
        id: 1,
        name: 'Earthen Bottle',
        href: '#',
        price: '$48',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
        imageAlt: 'Tall slender porcelain bottle with natural clay textured body and cork stopper.',
    },
    {
        id: 2,
        name: 'Nomad Tumbler',
        href: '#',
        price: '$35',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg',
        imageAlt: 'Olive drab green insulated bottle with flared screw lid and flat top.',
    },
    {
        id: 3,
        name: 'Focus Paper Refill',
        href: '#',
        price: '$89',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg',
        imageAlt: 'Person using a pen to cross a task off a productivity paper card.',
    },
    {
        id: 4,
        name: 'Machined Mechanical Pencil',
        href: '#',
        price: '$35',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg',
        imageAlt: 'Hand holding black machined steel mechanical pencil with brass tip and top.',
    },
    {
        id: 4,
        name: 'Machined Mechanical Pencil',
        href: '#',
        price: '$35',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg',
        imageAlt: 'Hand holding black machined steel mechanical pencil with brass tip and top.',
    },
    // More products...
]
</script>
