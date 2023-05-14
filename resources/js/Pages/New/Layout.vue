<template>
    <!-- <v-card> -->
      <v-layout>
        <v-navigation-drawer
          v-model="drawer"
          temporary
        >
          <v-list-item
            prepend-avatar="https://randomuser.me/api/portraits/men/78.jpg"
            :title="user.first_name"
          ></v-list-item>

          <v-divider></v-divider>

          <v-list density="compact" nav>
<!--            <v-list-item prepend-icon="mdi-view-dashboard" title="Home" value="home"></v-list-item>-->
            <v-list-item @click="logout" prepend-icon="mdi-forum" title="Logout" value="about"></v-list-item>
          </v-list>
        </v-navigation-drawer>
        <v-main>
            <div class="navbar pb-4 bg-cover" >
            <v-app-bar-nav-icon class="mt-6 pl-8" color="white" variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <div class="mt-6 pl-8">
                <p class="mb-2 text-sm text-gray-200">SINGLE STORY REAR EXTENSION</p>
                <h1 class="text-4xl font-bold text-gray-100">{{user.first_name}}'s Project</h1>
            </div>
          </div>
          <div>
            <div class="flex justify-around">
                <!-- Tab content 1 -->
                <div class="tab-content">
                    <div class="p-4">
                        <Link :href="route('document.index')">
                            <v-icon :class="[ routes === 'user/document' ? 'text-teal-600' : 'text-gray-400'  ]" icon="mdi-clipboard" size="x-large">
                            </v-icon>
                        </Link>
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
                        <Link :href="route('profile')">
                            <v-icon :class="[ routes === 'user/profile' ? 'text-teal-600' : 'text-gray-400'  ]" icon="mdi-cog" size="x-large">
                            </v-icon>
                        </Link>
                    </div>
                </div>

                <!-- Tab content 4 -->
                <div class="tab-content">
                    <div class="p-4">
                        <Link :href="route('document.create')">
                            <v-icon :class="[ routes === 'document/create' ? 'text-teal-600' : 'text-gray-400'  ]" icon="mdi-folder-multiple-outline" size="x-large">
                            </v-icon>
                        </Link>
                    </div>
                </div>
            </div>

          </div>
            <slot />
        </v-main>
      </v-layout>
    <!-- </v-card> -->

  </template>

  <script>
    import ModalBox from './ModalBox.vue';
    import { Link } from "@inertiajs/inertia-vue3";
    import NoData from './NoData.vue';
    import TableView from './TableView.vue';
    import {Inertia} from "@inertiajs/inertia";
    export default {
        components:{NoData, TableView, ModalBox,Link,Inertia},
        props:{
            // user : Object,
            // auth : Object,
        },
        data(){
            return {
                drawer:false,
                selectedTab : '#57B3BD',
                routes : ''
            }
        },
        methods:{
            logout(){
                Inertia.post('/logout')
            }
        },
        computed:{
          user(){
              return this.$page.props.auth.user.data
          }
        },
        mounted() {
            const path = window.location.pathname;

// Split the path into an array of segments
            const segments = path.split('/');

// Get the last two segments
            const lastSegment = segments[segments.length - 1];
            const secondLastSegment = segments[segments.length - 2];

            this.routes = secondLastSegment + "/" + lastSegment;
        }
    }

  </script>

  <style scoped>
    .navbar{
        background-color: #57B3BD;
        /* background-image: url('https://images.unsplash.com/photo-1541450805268-4822a3a774ca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fHNpbXBsZSUyMGJhY2tncm91bmR8ZW58MHx8MHx8&auto=format&fit=crop&w=600&q=60'); */

    }


  </style>
