<template>
    <!-- <v-card> -->
    <Layout>

        <NoData></NoData>

    </Layout>
    <!-- </v-card> -->

</template>

<script>
import ModalBox from './ModalBox.vue';
import NoData from './NoData.vue';
import TableView from './TableView.vue';
import {Inertia} from "@inertiajs/inertia";
import Layout from "./Layout.vue";

export default {
    components:{NoData, TableView, ModalBox,Layout},
    data(){
        return {
            drawer:false,
            selectedTab : '#57B3BD'
        }
    },
    methods:{
        logout(){
            Inertia.post('/logout')
        }
    }
}

</script>

<style scoped>

</style>
