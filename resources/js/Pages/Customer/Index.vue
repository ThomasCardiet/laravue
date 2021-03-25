<template>
 <AppLayout>
     <template #header>
         <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
             <p class="text-white">Clients</p>

             <a href="customer/create" class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">
                 + Créer un client
             </a>
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
                             description
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
                             {{ substrDesc(customer.society_description)}}
                         </td>

                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                             {{ customer.projects.length }}
                         </td>

                         <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                             <a :href="'/customer/'+customer.id+'/edit'" class="text-indigo-600 hover:text-indigo-900">Editer</a>
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
    components: {AppLayout},
    methods: {
        substrDesc(desc) {
            let max_length = 20;
            if(desc.length < max_length) return desc;
            return desc.substr(0, max_length)+'...';
        }
    }
}
</script>

<style scoped>

</style>
