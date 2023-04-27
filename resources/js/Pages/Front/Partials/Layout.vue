
<template>
    <div class="min-h-full">
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog as="div" class="fixed inset-0 flex z-40 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75" />
                </TransitionChild>
                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                        <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                            <div class="absolute top-0 right-0 -mr-12 pt-2">
                                <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                                    <span class="sr-only">Close sidebar</span>
                                    <XIcon class="h-6 w-6 text-white" aria-hidden="true" />
                                </button>
                            </div>
                        </TransitionChild>
                        <div class="mt-5 flex-1 h-0 overflow-y-auto">
                            <nav class="px-2">

                                <div class="space-y-1 mb-3">
                                    <Link v-for="item in navigationFirst" :key="item.name" :href="item.href" :class="[item.current ? ' text-indigo-500' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                            <span class="flex w-full justify-between items-center">
                                <span class="flex min-w-0 items-center justify-between space-x-3">
                                  <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.8703 6.79883L25.3766 6.79883C27.7395 6.79883 28.921 6.79883 29.655 7.5329C30.3891 8.26697 30.3891 9.44844 30.3891 11.8114L30.3891 30.9217L31.6422 30.9217C32.1613 30.9217 32.5821 31.3425 32.5821 31.8616C32.5821 32.3806 32.1613 32.8014 31.6422 32.8014L6.5795 32.8014C6.06044 32.8014 5.63965 32.3806 5.63965 31.8616C5.63965 31.3425 6.06044 30.9217 6.5795 30.9217L7.83264 30.9217L7.83264 15.5708C7.83264 13.2079 7.83264 12.0264 8.56671 11.2923C9.30078 10.5582 10.4823 10.5582 12.8452 10.5582L17.8577 10.5582C20.2207 10.5582 21.4021 10.5582 22.1362 11.2923C22.8703 12.0264 22.8703 13.2079 22.8703 15.5708L22.8703 30.9217L24.75 30.9217L24.75 15.5708L24.75 15.4586C24.7501 14.3739 24.7502 13.3793 24.6415 12.5703C24.5217 11.6793 24.2399 10.7377 23.4654 9.96316C22.6909 9.18866 21.7492 8.90684 20.8583 8.78705C20.0606 8.67981 19.0826 8.67842 18.0156 8.67852C18.1213 8.19325 18.2976 7.82713 18.5918 7.5329C19.3259 6.79883 20.5073 6.79883 22.8703 6.79883ZM10.6522 14.3177C10.6522 13.7986 11.073 13.3778 11.5921 13.3778L19.1109 13.3778C19.6299 13.3778 20.0507 13.7986 20.0507 14.3177C20.0507 14.8367 19.6299 15.2575 19.1109 15.2575L11.5921 15.2575C11.073 15.2575 10.6522 14.8367 10.6522 14.3177ZM10.6522 18.0771C10.6522 17.558 11.073 17.1372 11.5921 17.1372L19.1109 17.1372C19.6299 17.1372 20.0507 17.558 20.0507 18.0771C20.0507 18.5961 19.6299 19.0169 19.1109 19.0169L11.5921 19.0169C11.073 19.0169 10.6522 18.5961 10.6522 18.0771ZM10.6522 21.8365C10.6522 21.3174 11.073 20.8966 11.5921 20.8966L19.1109 20.8966C19.6299 20.8966 20.0507 21.3174 20.0507 21.8365C20.0507 22.3555 19.6299 22.7763 19.1109 22.7763L11.5921 22.7763C11.073 22.7763 10.6522 22.3555 10.6522 21.8365ZM15.3515 27.1623C15.8705 27.1623 16.2913 27.5831 16.2913 28.1022L16.2913 30.9217L14.4116 30.9217L14.4116 28.1022C14.4116 27.5831 14.8324 27.1623 15.3515 27.1623Z"
                                          fill="#6B7280"/>
                                  </svg>

                                  <span class="flex-1 flex flex-col min-w-0">
                                    <span class="text-gray-900 text-sm font-medium truncate">{{ item.name }}</span>

                                  </span>
                                </span>
                              </span>
                                    </Link>

                                </div>

                            </nav>
                        </div>
                    </div>
                </TransitionChild>
                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:bg-white lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 lg:border-r lg:border-gray-200 lg:pt-5 lg:pb-4">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="mt-6 h-0 flex-1 flex flex-col overflow-y-auto">
                <!-- User account dropdown -->
                <!--                <Menu as="div" class="px-3 relative inline-block text-left">-->
                <!--                    <div>-->
                <!--                        <MenuButton class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500">-->
                <!--              <span class="flex w-full justify-between items-center">-->
                <!--                <span class="flex min-w-0 items-center justify-between space-x-3">-->
                <!--                  <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" alt="" />-->
                <!--                  <span class="flex-1 flex flex-col min-w-0">-->
                <!--                    <span class="text-gray-900 text-sm font-medium truncate">{{user.first_name}} {{user.last_name}}</span>-->
                <!--                    <span class="text-gray-500 text-sm truncate">{{user.email}}</span>-->
                <!--                  </span>-->
                <!--                </span>-->
                <!--                <SelectorIcon class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />-->
                <!--              </span>-->
                <!--                        </MenuButton>-->
                <!--                    </div>-->
                <!--                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">-->
                <!--                        <MenuItems class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none">-->
                <!--                            <div class="py-1">-->
                <!--                                <MenuItem v-slot="{ active }">-->
                <!--                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">View profile</a>-->
                <!--                                </MenuItem>-->
                <!--                                <MenuItem v-slot="{ active }">-->
                <!--                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Settings</a>-->
                <!--                                </MenuItem>-->
                <!--                                <MenuItem v-slot="{ active }">-->
                <!--                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Notifications</a>-->
                <!--                                </MenuItem>-->
                <!--                            </div>-->
                <!--                            <div class="py-1">-->
                <!--                                <MenuItem v-slot="{ active }">-->
                <!--                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Get desktop app</a>-->
                <!--                                </MenuItem>-->
                <!--                                <MenuItem v-slot="{ active }">-->
                <!--                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Support</a>-->
                <!--                                </MenuItem>-->
                <!--                            </div>-->
                <!--                            <div class="py-1">-->
                <!--                                <MenuItem v-slot="{ active }" v-if="$page.props.auth != null">-->
                <!--                                    <Link :href="route('logout')" method="post" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Logout</Link>-->
                <!--                                </MenuItem>-->
                <!--                            </div>-->
                <!--                        </MenuItems>-->
                <!--                    </transition>-->
                <!--                </Menu>-->

                <!-- Navigation -->
                <nav class="px-3 mt-6">
                    <!--                    <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="mobile-teams-headline"> Account</h3>-->

                    <div class="space-y-1 mb-3">
                        <Link v-for="item in navigationFirst" :key="item.name" :href="item.href" :class="[item.current ? ' text-indigo-500' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']" :aria-current="item.current ? 'page' : undefined">
                            <span class="flex w-full justify-between items-center">
                                <span class="flex min-w-0 items-center justify-between space-x-3">
                                  <svg width="38" height="39" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.8703 6.79883L25.3766 6.79883C27.7395 6.79883 28.921 6.79883 29.655 7.5329C30.3891 8.26697 30.3891 9.44844 30.3891 11.8114L30.3891 30.9217L31.6422 30.9217C32.1613 30.9217 32.5821 31.3425 32.5821 31.8616C32.5821 32.3806 32.1613 32.8014 31.6422 32.8014L6.5795 32.8014C6.06044 32.8014 5.63965 32.3806 5.63965 31.8616C5.63965 31.3425 6.06044 30.9217 6.5795 30.9217L7.83264 30.9217L7.83264 15.5708C7.83264 13.2079 7.83264 12.0264 8.56671 11.2923C9.30078 10.5582 10.4823 10.5582 12.8452 10.5582L17.8577 10.5582C20.2207 10.5582 21.4021 10.5582 22.1362 11.2923C22.8703 12.0264 22.8703 13.2079 22.8703 15.5708L22.8703 30.9217L24.75 30.9217L24.75 15.5708L24.75 15.4586C24.7501 14.3739 24.7502 13.3793 24.6415 12.5703C24.5217 11.6793 24.2399 10.7377 23.4654 9.96316C22.6909 9.18866 21.7492 8.90684 20.8583 8.78705C20.0606 8.67981 19.0826 8.67842 18.0156 8.67852C18.1213 8.19325 18.2976 7.82713 18.5918 7.5329C19.3259 6.79883 20.5073 6.79883 22.8703 6.79883ZM10.6522 14.3177C10.6522 13.7986 11.073 13.3778 11.5921 13.3778L19.1109 13.3778C19.6299 13.3778 20.0507 13.7986 20.0507 14.3177C20.0507 14.8367 19.6299 15.2575 19.1109 15.2575L11.5921 15.2575C11.073 15.2575 10.6522 14.8367 10.6522 14.3177ZM10.6522 18.0771C10.6522 17.558 11.073 17.1372 11.5921 17.1372L19.1109 17.1372C19.6299 17.1372 20.0507 17.558 20.0507 18.0771C20.0507 18.5961 19.6299 19.0169 19.1109 19.0169L11.5921 19.0169C11.073 19.0169 10.6522 18.5961 10.6522 18.0771ZM10.6522 21.8365C10.6522 21.3174 11.073 20.8966 11.5921 20.8966L19.1109 20.8966C19.6299 20.8966 20.0507 21.3174 20.0507 21.8365C20.0507 22.3555 19.6299 22.7763 19.1109 22.7763L11.5921 22.7763C11.073 22.7763 10.6522 22.3555 10.6522 21.8365ZM15.3515 27.1623C15.8705 27.1623 16.2913 27.5831 16.2913 28.1022L16.2913 30.9217L14.4116 30.9217L14.4116 28.1022C14.4116 27.5831 14.8324 27.1623 15.3515 27.1623Z"
                                          fill="#6B7280"/>
                                  </svg>

                                  <span class="flex-1 flex flex-col min-w-0">
                                    <span class="text-gray-900 text-sm font-medium truncate">{{ item.name }}</span>

                                  </span>
                                </span>
                              </span>
                        </Link>

                    </div>

                </nav>
            </div>
        </div>
        <!-- Main column -->
        <div class="lg:pl-64 flex flex-col">
            <!-- Search header -->
            <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
                <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <MenuAlt1Icon class="h-6 w-6" aria-hidden="true" />
                </button>
                <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <SearchIcon class="h-5 w-5" aria-hidden="true" />
                                </div>
                                <input id="search-field" name="search-field" v-model="search" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm" placeholder="Search" type="search" />
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center">
                        <!-- Profile dropdown -->
                        <Menu as="div" class="ml-3 relative">
                            <div>
                                <MenuButton class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                </MenuButton>
                            </div>
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none">

                                    <div class="py-1">
                                        <MenuItem v-slot="{ active }" v-if="$page.props.user != null">
                                            <Link :href="route('logout')" method="post" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Logout</Link>
                                        </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </div>
            </div>
            <main class="flex-1">
                <!-- Page title & actions -->
                <div class="border-b bg-white border-gray-200 px-4 py-2 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-6">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Home</h1>
                    </div>
                    <div class=" flex sm:mt-0 sm:ml-4">
                        <Menu as="div" class="relative inline-block text-left">
                            <div>
                                <MenuButton class="group w-full rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500">
              <span class="flex w-full justify-between items-center">
                <span class="flex min-w-0 items-center justify-between space-x-3">
                  <svg width="30" height="30" viewBox="0 0 40 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M40.0002 26.99V32.0016H0.000244141V27.0083C2.32683 23.8991 5.34676 21.3755 8.81989 19.6384C12.293 17.9013 16.1236 16.9984 20.0069 17.0016C28.1802 17.0016 35.4402 20.925 40.0002 26.99ZM26.6702 6.99998C26.6702 8.76809 25.9679 10.4638 24.7176 11.714C23.4674 12.9643 21.7717 13.6666 20.0036 13.6666C18.2355 13.6666 16.5398 12.9643 15.2895 11.714C14.0393 10.4638 13.3369 8.76809 13.3369 6.99998C13.3369 5.23187 14.0393 3.53618 15.2895 2.28593C16.5398 1.03569 18.2355 0.333313 20.0036 0.333313C21.7717 0.333313 23.4674 1.03569 24.7176 2.28593C25.9679 3.53618 26.6702 5.23187 26.6702 6.99998Z" fill="#D1D5DB"/>
</svg>
                  <span class="flex-1 flex flex-col min-w-0">
                    <span class="text-gray-900 text-sm font-medium truncate">{{user.first_name}} {{user.last_name}}</span>
                      <!--                    <span class="text-gray-500 text-sm truncate">{{user.email}}</span>-->
                  </span>
                </span>
                <SelectorIcon class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
              </span>
                                </MenuButton>
                            </div>
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="z-10 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none">

                                    <div class="py-1">
                                        <MenuItem v-slot="{ active }" v-if="$page.props.auth != null">
                                            <Link :href="route('logout')" method="post" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Logout</Link>
                                        </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </div>
                <!--                <TransitionGroup name="fade" mode="out-in" tag="slot" appear>-->
                <slot :search="search" :user="user"></slot>
                <!--                </TransitionGroup>-->
            </main>
        </div>

    </div>
</template>

<script>
import {ref} from 'vue'
import {Link} from '@inertiajs/inertia-vue3'
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
import {LockOpenIcon, MenuAlt1Icon, RefreshIcon, XIcon} from '@heroicons/vue/outline'
import {ChevronRightIcon, DotsVerticalIcon, OfficeBuildingIcon, SearchIcon, SelectorIcon} from '@heroicons/vue/solid'
// import AccountList from "../ClickToAccount/AccountList.vue";

const show = ref(false)

export default {
    data(){
        return{
            search: '',
            show : false,
            sidebarOpen : false,
            clickToAccounts : [],
            navigationFirst : [
                {
                    name: 'Dashboard',
                    href: route('dashboard'),
                    icon: RefreshIcon,
                    current: false,
                    viewBox: "0 0 18 18",
                    d: "M16 0H2C0.9 0 0 0.9 0 2V16C0 17.1 0.9 18 2 18H16C17.1 18 18 17.1 18 16V2C18 0.9 17.1 0 16 0ZM5 14C4.45 14 4 13.55 4 13V8C4 7.45 4.45 7 5 7C5.55 7 6 7.45 6 8V13C6 13.55 5.55 14 5 14ZM9 14C8.45 14 8 13.55 8 13V5C8 4.45 8.45 4 9 4C9.55 4 10 4.45 10 5V13C10 13.55 9.55 14 9 14ZM13 14C12.45 14 12 13.55 12 13V11C12 10.45 12.45 10 13 10C13.55 10 14 10.45 14 11V13C14 13.55 13.55 14 13 14Z",
                    fill: "#6B7280",
                },
                {
                    name: 'View Profile',
                    href: route('user.profile'),
                    icon: RefreshIcon,
                    current: false,
                    viewBox: "0 0 18 18",
                    d: "M16 0H2C0.9 0 0 0.9 0 2V16C0 17.1 0.9 18 2 18H16C17.1 18 18 17.1 18 16V2C18 0.9 17.1 0 16 0ZM5 14C4.45 14 4 13.55 4 13V8C4 7.45 4.45 7 5 7C5.55 7 6 7.45 6 8V13C6 13.55 5.55 14 5 14ZM9 14C8.45 14 8 13.55 8 13V5C8 4.45 8.45 4 9 4C9.55 4 10 4.45 10 5V13C10 13.55 9.55 14 9 14ZM13 14C12.45 14 12 13.55 12 13V11C12 10.45 12.45 10 13 10C13.55 10 14 10.45 14 11V13C14 13.55 13.55 14 13 14Z",
                    fill: "#6B7280",
                },
            ],
        }
    },

    computed :{
        user(){
            return this.$page.props.auth.user.data
        }

    },


    components: {
        // AccountList,
        RefreshIcon,
        OfficeBuildingIcon,
        Dialog,
        LockOpenIcon,
        Link,
        DialogOverlay,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        TransitionChild,
        TransitionRoot,
        ChevronRightIcon,
        DotsVerticalIcon,
        MenuAlt1Icon,
        SearchIcon,
        SelectorIcon,
        XIcon,
    },

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
