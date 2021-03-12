<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <p class="text-white">Dashboard</p>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <stats :customers="customers" :projects="projects" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Stats from '@/Components/Stats'

    export default {
        props: ['customers', 'projects'],
        components: {
            AppLayout,
            Stats,
        },
    }
</script>
