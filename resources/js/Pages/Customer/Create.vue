<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Création d'un client
            </h2>
        </template>

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
export default {
    name: "createClient",
    props: ["errors"],

    components: {Label, AppLayout},

    data() {
        return {
            form: this.$inertia.form ({
                society_description:null,
                society_social_reason:null,
                society_legal_status:null,
                society_capital:null,
                society_siret_number:null,
                society_naf_code:null,
                country:null,
                address:null,
                postal_code:null,
                city:null
            })
        }
    },
    methods: {
        submit(){
            this.$inertia.put(this.route('customer.store'), this.form)
        }
    }
}
</script>

<style scoped>

</style>
