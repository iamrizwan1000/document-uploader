<template>
    <div class="min-h-full">
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog as="div" class="fixed inset-0 flex z-40 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75" />
                </TransitionChild>
                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-cyan-700">
                        <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                            <div class="absolute top-0 right-0 -mr-12 pt-2">
                                <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                                    <span class="sr-only">Close sidebar</span>
                                    <XIcon class="h-6 w-6 text-white" aria-hidden="true" />
                                </button>
                            </div>
                        </TransitionChild>

                        <nav class="mt-5 flex-shrink-0 h-full divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                            <div class="px-2 space-y-1">
                                <Link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                                    <component :is="item.icon" class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" aria-hidden="true" />
                                    {{ item.name }}
                                </Link>
                            </div>
<!--                            <div class="mt-6 pt-6">-->
<!--                                <div class="px-2 space-y-1">-->
<!--                                    <a v-for="item in secondaryNavigation" :key="item.name" :href="item.href" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">-->
<!--                                        <component :is="item.icon" class="mr-4 h-6 w-6 text-cyan-200" aria-hidden="true" />-->
<!--                                        {{ item.name }}-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                            </div>-->
                        </nav>
                    </div>
                </TransitionChild>
                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-grow bg-cyan-700 pt-5 pb-4 overflow-y-auto">
                <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                    <div class="px-2 space-y-1">
                        <Link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600', 'group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                            <component :is="item.icon" class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" aria-hidden="true" />
                            {{ item.name }}
                        </Link>
                    </div>
<!--                    <div class="mt-6 pt-6">-->
<!--                        <div class="px-2 space-y-1">-->
<!--                            <a v-for="item in secondaryNavigation" :key="item.name" :href="item.href" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">-->
<!--                                <component :is="item.icon" class="mr-4 h-6 w-6 text-cyan-200" aria-hidden="true" />-->
<!--                                {{ item.name }}-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
                </nav>
            </div>
        </div>

        <div class="lg:pl-64 flex flex-col flex-1">
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none">
                <button type="button" class="px-4 border-r border-gray-200 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500 lg:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <MenuAlt1Icon class="h-6 w-6" aria-hidden="true" />
                </button>
                <!-- Search bar -->
                <div class="flex-1 px-4 flex justify-between sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none" aria-hidden="true">
                                    <SearchIcon class="h-5 w-5" aria-hidden="true" />
                                </div>
                                <input id="search-field" name="search-field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Search transactions" type="search" />
                            </div>
                        </form>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <!--                        <button type="button" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">-->
                        <!--                            <span class="sr-only">View notifications</span>-->
                        <!--                            <BellIcon class="h-6 w-6" aria-hidden="true" />-->
                        <!--                        </button>-->

                        <!-- Profile dropdown -->
                        <Menu as="div" class="ml-3 relative">
                            <div>
                                <MenuButton class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 lg:p-2 lg:rounded-md lg:hover:bg-gray-50">
                                    <!--                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />-->
                                    {{user.first_name}} {{user.last_name}}
                                    <span class="hidden ml-3 text-gray-700 text-sm font-medium lg:block"><span class="sr-only">Open user menu for </span></span>
                                    <ChevronDownIcon class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block" aria-hidden="true" />
                                </MenuButton>
                            </div>
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <MenuItem v-slot="{ active }">
                                        <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your Profile</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Settings</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <Link method="post" :href="route('admin.logout')" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Logout</Link>
                                    </MenuItem>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </div>
            </div>
            <main class="flex-1 pb-8">
                <!-- Page header -->
                <slot :user="user" :token="token"></slot>
            </main>
        </div>
    </div>
</template>

<script>
import {ref} from 'vue'
import {Link} from "@inertiajs/inertia-vue3";
import {
    Dialog,
    DialogOverlay,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import {
    BellIcon,
    CogIcon,
    CreditCardIcon,
    DocumentReportIcon,
    HomeIcon,
    MenuAlt1Icon,
    QuestionMarkCircleIcon,
    ScaleIcon,
    ShieldCheckIcon,
    UserGroupIcon,
    XIcon,
} from '@heroicons/vue/outline'
import {
    CashIcon,
    CheckCircleIcon,
    ChevronDownIcon,
    ChevronRightIcon,
    LinkIcon,
    OfficeBuildingIcon,
    SearchIcon,
    VariableIcon,
} from '@heroicons/vue/solid'


const cards = [
    { name: 'Account balance', href: '#', icon: ScaleIcon, amount: '$30,659.45' },
    // More items...
]
const transactions = [
    {
        id: 1,
        name: 'Payment to Molly Sanders',
        href: '#',
        amount: '$20,000',
        currency: 'USD',
        status: 'success',
        date: 'July 11, 2020',
        datetime: '2020-07-11',
    },
    // More transactions...
]
const statusStyles = {
    success: 'bg-green-100 text-green-800',
    processing: 'bg-yellow-100 text-yellow-800',
    failed: 'bg-gray-100 text-gray-800',
}

export default {
    data() {
        return {
            navigation : [
                { name: 'Dashboard', href: route('admin.dashboard'), icon: HomeIcon, current: true },
                // { name: 'Users', href: route('admin.user'), icon: UserGroupIcon, current: false },
            ],
        }
    },
    created() {
        this.navigation.filter(tes => {
            tes.current = false
            if (tes.href === window.location.href){
                tes.current = true;
            }
        })
    },
    components: {
        Dialog,
        Link,
        DialogOverlay,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        TransitionChild,
        TransitionRoot,
        BellIcon,
        CashIcon,
        CheckCircleIcon,
        ChevronDownIcon,
        ChevronRightIcon,
        MenuAlt1Icon,
        OfficeBuildingIcon,
        SearchIcon,
        XIcon,
    },

    computed :{
        user(){
            return this.$page.props.auth.admin[0].data
        },

        token(){
            return this.$page.props.token
        }

    },

    setup() {
        const sidebarOpen = ref(false)

        return {
            cards,
            transactions,
            statusStyles,
            sidebarOpen,
        }
    },
}
</script>
