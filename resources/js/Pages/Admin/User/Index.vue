<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <Layout v-slot="slotProps">

        <Transition name="fade" mode="out-in" appear>
            <div class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
                <!--            <Breadcrumb class="mb-5"></Breadcrumb>-->

                <div class=" lg:flex lg:items-center lg:justify-between">

                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-1xl">
                        <span class="block">Users</span>
                    </h2>
                    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                        <div class="inline-flex rounded-md shadow">
                            <PrimaryButton @click="create">Create new Users</PrimaryButton>
                        </div>
                    </div>
                </div>


                <div class="bg-white mt-8 p-10 rounded-xl">
                    <div class="">
                        <h2 class="text-1xl font-bold tracking-tight text-gray-900 sm:text-1xl">
                            <span class="block"> Users</span>
                        </h2>
                    </div>

                    <form @submit.prevent="submit">
                        <div class="lg:flex lg:items-center lg:justify-between mt-8">
                            <div class="min-w-0 flex-1">
                                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-3">
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                        </div>
                                        <input v-model="filters.first_name" type="text" name="first_name" id="first_name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search First Name" />
                                    </div>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                        </div>
                                        <input v-model="filters.last_name" type="text" name="last_name" id="last_name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search Last Name" />
                                    </div>
                                    <div class="relative flex-1  shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                        </div>
                                        <input v-model="filters.email" type="text" name="email" id="email" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search Email" />
                                    </div>
                                    <div class="flex-1 items-center text-sm text-gray-500">
                                        <ComboboxRole @selectedValue="selectedValue" :selectedId="filters.role" :data="roles.data"></ComboboxRole>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="flex flex-col mt-6 mb-10">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-white">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">first name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">last name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">email</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">role</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">action</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(user, userIdx) in users.data" :key="user.email" :class="[user % 2 === 0 ? 'bg-white' : 'bg-gray-50']">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                {{ user.first_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                {{ user.last_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ user.email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <div class="flex-1 items-center text-sm text-gray-500">
                                                    <!--                                                <Combobox :selectedId="user.role" :data="roles.data"></Combobox>-->
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex items-center h-5">
                                                    <Link :href="route('admin.user.edit', { token : this.$page.props.token,id: user.id })" class="text-indigo-500 p-1">Edit</Link>
                                                    <button  @click="destroy(user.id)" class="text-indigo-500 p-1">deactive</button>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white mt-8 p-10 rounded-xl">
                    <div class="">
                        <h2 class="text-1xl font-bold tracking-tight text-gray-900 sm:text-1xl">
                            <span class="block">Deactive Users</span>
                        </h2>
                    </div>

                    <form @submit.prevent="submit">
                        <div class="lg:flex lg:items-center lg:justify-between mt-8">
                            <div class="min-w-0 flex-1">
                                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-3">
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                        </div>
                                        <input v-model="first_name" type="text" name="first_name" id="first_name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search First Name" />
                                    </div>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                        </div>
                                        <input v-model="last_name" type="text" name="last_name" id="last_name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search Last Name" />
                                    </div>
                                    <div class="relative flex-1  shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <SearchIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                        </div>
                                        <input v-model="email" type="text" name="email" id="email" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search Email" />
                                    </div>
                                    <div class="flex-1 items-center text-sm text-gray-500">
                                        <ComboboxRole :data="roles.data"></ComboboxRole>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="flex flex-col mt-6 mb-10">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-white">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">first name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">last name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">email</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">role</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">action</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(user, userIdx) in deleted_users.data" :key="user.email" :class="[user % 2 === 0 ? 'bg-white' : 'bg-gray-50']">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                {{ user.first_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                {{ user.last_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ user.email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <div class="flex-1 items-center text-sm text-gray-500">
                                                    <!--                                                <Combobox :selectedId="user.role" :data="roles.data"></Combobox>-->
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex items-center h-5">
                                                    <button  @click="active(user.id)" class="text-indigo-500 p-1">active</button>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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
import {SearchIcon} from '@heroicons/vue/solid'
import {Link} from '@inertiajs/inertia-vue3'
import {Table} from "@protonemedia/inertiajs-tables-laravel-query-builder";
import {reactive, ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";
import DeleteConfirmation from "../../Components/DeleteConfirmation.vue";
import ComboboxRole from "../../Components/ComboboxRole.vue";
import PrimaryButton from "../../Components/PrimaryButton.vue";


const props = defineProps(['errors','front_end_id','users','roles','token','deleted_users','searches'])

const show = ref(false)
const filters = reactive({
    first_name : props.searches.first_name,
    last_name : props.searches.last_name,
    email : props.searches.email,
    role : props.searches.role
})

const id = ref()

const front_end_id = ref(props.front_end_id)

watch(filters, value => {
    console.log(value)
    Inertia.get(route('admin.user',{ token: props.token}),{ first_name:value.first_name,last_name: value.last_name, email: value.email, role: value.role },{
        preserveState: true,
        replace : true
    })
})

function selectedValue(event){
    filters.role = event.name
}

function create(){
    Inertia.get(route('admin.user.create',{ token: props.token}))
}


function destroy(id) {
    show.value = true
    this.id = id
}

function deletes(id){
    Inertia.post(route('admin.user.delete',{ token: props.token, id : id}),'',{
        preserveScroll: true
    })
    show.value = false
}

function active(id){
    Inertia.post(route('admin.user.active',{ token: props.token, id : id}),'',{
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
