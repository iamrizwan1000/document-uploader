<template>
    <div class="bg-white">
        <!-- Mobile menu -->
        <TransitionRoot as="template" :show="open">
            <Dialog as="div" class="fixed inset-0 flex z-40 lg:hidden" @close="open = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-black bg-opacity-25" />
                </TransitionChild>

                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                    <div class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">
                        <div class="px-4 pt-5 pb-2 flex">
                            <button type="button" class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400" @click="open = false">
                                <span class="sr-only">Close menu</span>
                                <XIcon class="h-6 w-6" aria-hidden="true" />
                            </button>
                        </div>

                        <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                            <div class="flow-root">
                                <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Features</a>
                            </div>
                            <div class="flow-root">
                                <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Pricing</a>
                            </div>
                            <div class="flow-root">
                                <a href="#" class="-m-2 p-2 block font-medium text-gray-900">Contact Us</a>
                            </div>
                        </div>

                    </div>
                </TransitionChild>
            </Dialog>
        </TransitionRoot>

        <header class="relative overflow-hidden">
            <!-- Top navigation -->
            <nav aria-label="Top" class="relative z-20 bg-white bg-opacity-90 backdrop-filter backdrop-blur-xl">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="h-16 flex items-center">
                        <button type="button" class="bg-white p-2 rounded-md text-gray-400 lg:hidden" @click="open = true">
                            <span class="sr-only">Open menu</span>
                            <MenuIcon class="h-6 w-6" aria-hidden="true" />
                        </button>

                        <!-- Logo -->
                        <div class="ml-4 flex lg:ml-0">
                            <a href="#">
                                <span class="sr-only">Workflow</span>
                                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="" />
                            </a>
                        </div>


                        <div class="ml-auto flex items-center">
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Features</a>
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true" />
                                <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Pricing</a>
                                <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Contact Us</a>
                            </div>

                            <div class="hidden lg:ml-8 lg:flex">
                                <PrimaryButton>Try it for Free</PrimaryButton>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero section -->
            <div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 sm:static">
                    <div class="sm:max-w-lg">
                        <h1 class="text-4xl font font-extrabold tracking-tight text-gray-900 sm:text-3xl">SOME TEXT HERE</h1>
                        <p class="mt-4 text-md text-gray-500">LOREM IPSUM
                            DOLORE SIT AMET</p>
                    </div>
                    <div>
                        <div class="mt-10">
                            <!-- Decorative image grid -->
                            <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:max-w-7xl lg:mx-auto lg:w-full">
                                <div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                                    <div class="flex items-center space-x-6 lg:space-x-8">
                                        <div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="w-44 h-64 rounded-lg overflow-hidden sm:opacity-0 lg:opacity-100">
                                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg" alt="" class="w-full h-full object-center object-cover" />
                                            </div>
                                            <div class="w-44 h-64 rounded-lg overflow-hidden">
                                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg" alt="" class="w-full h-full object-center object-cover" />
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="w-44 h-64 rounded-lg overflow-hidden">
                                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg" alt="" class="w-full h-full object-center object-cover" />
                                            </div>
                                            <div class="w-44 h-64 rounded-lg overflow-hidden">
                                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg" alt="" class="w-full h-full object-center object-cover" />
                                            </div>
                                            <div class="w-44 h-64 rounded-lg overflow-hidden">
                                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg" alt="" class="w-full h-full object-center object-cover" />
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 grid grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="w-44 h-64 rounded-lg overflow-hidden">
                                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg" alt="" class="w-full h-full object-center object-cover" />
                                            </div>
                                            <div class="w-44 h-64 rounded-lg overflow-hidden">
                                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg" alt="" class="w-full h-full object-center object-cover" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <PrimaryButton>Try it for Free</PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
                <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20" />
                <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center" />
                <div class="mx-auto max-w-2xl lg:max-w-4xl">
                    <p class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                        Tracking Your Marketing Performance in an Efficient Way
                    </p>
                    <figure class="mt-10">
                        <blockquote class="text-center text-md font-semibold leading-8 text-gray-900 sm:text-1xl sm:leading-9">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                        </blockquote>
                    </figure>
                </div>
            </section>

            <div class="bg-white">
                <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
                    <div class="space-y-12">
                        <ul role="list" class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-4 lg:gap-x-8">
                            <li class="flex items-center justify-center">
                                <h3 class="font-semibold leading-normal text-lg md:max-w-xs">How Click To
                                    makes a difference</h3>
                            </li>
                            <li>
                                <div class="space-y-4">
                                    <div class="aspect-w-3 aspect-h-2">
                                        <img class="object-cover shadow-lg rounded-lg" :src="'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80'" alt="" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="space-y-4">
                                    <div class="aspect-w-3 aspect-h-2">
                                        <img class="object-cover shadow-lg rounded-lg" :src="'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80'" alt="" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="space-y-4">
                                    <div class="aspect-w-3 aspect-h-2">
                                        <img class="object-cover shadow-lg rounded-lg" :src="'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80'" alt="" />
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <section class="pt-24 pb-32 bg-white overflow-hidden">
                <div class="container px-4 mx-auto">
                    <h2 class="text-center mb-28 text-6xl md:text-3xl font-bold font-heading tracking-px-n leading-tight">How Click To Works?</h2>
                    <div class="flex flex-wrap -m-8">
                        <div class="w-full md:w-1/2 lg:w-1/4 p-8">
                            <div class="flex flex-wrap items-center mb-7 -m-2">
                                <div class="w-auto p-2">
                                    <div class="relative w-14 h-14 text-2xl font-bold font-heading bg-indigo-100 rounded-full">
                                        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">1</span>
                                    </div>
                                </div>
                                <div class="flex-1 p-2">
                                    <div class="w-full h-px bg-gray-200"></div>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold leading-normal md:max-w-xs">A complete UI kit for building your business</h3>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/4 p-8">
                            <div class="flex flex-wrap items-center mb-7 -m-2">
                                <div class="w-auto p-2">
                                    <div class="relative w-14 h-14 text-2xl text-white font-bold bg-indigo-600 rounded-full">
                                        <img class="absolute top-0 left-0" src="flaro-assets/images/how-it-works/gradient.svg" alt="">
                                        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">2</span>
                                    </div>
                                </div>
                                <div class="flex-1 p-2">
                                    <div class="w-full h-px bg-gray-200"></div>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold leading-normal md:max-w-xs">A complete UI kit for building your business</h3>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/4 p-8">
                            <div class="flex flex-wrap items-center mb-7 -m-2">
                                <div class="w-auto p-2">
                                    <div class="relative w-14 h-14 text-2xl font-bold font-heading bg-indigo-100 rounded-full">
                                        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">3</span>
                                    </div>
                                </div>
                                <div class="flex-1 p-2">
                                    <div class="w-full h-px bg-gray-200"></div>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold leading-normal md:max-w-xs">A complete UI kit for building your business</h3>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/4 p-8">
                            <div class="flex flex-wrap items-center mb-7 -m-2">
                                <div class="w-auto p-2">
                                    <div class="relative w-14 h-14 text-2xl font-bold font-heading bg-indigo-100 rounded-full">
                                        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">4</span>
                                    </div>
                                </div>
                                <div class="flex-1 p-2">
                                    <div class="w-full h-px bg-gray-200"></div>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold leading-normal md:max-w-xs">A complete UI kit for building your business</h3>
                        </div>
                    </div>
                </div>
            </section>

            <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
                <div class="absolute inset-0">
                    <div class="bg-white h-1/3 sm:h-2/3" />
                </div>
                <div class="relative max-w-7xl mx-auto">
                    <div class="text-center">
                        <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-3xl">How We Make Marketing Different</h2>
                        <p class="mt-3 max-w-2xl mx-auto text-md text-gray-500 sm:mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    </div>
                    <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                        <div v-for="post in posts" :key="post.title" class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                            <div class="flex-shrink-0">
                                <img class="h-48 w-full object-cover" :src="post.imageUrl" alt="" />
                            </div>
                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <a :href="post.href" class="block mt-2">
                                        <p class="text-xl font-semibold text-gray-900">
                                            {{ post.title }}
                                        </p>
                                        <p class="mt-3 text-base text-gray-500">
                                            {{ post.description }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white">
                <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:py-32 lg:px-8 lg:flex lg:items-center">
                    <div class="lg:w-0 lg:flex-1">
                        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-3xl">Lorem ipsum </h2>
                        <p class="mt-3 max-w-3xl text-md text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    </div>
                    <div class="mt-8 lg:mt-0 lg:ml-8">
                        <form class="sm:flex">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input id="email-address" name="email-address" type="email" autocomplete="email" required="" class="w-full px-5 py-3 border border-gray-300 shadow-sm placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs rounded-md" placeholder="Enter your email" />
                            <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                                <button type="submit" class="w-full flex items-center justify-center py-3 px-5 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">SUBSCRIBE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <section class="bg-white overflow-hidden">
                <div class="relative max-w-7xl mx-auto pt-20 pb-12 px-4 sm:px-6 lg:px-8 lg:py-20">
                    <svg class="absolute top-full left-0 transform translate-x-80 -translate-y-24 lg:hidden" width="784" height="404" fill="none" viewBox="0 0 784 404" aria-hidden="true">
                        <defs>
                            <pattern id="e56e3f81-d9c1-4b83-a3ba-0d0ac8c32f32" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="784" height="404" fill="url(#e56e3f81-d9c1-4b83-a3ba-0d0ac8c32f32)" />
                    </svg>

                    <svg class="hidden lg:block absolute right-full top-1/2 transform translate-x-1/2 -translate-y-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784" aria-hidden="true">
                        <defs>
                            <pattern id="56409614-3d62-4985-9a10-7ca758a8f4f0" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="784" fill="url(#56409614-3d62-4985-9a10-7ca758a8f4f0)" />
                    </svg>

                    <div class="relative lg:flex lg:items-center">
                        <div class="hidden lg:block lg:flex-shrink-0">
                            <img class="h-64 w-64 rounded-full xl:h-60 xl:w-60" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                        </div>

                        <div class="relative lg:ml-10">
                            <svg class="absolute top-0 left-0 transform -translate-x-8 -translate-y-24 h-36 w-36 text-indigo-200 opacity-50" stroke="currentColor" fill="none" viewBox="0 0 144 144" aria-hidden="true">
                                <path stroke-width="2" d="M41.485 15C17.753 31.753 1 59.208 1 89.455c0 24.664 14.891 39.09 32.109 39.09 16.287 0 28.386-13.03 28.386-28.387 0-15.356-10.703-26.524-24.663-26.524-2.792 0-6.515.465-7.446.93 2.327-15.821 17.218-34.435 32.11-43.742L41.485 15zm80.04 0c-23.268 16.753-40.02 44.208-40.02 74.455 0 24.664 14.891 39.09 32.109 39.09 15.822 0 28.386-13.03 28.386-28.387 0-15.356-11.168-26.524-25.129-26.524-2.792 0-6.049.465-6.98.93 2.327-15.821 16.753-34.435 31.644-43.742L121.525 15z" />
                            </svg>
                            <blockquote class="relative">
                                <div class="text-2xl leading-9 font-medium text-gray-900">
                                    <p>“Lorem ipsum dolor sit amet, consectetur

                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore.”</p>
                                </div>
                                <footer class="mt-8">
                                    <div class="flex">
                                        <div class="flex-shrink-0 lg:hidden">
                                            <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                        </div>
                                        <div class="ml-4 lg:ml-0">
                                            <div class="text-base font-medium text-gray-900">John Doe</div>
                                            <div class="text-base font-medium text-indigo-600">CEO, Trendin’</div>
                                        </div>
                                    </div>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>

            <div class="max-w-7xl mx-auto py-24 px-4 bg-white sm:px-6 lg:px-8">
                <h2 class=" text-center text-3xl font-extrabold text-gray-900 sm:text-3xl sm:leading-none sm:tracking-tight lg:text-3xl">Choose your pricing plan</h2>
                <p class="text-center mt-6 text-md text-gray-500">Choose an affordable plan that's packed with the best features for engaging your audience, creating customer loyalty, and driving sales.</p>

                <!-- Tiers -->
                <div class="mt-24 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-8">
                    <div v-for="tier in pricing.tiers" :key="tier.title" class="relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm flex flex-col">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">{{ tier.title }}</h3>
                            <p v-if="tier.mostPopular" class="absolute top-0 py-1.5 px-4 bg-indigo-500 rounded-full text-xs font-semibold uppercase tracking-wide text-white transform -translate-y-1/2">Most popular</p>
                            <p class="mt-4 flex items-baseline text-gray-900">
                                <span class="text-5xl font-extrabold tracking-tight">${{ tier.price }}</span>
                                <span class="ml-1 text-xl font-semibold">{{ tier.frequency }}</span>
                            </p>
                            <p class="mt-6 text-gray-500">{{ tier.description }}</p>

                            <!-- Feature list -->
                            <ul role="list" class="mt-6 space-y-6">
                                <li v-for="feature in tier.features" :key="feature" class="flex">
                                    <CheckIcon class="flex-shrink-0 w-6 h-6 text-indigo-500" aria-hidden="true" />
                                    <span class="ml-3 text-gray-500">{{ feature }}</span>
                                </li>
                            </ul>
                        </div>

<!--                        <a href="#" :class="[tier.mostPopular ? 'bg-indigo-500 text-white hover:bg-indigo-600' : 'bg-indigo-50 text-indigo-700 hover:bg-indigo-100', 'mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium']">{{ tier.cta }}</a>-->
                    </div>
                </div>
            </div>

        </main>

        <footer aria-labelledby="footer-heading" class="bg-white">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-20 xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="grid grid-cols-2 gap-8 xl:col-span-2">
                        <div class="space-y-16 md:space-y-0 md:grid md:grid-cols-2 md:gap-8">
                            <div class="ml-4 flex lg:ml-0">
                                <a href="#">
                                    <span class="sr-only">Workflow</span>
                                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="" />
                                </a>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">Product</h3>
                                <ul role="list" class="mt-6 space-y-6">
                                    <li v-for="item in footerNavigation.company" :key="item.name" class="text-sm">
                                        <a :href="item.href" class="text-gray-500 hover:text-gray-600">
                                            {{ item.name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="space-y-16 md:space-y-0 md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">Contact</h3>
                                <ul role="list" class="mt-6 space-y-6">
                                    <li v-for="item in footerNavigation.account" :key="item.name" class="text-sm">
                                        <a :href="item.href" class="text-gray-500 hover:text-gray-600">
                                            {{ item.name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">Follow us</h3>
                                <ul role="list" class="mt-6 space-y-6">
                                    <li v-for="item in footerNavigation.connect" :key="item.name" class="text-sm">
                                        <a :href="item.href" class="text-gray-500 hover:text-gray-600">
                                            {{ item.name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-16 md:mt-16 xl:mt-0">
                        <h3 class="text-sm font-medium text-gray-900">Sign up for our newsletter</h3>
                        <p class="mt-6 text-sm text-gray-500">The latest deals and savings, sent to your inbox weekly.</p>
                        <form class="mt-2 flex sm:max-w-md">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input id="email-address" type="text" autocomplete="email" required="" class="appearance-none min-w-0 w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 text-base text-indigo-500 placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" />
                            <div class="ml-4 flex-shrink-0">
                                <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="border-t border-gray-200 py-10">
                    <p class="text-sm text-gray-500">Copyright &copy; 2023  Company Inc.</p>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import {
    Dialog,
    DialogOverlay,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import { MenuIcon, SearchIcon, ShoppingBagIcon, XIcon } from '@heroicons/vue/outline'
import PrimaryButton from "./Components/PrimaryButton.vue";

import { CheckIcon } from '@heroicons/vue/outline'

const posts = [
    {
        title: 'Multiple Click To Accounts',
        href: '#',
        category: { name: 'Article', href: '#' },
        description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.',
        imageUrl:
            'https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',
    },
    {
        title: 'Subscribe to Short Domains',
        href: '#',
        category: { name: 'Video', href: '#' },
        description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.',
        imageUrl:
            'https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',
    },
    {
        title: 'Create Your Short URLs',
        href: '#',
        category: { name: 'Case Study', href: '#' },
        description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.',
        imageUrl:
            'https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',

    },
]

const pricing = {
    tiers: [
        {
            title: 'Professional',
            price: 49,
            frequency: '/month',
            description: 'The essentials to provide your best work for clients.',
            features: ['Lorem ipsum dolor sit amet, consect', 'Lorem ipsum dolor sit amet, consect', 'Lorem ipsum dolor sit amet, consect', 'Lorem ipsum dolor sit amet, consect'],
            cta: 'Monthly billing',
            mostPopular: false,
        },
        {
            title: 'Enterprise',
            price: 99,
            frequency: '/month',
            description: 'A plan that scales with your rapidly growing business.',
            features: [
                'Lorem ipsum dolor sit amet, consect',
                'Lorem ipsum dolor sit amet, consect',
                'Lorem ipsum dolor sit amet, consect',
                'Lorem ipsum dolor sit amet, consect',
                'Lorem ipsum dolor sit amet, consect',
            ],
            cta: 'Monthly billing',
            mostPopular: true,
        },
        {
            title: 'Premium',
            price: 129,
            frequency: '/month',
            description: 'Dedicated support and infrastructure for your company.',
            features: [
                'Unlimited products',
                'Unlimited subscribers',
                'Lorem ipsum dolor sit amet, consect',
                '1-hour, dedicated support response time',
                'Lorem ipsum dolor sit amet, consect',
                'Lorem ipsum dolor sit amet, consect',
            ],
            cta: 'Monthly billing',
            mostPopular: false,
        },
    ],
}
const favorites = [
    {
        id: 1,
        name: 'Black Basic Tee',
        price: '$32',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-03-favorite-01.jpg',
        imageAlt: "Model wearing women's black cotton crewneck tee.",
    },
    {
        id: 2,
        name: 'Off-White Basic Tee',
        price: '$32',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-03-favorite-02.jpg',
        imageAlt: "Model wearing women's off-white cotton crewneck tee.",
    },
    {
        id: 3,
        name: 'Mountains Artwork Tee',
        price: '$36',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-03-favorite-03.jpg',
        imageAlt:
            "Model wearing women's burgundy red crewneck artwork tee with small white triangle overlapping larger black triangle.",
    },
]
const people = [
    {
        name: 'Lindsay Walton',
        role: 'Front-end Developer',
        imageUrl:
            'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80',
        twitterUrl: '#',
        linkedinUrl: '#',
    },
    // More people...
]
const footerNavigation = {
    shop: [

    ],
    company: [
        { name: 'Lorem ipsum', href: '#' },
        { name: 'Lorem ipsum', href: '#' },
        { name: 'Lorem ipsum', href: '#' },
    ],
    account: [
        { name: 'Lorem ipsum', href: '#' },
        { name: 'Lorem ipsum', href: '#' },
        { name: 'Lorem ipsum', href: '#' },
    ],
    connect: [
        { name: 'Lorem ipsum', href: '#' },
        { name: 'Lorem ipsum', href: '#' },
        { name: 'Lorem ipsum', href: '#' },
    ],
}

const open = ref(false)
</script>
