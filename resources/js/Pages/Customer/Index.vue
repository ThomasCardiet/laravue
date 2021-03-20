<template>
 <AppLayout>
     <template #header>
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             <p class="text-white">Clients</p>
         </h2>
     </template>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 <table class="min-w-full divide-y divide-gray-200">
                     <thead class="bg-gray-50">
                     <tr>
                         <th scope="col"
                             class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                             Raison sociale
                         </th>
                         <th scope="col"
                             class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                             descritpion
                         </th>

                         <th scope="col"
                             class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                             Projets
                         </th>
                         <th scope="col" class="relative px-6 py-3">
                             <span class="sr-only">Editer</span>
                         </th>
                     </tr>
                     </thead>
                     <tbody>
                     <!-- Odd row -->
                     <tr v-for="customer in customers">
                         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                             {{ customer.society_social_reason }}
                         </td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                             {{ customer.society_description.substr(0, 20)}}...
                         </td>


                         <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                             <a href="#" class="text-indigo-600 hover:text-indigo-900">Editer</a>

                         </td>
                     </tr>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
name: "Index.vue",
    props:['customers'],

    components: {AppLayout}
}
</script>

<style scoped>

</style>
