<template>
    <div class="min-h-full">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
                <Popover class="flex justify-between h-16" v-slot="{ open }">
                    <div class="flex px-2 lg:px-0">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="#">
                                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-blue-600.svg" alt="Workflow" />
                            </a>
                        </div>
                        <nav aria-label="Global" class="hidden lg:ml-6 lg:flex lg:items-center lg:space-x-4">
                            <a v-for="item in navigation" :key="item.name" :href="item.href" class="px-3 py-2 text-gray-900 text-sm font-medium">
                                {{ item.name }}
                            </a>
                        </nav>
                    </div>
                    <div class="flex-1 flex items-center justify-center px-2 lg:ml-6 lg:justify-end">
                        <div class="max-w-lg w-full lg:max-w-xs">
                            <label for="search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                </div>
                                <input id="search" name="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white shadow-sm placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-600 focus:border-blue-600 sm:text-sm" placeholder="Search" type="search" />
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center lg:hidden">
                        <!-- Mobile menu button -->
                        <PopoverButton class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                            <span class="sr-only">Open main menu</span>
                            <MenuIcon class="block h-6 w-6" aria-hidden="true" />
                        </PopoverButton>
                    </div>
                    <TransitionRoot as="template" :show="open">
                        <div class="lg:hidden">
                            <TransitionChild as="template" enter="duration-150 ease-out" enter-from="opacity-0" enter-to="opacity-100" leave="duration-150 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                                <PopoverOverlay class="z-20 fixed inset-0 bg-black bg-opacity-25" aria-hidden="true" />
                            </TransitionChild>

                            <TransitionChild as="template" enter="duration-150 ease-out" enter-from="opacity-0 scale-95" enter-to="opacity-100 scale-100" leave="duration-150 ease-in" leave-from="opacity-100 scale-100" leave-to="opacity-0 scale-95">
                                <PopoverPanel focus class="z-30 absolute top-0 right-0 max-w-none w-full p-2 transition transform origin-top">
                                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
                                        <div class="pt-3 pb-2">
                                            <div class="flex items-center justify-between px-4">
                                                <div>
                                                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-blue-600.svg" alt="Workflow" />
                                                </div>
                                                <div class="-mr-2">
                                                    <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                                                        <span class="sr-only">Close menu</span>
                                                        <XIcon class="h-6 w-6" aria-hidden="true" />
                                                    </PopoverButton>
                                                </div>
                                            </div>
                                            <div class="mt-3 px-2 space-y-1">
                                                <a v-for="item in navigation" :key="item.name" :href="item.href" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ item.name }}</a>
                                            </div>
                                        </div>
                                        <div class="pt-4 pb-2">
                                            <div class="flex items-center px-5">
                                                <div class="flex-shrink-0">
                                                    <img class="h-10 w-10 rounded-full" :src="user.imageUrl" alt="" />
                                                </div>
                                                <div class="ml-3">
                                                    <div class="text-base font-medium text-gray-800">{{ user.name }}</div>
                                                    <div class="text-sm font-medium text-gray-500">{{ user.email }}</div>
                                                </div>
                                                <button type="button" class="ml-auto flex-shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    <span class="sr-only">View notifications</span>
                                                    <BellIcon class="h-6 w-6" aria-hidden="true" />
                                                </button>
                                            </div>
                                            <div class="mt-3 px-2 space-y-1">
                                                <a v-for="item in userNavigation" :key="item.name" :href="item.href" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ item.name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </PopoverPanel>
                            </TransitionChild>
                        </div>
                    </TransitionRoot>
                    <div class="hidden lg:ml-4 lg:flex lg:items-center">
                        <button type="button" class="flex-shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="h-6 w-6" aria-hidden="true" />
                        </button>

                        <!-- Profile dropdown -->
                        <Menu as="div" class="ml-4 relative flex-shrink-0">
                            <div>
                                <MenuButton class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" :src="user.imageUrl" alt="" />
                                </MenuButton>
                            </div>
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                                        <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
                                    </MenuItem>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </Popover>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="border-t border-gray-200 py-3">
                    <nav class="flex" aria-label="Breadcrumb">
                        <div class="flex sm:hidden">
                            <a href="#" class="group inline-flex space-x-3 text-sm font-medium text-gray-500 hover:text-gray-700">
                                <ArrowNarrowLeftIcon class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-600" aria-hidden="true" />
                                <span>Back to Applicants</span>
                            </a>
                        </div>
                        <div class="hidden sm:block">
                            <ol role="list" class="flex items-center space-x-4">
                                <li>
                                    <div>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <HomeIcon class="flex-shrink-0 h-5 w-5" aria-hidden="true" />
                                            <span class="sr-only">Home</span>
                                        </a>
                                    </div>
                                </li>
                                <li v-for="item in breadcrumbs" :key="item.name">
                                    <div class="flex items-center">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                                        </svg>
                                        <a :href="item.href" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</a>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
    </div>
</template>

<script>
import {
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Popover,
    PopoverButton,
    PopoverOverlay,
    PopoverPanel,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import {
    ArrowNarrowLeftIcon,
    CheckIcon,
    HomeIcon,
    PaperClipIcon,
    QuestionMarkCircleIcon,
    SearchIcon,
    ThumbUpIcon,
    UserIcon,
} from '@heroicons/vue/solid'
import { BellIcon, MenuIcon, XIcon } from '@heroicons/vue/outline'

const user = {
    name: 'Whitney Francis',
    email: 'whitney@example.com',
    imageUrl:
        'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80',
}
const navigation = [
    { name: 'Dashboard', href: '#' },
    { name: 'Jobs', href: '#' },
    { name: 'Applicants', href: '#' },
    { name: 'Company', href: '#' },
]
const breadcrumbs = [
    { name: 'Jobs', href: '#', current: false },
    { name: 'Front End Developer', href: '#', current: false },
    { name: 'Applicants', href: '#', current: true },
]
const userNavigation = [
    { name: 'Your Profile', href: '#' },
    { name: 'Settings', href: '#' },
    { name: 'Sign out', href: '#' },
]
const attachments = [
    { name: 'resume_front_end_developer.pdf', href: '#' },
    { name: 'coverletter_front_end_developer.pdf', href: '#' },
]
const eventTypes = {
    applied: { icon: UserIcon, bgColorClass: 'bg-gray-400' },
    advanced: { icon: ThumbUpIcon, bgColorClass: 'bg-blue-500' },
    completed: { icon: CheckIcon, bgColorClass: 'bg-green-500' },
}
const timeline = [
    {
        id: 1,
        type: eventTypes.applied,
        content: 'Applied to',
        target: 'Front End Developer',
        date: 'Sep 20',
        datetime: '2020-09-20',
    },
    {
        id: 2,
        type: eventTypes.advanced,
        content: 'Advanced to phone screening by',
        target: 'Bethany Blake',
        date: 'Sep 22',
        datetime: '2020-09-22',
    },
    {
        id: 3,
        type: eventTypes.completed,
        content: 'Completed phone screening with',
        target: 'Martha Gardner',
        date: 'Sep 28',
        datetime: '2020-09-28',
    },
    {
        id: 4,
        type: eventTypes.advanced,
        content: 'Advanced to interview by',
        target: 'Bethany Blake',
        date: 'Sep 30',
        datetime: '2020-09-30',
    },
    {
        id: 5,
        type: eventTypes.completed,
        content: 'Completed interview with',
        target: 'Katherine Snyder',
        date: 'Oct 4',
        datetime: '2020-10-04',
    },
]
const comments = [
    {
        id: 1,
        name: 'Leslie Alexander',
        date: '4d ago',
        imageId: '1494790108377-be9c29b29330',
        body: 'Ducimus quas delectus ad maxime totam doloribus reiciendis ex. Tempore dolorem maiores. Similique voluptatibus tempore non ut.',
    },
    {
        id: 2,
        name: 'Michael Foster',
        date: '4d ago',
        imageId: '1519244703995-f4e0f30006d5',
        body: 'Et ut autem. Voluptatem eum dolores sint necessitatibus quos. Quis eum qui dolorem accusantium voluptas voluptatem ipsum. Quo facere iusto quia accusamus veniam id explicabo et aut.',
    },
    {
        id: 3,
        name: 'Dries Vincent',
        date: '4d ago',
        imageId: '1506794778202-cad84cf45f1d',
        body: 'Expedita consequatur sit ea voluptas quo ipsam recusandae. Ab sint et voluptatem repudiandae voluptatem et eveniet. Nihil quas consequatur autem. Perferendis rerum et.',
    },
]

export default {
    components: {
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        Popover,
        PopoverButton,
        PopoverOverlay,
        PopoverPanel,
        TransitionChild,
        TransitionRoot,
        ArrowNarrowLeftIcon,
        BellIcon,
        HomeIcon,
        MenuIcon,
        PaperClipIcon,
        QuestionMarkCircleIcon,
        SearchIcon,
        XIcon,
    },
    setup() {
        return {
            user,
            navigation,
            breadcrumbs,
            userNavigation,
            attachments,
            eventTypes,
            timeline,
            comments,
        }
    },
}
</script>
