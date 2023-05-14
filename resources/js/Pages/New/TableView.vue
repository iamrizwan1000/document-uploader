<template>
    <div class="px-4 py-6 bg-gray-100">
        <v-table>
      <tbody>
        <tr
          v-for="item in desserts"
          :key="item.name"
        >
          <td class="bg-gray-100 border-none text-right p-4"><v-icon icon="mdi-image-multiple-outline" size="x-large"></v-icon></td>
          <td class="bg-gray-100 border-none p-4 font-bold">{{ item.name }}</td>
          <td class="bg-gray-100 border-none p-4"><v-icon class="text-blue-500" icon="mdi-application-edit-outline" size="small"></v-icon></td>
          <td class="bg-gray-100 border-none p-4 cursor-pointer"><v-icon icon="mdi-delete-outline" size="large"></v-icon></td>
        </tr>
      </tbody>
    </v-table>
    </div>    
</template>
  <script>
  export default {
    data () {
      return {
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
      }
    },
  }
</script>