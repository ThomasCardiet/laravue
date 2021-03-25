<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <p class="text-white">Créer un projet</p>
            </h2>
        </template>

        <form @submit.prevent="submit" class="h-screen flex items-center justify-center" style="background: #edf2f7;">
            <section class="py-10 bg-gray-100  bg-opacity-50 h-screen">
                <div class="bg-white space-y-6">
                    <div class="p-4 text-gray-500 items-center">
                        <h2 class="max-w-sm mx-auto">Responsable projet</h2>
                        <div class="max-w-sm mx-auto">
                            <label class="text-sm text-gray-400">Client</label>
                            <div class="w-full inline-flex border">
                                <select
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.customer_id"
                                >
                                    <option v-for="customer in customers" :key="customer" :value="customer.id">Client {{ customer.id }}</option>
                                </select>
                            </div>
                            <p class="text-red-600" v-if="errors.customer_id">{{errors.customer_id}}</p>

                            <label class="text-sm text-gray-400">Nom</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.last_name"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.last_name">{{errors.last_name}}</p>

                            <label class="text-sm text-gray-400">Prénom</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.first_name"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.first_name">{{errors.first_name}}</p>

                            <label class="text-sm text-gray-400">Téléphone</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="tel"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.phone_number"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.phone_number">{{errors.phone_number}}</p>

                            <label class="text-sm text-gray-400">Email</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="email"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.email"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.email">{{errors.email}}</p>
                        </div>
                    </div>

                    <hr />
                    <div class="md:space-y-0 w-full p-4 text-gray-500 items-center">
                        <h2 class="max-w-sm mx-auto">Information projet</h2>
                        <div class="max-w-sm mx-auto">
                            <label class="text-sm text-gray-400">Titre</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.title"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.title">{{errors.title}}</p>

                            <label class="text-sm text-gray-400">Description</label>
                            <div class="w-full inline-flex border">
                                <textarea
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.description"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.description">{{errors.description}}</p>

                            <label class="text-sm text-gray-400">Début du projet</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="date"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.start_date"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.start_date">{{errors.start_date}}</p>

                            <label class="text-sm text-gray-400">Fin du projet</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="date"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.end_date"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.end_date">{{errors.end_date}}</p>

                            <label class="text-sm text-gray-400">Status du projet</label>
                            <div class="w-full inline-flex border">
                                <select
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.status"
                                >
                                    <option value="0">Annulé</option>
                                    <option value="1">En cours</option>
                                    <option value="2">Terminé</option>
                                </select>
                            </div>
                            <p class="text-red-600" v-if="errors.status">{{errors.status}}</p>

                            <label class="text-sm text-gray-400">Nombre de jours vendus</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="number"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.day_sell"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.day_sell">{{errors.day_sell}}</p>
                        </div>
                    </div>

                    <div class="w-full p-4 text-right text-gray-500">
                        <a href="/project" class="mr-5 bg-gray-200 hover:bg-gray-300 border border-gray-400 text-black font-bold py-2 px-6 rounded-md">
                            Annuler
                        </a>
                        <button type="submit" :disabled="form.processing" class="mr-5 bg-blue-700 text-white border border-blue-700 font-bold py-2 px-6 rounded-lg">
                            Sauvegarder
                        </button>
                    </div>
                </div>
            </section>
        </form>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Label from "@/Jetstream/Label";
export default {
    name: "createProjet",
    props: ['errors', 'customers'],

    components: {Label, AppLayout},

    data() {
        return {
            form: this.$inertia.form ({
                customer_id:null,
                last_name:null,
                first_name:null,
                phone_number:null,
                email:null,
                title:null,
                description:null,
                start_date:null,
                end_date:null,
                status:null,
                day_sell:null,
            })
        }
    },
    methods: {
        submit(){
            this.$inertia.put(this.route('project.store'), this.form)
        }
    }
}
</script>

<style scoped>

</style>
