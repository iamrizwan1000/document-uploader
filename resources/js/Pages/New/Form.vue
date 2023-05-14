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
.navbar{
    background-color: #57B3BD;
    /* background-image: url('https://images.unsplash.com/photo-1541450805268-4822a3a774ca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fHNpbXBsZSUyMGJhY2tncm91bmR8ZW58MHx8MHx8&auto=format&fit=crop&w=600&q=60'); */

}


</style>
