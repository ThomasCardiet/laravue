<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
                <p class="text-white">Edition Client</p>

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
                        <h2 class="max-w-sm mx-auto">Information société</h2>
                        <div class="max-w-sm mx-auto">
                            <label class="text-sm text-gray-400">Description</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.society_description"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.society_description">{{errors.society_description}}</p>

                            <label class="text-sm text-gray-400">Raison sociale</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.society_social_reason"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.society_social_reason">{{errors.society_social_reason}}</p>

                            <label class="text-sm text-gray-400">Statut Juridique</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.society_legal_status"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.society_legal_status">{{errors.society_legal_status}}</p>

                            <label class="text-sm text-gray-400">Capital</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.society_capital"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.society_capital">{{errors.society_capital}}</p>

                            <label class="text-sm text-gray-400">Numéro de siret</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.society_siret_number"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.society_siret_number">{{errors.society_siret_number}}</p>

                            <label class="text-sm text-gray-400">Code NAF (APE)</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.society_naf_code"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.society_naf_code">{{errors.society_naf_code}}</p>
                        </div>
                    </div>

                    <hr />
                    <div class="md:space-y-0 w-full p-4 text-gray-500 items-center">
                        <h2 class="max-w-sm mx-auto">Adresse</h2>
                        <div class="max-w-sm mx-auto">
                            <label class="text-sm text-gray-400">Pays</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.country"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.country">{{errors.country}}</p>

                            <label class="text-sm text-gray-400">Adresse</label>
                            <div class="w-full inline-flex border">
                                <textarea
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.address"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.address">{{errors.address}}</p>

                            <label class="text-sm text-gray-400">Code Postal</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.postal_code"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.postal_code">{{errors.postal_code}}</p>

                            <label class="text-sm text-gray-400">Ville</label>
                            <div class="w-full inline-flex border">
                                <input
                                    type="text"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    v-model="form.city"
                                />
                            </div>
                            <p class="text-red-600" v-if="errors.city">{{errors.city}}</p>
                        </div>
                    </div>

                    <div class="w-full p-4 text-right text-gray-500">
                        <a href="/customer" class="mr-5 bg-gray-200 hover:bg-gray-300 border border-gray-400 text-black font-bold py-2 px-6 rounded-md">
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
    props: ["errors", 'customer'],

    data() {
        return {
            form: this.$inertia.form ({
                society_description:this.customer.society_description,
                society_social_reason:this.customer.society_social_reason,
                society_legal_status:this.customer.society_legal_status,
                society_capital:this.customer.society_capital,
                society_siret_number:this.customer.society_siret_number,
                society_naf_code:this.customer.society_naf_code,
                country:this.customer.country,
                address:this.customer.address,
                postal_code:this.customer.postal_code,
                city:this.customer.city
            })
        }
    },
    methods: {
        submit(){
            this.$inertia.put(this.route('customer.update', this.customer.id), this.form);
        },
        remove() {
            this.$inertia.put(this.route('customer.delete', this.customer.id));
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
