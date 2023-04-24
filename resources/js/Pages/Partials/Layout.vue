
<template>
    <div class="bg-white">
        <Header></Header>

        <div>
            <!-- Mobile filter dialog -->
            <TransitionRoot as="template" :show="mobileFiltersOpen">
                <Dialog as="div" class="fixed inset-0 flex z-40 lg:hidden" @close="mobileFiltersOpen = false">
                    <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                        <DialogOverlay class="fixed inset-0 bg-black bg-opacity-25" />
                    </TransitionChild>

                    <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="translate-x-full">
                        <div class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-6 flex flex-col overflow-y-auto">
                            <div class="px-4 flex items-center justify-between">
                                <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                                <button type="button" class="-mr-2 w-10 h-10 p-2 flex items-center justify-center text-gray-400 hover:text-gray-500" @click="mobileFiltersOpen = false">
                                    <span class="sr-only">Close menu</span>
                                    <XIcon class="h-6 w-6" aria-hidden="true" />
                                </button>
                            </div>

                            <!-- Filters -->
                            <form class="mt-4">
                                <Disclosure as="div" v-for="section in filters" :key="section.name" class="border-t border-gray-200 pt-4 pb-4" v-slot="{ open }">
                                    <fieldset>
                                        <legend class="w-full px-2">
                                            <DisclosureButton class="w-full p-2 flex items-center justify-between text-gray-400 hover:text-gray-500">
                        <span class="text-sm font-medium text-gray-900">
                          {{ section.name }}
                        </span>
                                                <span class="ml-6 h-7 flex items-center">
                          <ChevronDownIcon :class="[open ? '-rotate-180' : 'rotate-0', 'h-5 w-5 transform']" aria-hidden="true" />
                        </span>
                                            </DisclosureButton>
                                        </legend>
                                        <DisclosurePanel class="pt-4 pb-2 px-4">
                                            <div class="space-y-6">
                                                <div v-for="(option, optionIdx) in section.options" :key="option.value" class="flex items-center">
                                                    <input :id="`${section.id}-${optionIdx}-mobile`" :name="`${section.id}[]`" :value="option.value" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500" />
                                                    <label :for="`${section.id}-${optionIdx}-mobile`" class="ml-3 text-sm text-gray-500">
                                                        {{ option.label }}
                                                    </label>
                                                </div>
                                            </div>
                                        </DisclosurePanel>
                                    </fieldset>
                                </Disclosure>
                            </form>
                        </div>
                    </TransitionChild>
                </Dialog>
            </TransitionRoot>

            <slot />

            <Footer></Footer>
        </div>
    </div>
</template>

<script>
import {ref} from 'vue'
import {
    Dialog,
    DialogOverlay,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
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
import {MenuIcon, SearchIcon, ShoppingBagIcon, XIcon} from '@heroicons/vue/outline'
import {ChevronDownIcon, PlusSmIcon} from '@heroicons/vue/solid'
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import Breadcrumb from "./Breadcrumb.vue";


const filters = [
    {
        id: 'color',
        name: 'Color',
        options: [
            { value: 'white', label: 'White' },
            { value: 'beige', label: 'Beige' },
            { value: 'blue', label: 'Blue' },
            { value: 'brown', label: 'Brown' },
            { value: 'green', label: 'Green' },
            { value: 'purple', label: 'Purple' },
        ],
    },
    {
        id: 'category',
        name: 'Category',
        options: [
            { value: 'new-arrivals', label: 'All New Arrivals' },
            { value: 'tees', label: 'Tees' },
            { value: 'crewnecks', label: 'Crewnecks' },
            { value: 'sweatshirts', label: 'Sweatshirts' },
            { value: 'pants-shorts', label: 'Pants & Shorts' },
        ],
    },
    {
        id: 'sizes',
        name: 'Sizes',
        options: [
            { value: 'xs', label: 'XS' },
            { value: 's', label: 'S' },
            { value: 'm', label: 'M' },
            { value: 'l', label: 'L' },
            { value: 'xl', label: 'XL' },
            { value: '2xl', label: '2XL' },
        ],
    },
]
const products = [
    {
        id: 1,
        name: 'Basic Tee 8-Pack',
        href: '#',
        price: '$256',
        description: 'Get the full lineup of our Basic Tees. Have a fresh shirt all week, and an extra for laundry day.',
        options: '8 colors',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-01.jpg',
        imageAlt: 'Eight shirts arranged on table in black, olive, grey, blue, white, red, mustard, and green.',
    },
    {
        id: 2,
        name: 'Basic Tee',
        href: '#',
        price: '$32',
        description: 'Look like a visionary CEO and wear the same black t-shirt every day.',
        options: 'Black',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-02.jpg',
        imageAlt: 'Front of plain black t-shirt.',
    },
    // More products...
]


export default {
    components: {
        Breadcrumb,
        Footer,
        Header,
        Dialog,
        DialogOverlay,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
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
        ChevronDownIcon,
        MenuIcon,
        PlusSmIcon,
        SearchIcon,
        ShoppingBagIcon,
        XIcon,
    },
    setup() {
        const mobileMenuOpen = ref(false)
        const mobileFiltersOpen = ref(false)

        return {
            filters,
            products,
            mobileMenuOpen,
            mobileFiltersOpen,
        }
    },
}
</script>
