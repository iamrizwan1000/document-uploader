<template>
    <!-- <v-card> -->
    <Layout>
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

        <NoData v-else></NoData>
    </Layout>

    <!-- </v-card> -->

</template>

<script>
import ModalBox from './ModalBox.vue';
import NoData from './NoData.vue';
import TableView from './TableView.vue';
import {Inertia} from "@inertiajs/inertia";
import DeleteConfirmation from "../Components/DeleteConfirmation.vue";
import Layout from "./Layout.vue";

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
            Inertia.post(route('document.delete', { id: id }))
            this.show = false
        }
    }
}

</script>

<style scoped>
.navbar{
    background-color: #57B3BD;
    /* background-image: url('https://images.unsplash.com/photo-1541450805268-4822a3a774ca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fHNpbXBsZSUyMGJhY2tncm91bmR8ZW58MHx8MHx8&auto=format&fit=crop&w=600&q=60'); */

}


</style>
