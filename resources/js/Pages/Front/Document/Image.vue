<template>
    <div>
        <!-- directive name -->
        <div class="images" v-vuer="{movable: false}">
            <img v-for="src in images" :src="src" :key="src">
        </div>
        <button type="button" @click="show">Show</button>
        <!-- component name -->
        <vuer :images="images">
            <img v-for="src in images" :src="src" :key="src">
        </vuer>
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue'
export default defineComponent({
    data() {
        return {
            images: [
                "https://picsum.photos/200/200",
                "https://picsum.photos/300/200",
                "https://picsum.photos/250/200"
            ]
        };
    },
    methods: {
        show () {
            // viewerjs instance name
            const vuer = this.$el.querySelector('.images').$vuer
            vuer.show()
            // api name
            this.$vuerApi({
                images: this.images
            })
        }
    }
})
</script>
