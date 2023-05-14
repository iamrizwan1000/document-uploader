<template>
    <!-- <v-card> -->
      <v-layout>
        <v-navigation-drawer
          v-model="drawer"
          temporary
        >
          <v-list-item
            prepend-avatar="https://randomuser.me/api/portraits/men/78.jpg"
            title="John Leider"
          ></v-list-item>

          <v-divider></v-divider>

          <v-list density="compact" nav>
            <v-list-item prepend-icon="mdi-view-dashboard" title="Home" value="home"></v-list-item>
            <v-list-item @click="logout" prepend-icon="mdi-forum" title="Logout" value="about"></v-list-item>
          </v-list>
        </v-navigation-drawer>
        <v-main>
            <div class="navbar pb-4 bg-cover" >
            <v-app-bar-nav-icon class="mt-6 pl-8" color="white" variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <div class="mt-6 pl-8">
                <p class="mb-2 text-sm text-gray-200">SINGLE STORY REAR EXTENSION</p>
                <h1 class="text-4xl font-bold text-gray-100">Jodie's Project</h1>
            </div>
          </div>
          <div>
            <div class="flex justify-around">
                <!-- Tab content 1 -->
                <div class="tab-content">
                    <div class="p-4">
                        <v-icon class="text-gray-400" icon="mdi-clipboard" size="x-large">
                        </v-icon>
                    </div>
                </div>

                <!-- Tab content 2 -->
                <div class="tab-content">
                    <div class="p-4">
                        <v-icon class="text-gray-400" icon="mdi-calculator-variant" size="x-large">
                        </v-icon>
                    </div>
                </div>

                <!-- Tab content 3 -->
                <div class="tab-content">
                    <div class="p-4">
                        <v-icon class="text-gray-400" icon="mdi-cog" size="x-large">
                        </v-icon>
                    </div>
                </div>

                <!-- Tab content 4 -->
                <div class="tab-content">
                    <div class="p-4">
                        <v-icon class="text-teal-600" :class="selected" icon="mdi-folder-multiple-outline" size="x-large">
                        </v-icon>
                    </div>
                </div>
            </div>

          </div>
            <NoData></NoData>
            <!-- <TableView></TableView> -->
<!--             <ModalBox></ModalBox>-->
        </v-main>
      </v-layout>
    <!-- </v-card> -->

  </template>

  <script>
    import ModalBox from './ModalBox.vue';
    import NoData from './NoData.vue';
    import TableView from './TableView.vue';
    import {Inertia} from "@inertiajs/inertia";
    export default {
        components:{NoData, TableView, ModalBox},
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
