<template>
    <!-- <v-card> -->
    <Layout>

        <v-container>
            <v-row no-gutters>
                <v-col
                    sm="3"
                >
                </v-col>
                <v-col
                    sm="6"
                >
                    <div class="card-content">
                        <div class="content px-5">
                            <form class="space-y-6" @submit.prevent="submit">
                                <div>
                                    <label for="first_name" class="text-sm font-medium text-gray-700"> First name </label>
                                    <div>
                                        <input id="first_name" v-model="form.first_name" name="first_name" type="text"  class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                        <span v-if="errors.first_name" v-text="errors.first_name"></span>
                                    </div>
                                </div>

                                <div>
                                    <label for="last_name" class="text-sm font-medium text-gray-700"> Last name </label>
                                    <div>
                                        <input id="last_name" v-model="form.last_name" name="last_name" type="text"  class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                        <span v-if="errors.last_name" v-text="errors.last_name"></span>
                                    </div>
                                </div>

                                <div>
                                    <label for="email" class="text-sm font-medium text-gray-700"> Email </label>
                                    <div>
                                        <input id="email" v-model="form.email" name="email" type="text"  class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                        <span v-if="errors.email" v-text="errors.email"></span>
                                    </div>
                                </div>

                                <div>
                                    <label for="password" class="text-sm font-medium text-gray-700"> Password </label>
                                    <div>
                                        <input id="password" v-model="form.password" name="password" type="password"  class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                        <span v-if="errors.password" v-text="errors.password"></span>
                                        {{errors}}
                                    </div>
                                </div>

                                <div>
                                    <label for="password_confirmation" class="text-sm font-medium text-gray-700"> Confirmation Password </label>
                                    <div>
                                        <input id="password_confirmation" v-model="form.password_confirmation" name="password_confirmation" type="password"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                        <span v-if="errors.password_confirmation" v-text="errors.password_confirmation"></span>
                                    </div>
                                </div>
                                <div class="" style="margin-top: 20px;">
                                    <div class="is-flex is-justify-content-center">
                                        <button type="submit" class="button is-link is-rounded" style="background-color: #3399FD; width: 50%;">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </v-col>
                <v-col
                    sm="3"
                >
                </v-col>
            </v-row>
        </v-container>

    </Layout>
    <!-- </v-card> -->

</template>

<script>
import ModalBox from '../ModalBox.vue';
import NoData from '../NoData.vue';
import TableView from '../TableView.vue';
import {Inertia} from "@inertiajs/inertia";
import Layout from "../Layout.vue";

export default {
    components:{NoData, TableView, ModalBox,Layout},
    data(){
        return {
            drawer:false,
            selectedTab : '#57B3BD',
            form: {
                first_name: this.user.data != null ? this.user.data.first_name : '',
                last_name: this.user.data != null ? this.user.data.last_name : '',
                email: this.user.data != null ? this.user.data.email : '',
                password: '',
                password_confirmation: '',
            },
        }
    },
    props:{
        errors : Object,
        user: Object,
    },
    methods:{
        submit(){
            console.log(this.form)
            this.$inertia.post(route('updateProfile'), this.form)
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
