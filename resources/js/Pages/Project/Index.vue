<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
                <p class="text-white">projets</p>

                <a href="project/create" class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">
                    + Créer un projet
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
                                Titre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Client
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                description
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tickets
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editer</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Odd row -->
                        <tr v-for="project in projects">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ project.title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ project.first_name}} {{ project.last_name}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ project.description.substr(0, 20)}}
                            </td>
                            <td :class="getStatus(project, true)" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ getStatus(project, false) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="'/project/' + project.id + '/edit'" class="text-indigo-600 hover:text-indigo-900">Editer</a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
name: "Index.vue",
    props:['projects'],
    components: {AppLayout},
    methods: {
        getStatus(project, type) {
            switch (project.status) {
                case 0:
                    if(type === true) return 'text-red-500'
                    return 'Annulé';
                case 1:
                    if(type === true) return 'text-yellow-500'
                    return 'En cours';
                case 2:
                    if(type === true) return 'text-green-500'
                    return 'Terminé'
            }
        }
    }
}
</script>

<style scoped>

</style>
