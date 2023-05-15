<template>
    <Layout>
        <Transition name="fade" mode="out-in" appear>
            <div class="max-w-7xl mx-auto sm:px-6 lg:py-8 lg:px-8 py-3 px-3">
                <!--            <Breadcrumb class="mb-5"></Breadcrumb>-->
                <div class="mb-8">
                    <h2 class="text-2xl font-sans tracking-tight text-gray-900 sm:text-1xl">
                        <span class="block">Uploaded Documents</span>
                    </h2>
                </div>
                <div v-if="docs.data.length > 0">
                    <div class="px-4 py-6 bg-gray-100">
                        <v-table>
                            <tbody>
                            <tr
                                v-for="item in docs.data"
                                :key="item.id"
                            >
                                <td class="bg-gray-100 border-none text-right p-4"><v-icon icon="mdi-image-multiple-outline" size="x-large"></v-icon></td>
                                <td class="bg-gray-100 border-none p-4 font-bold">{{ item.name }}</td>
                                <td class="bg-gray-100 border-none p-4">
                                    <a :href="item.image" :download="item.name">
                                        <v-icon class="text-blue-500 cursor-pointer" icon="mdi-eye-outline" size="small">
                                        </v-icon>
                                    </a>
                                </td>
                                <td class="bg-gray-100 border-none p-4 cursor-pointer">
                                    <v-icon @click="destroy(item.id)" icon="mdi-delete-outline" size="large">
                                    </v-icon>
                                </td>
                            </tr>
                            </tbody>
                        </v-table>
                    </div>

                    <DeleteConfirmation v-if="show" @close="show = false" @delete="deletes(id)"></DeleteConfirmation>
                </div>

                <div v-else class="bg-gray-100 content">
                    <div style="height: 400px;" class="flex justify-center flex-col items-center">
                        <v-icon class="text-gray-400 clipboard-icon mt-10" icon="mdi-file-plus"></v-icon>
                        <p class="pt-4 text-lg font-bold text-gray-700">This User's Wallet is Empty</p>

                    </div>
                </div>

            </div>
        </Transition>
    </Layout>
</template>
<script>
import Layout from "../Partials/Layout.vue";
import DeleteConfirmation from "../../Components/DeleteConfirmation.vue";
import NoData from "../../New/NoData.vue";
import TableView from "../../New/TableView.vue";
import ModalBox from "../../New/ModalBox.vue";
import {Inertia} from "@inertiajs/inertia";

export default {
    props :{
        docs : Object
    },
    components:{Layout, DeleteConfirmation, NoData, TableView, ModalBox},
    data(){
        return {
            id : '',
            show : false,
            drawer:false,
            selectedTab : '#57B3BD',
            desserts: [
                {
                    name: 'Frozen Yogurt',
                    calories: 159,
                },
                {
                    name: 'Ice cream sandwich',
                    calories: 237,
                },
                {
                    name: 'Eclair',
                    calories: 262,
                },
            ],
            dialog: false,
            image: '',
        }
    },
    methods:{
        logout(){
            Inertia.post('/logout')
        },
        destroy(id) {
            this.show = true
            this.id = id
        },

        deletes(id){
            Inertia.post(route('admin.user.deleteDocument', { id: id }))
            this.show = false
        }
    }
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
