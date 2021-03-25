<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
                <p class="text-white">Edition Projet</p>

                <button @click.prevent="toggleModal" class="text-sm inline-flex mr-5 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg">

                    <svg
                        fill="none"
                        class="w-4 mr-2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                        />
                    </svg>
                    Supprimer
                </button>
            </h2>
        </template>

        <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
            <div @click.prevent="toggleModal" class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                <!-- Add margin if you want to see some of the overlay behind the modal-->
                <div class="modal-content py-4 text-left px-6">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Confirmer la suppression du client '{{ form.society_social_reason }}'</p>
                    </div>

                    <!--Body-->
                    <p>Êtes-vous réellement sûr de vouloir supprimer ce client? Cette action est irréversible</p>

                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <button @click.prevent="remove" class="px-4 p-3 rounded-lg text-white bg-red-600 hover:bg-red-700 mr-2">Supprimer</button>
                        <button @click.prevent="toggleModal" class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Retour</button>
                    </div>

                </div>
            </div>
        </div>

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
import Button from "@/Jetstream/Button";


export default {
    name: "editCustomer",
    components: {
        Button,
        Label,
        AppLayout,
    },
    props: ['errors', 'project', 'customers'],

    data() {
        return {
            form: this.$inertia.form ({
                customer_id:this.project.customer_id,
                last_name:this.project.last_name,
                first_name:this.project.first_name,
                phone_number:this.project.phone_number,
                email:this.project.email,
                title:this.project.title,
                description:this.project.description,
                start_date:this.project.start_date,
                end_date:this.project.end_date,
                status:this.project.status,
                day_sell:this.project.day_sell,
            })
        }
    },
    methods: {
        submit(){
            this.$inertia.put(this.route('project.update', this.project.id), this.form);
        },
        remove() {
            this.$inertia.put(this.route('project.delete', this.project.id));
        },
        toggleModal() {
            const body = document.querySelector('body');
            const modal = document.querySelector('.modal');
            modal.classList.toggle('opacity-0');
            modal.classList.toggle('pointer-events-none');
            body.classList.toggle('modal-active');
        }
    }
}
</script>

<style scoped>

</style>
