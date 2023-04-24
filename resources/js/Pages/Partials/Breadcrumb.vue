<template>
    <div class="border-b border-gray-200">
        <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ol role="list" class="flex items-center space-x-4 py-4">
                <li v-for="breadcrumb in breadcrumbs" :key="breadcrumb.id">
                    <div class="flex items-center">
                        <a :href="breadcrumb.href" class="mr-4 text-sm font-medium text-gray-900">
                            {{ breadcrumb.name }}
                        </a>
                        <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-auto text-gray-300">
                            <path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
                        </svg>
                    </div>
                </li>
                <li class="text-sm">
                    <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600"> New Arrivals </a>
                </li>
            </ol>
        </nav>
    </div>
</template>

<script>
import { ref } from 'vue'
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
import { MenuIcon, SearchIcon, ShoppingBagIcon, XIcon } from '@heroicons/vue/outline'
import { ChevronDownIcon, PlusSmIcon } from '@heroicons/vue/solid'
import Header from "./Header.vue";
import Footer from "./Footer.vue";


const breadcrumbs = [{ id: 1, name: 'Men', href: '#' }]


export default {
    components: {
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
            breadcrumbs,
            mobileMenuOpen,
            mobileFiltersOpen,
        }
    },
}
</script>
