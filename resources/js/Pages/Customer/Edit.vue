<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edition du client
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                    </table>

                    <form @submit.prevent="submit">
                        <label>Description</label>
                        <input placeholder="" type="text" v-model="form.society_description">
                        <p class="text-red-600" v-if="errors.society_description">{{errors.society_description}}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <label>Raison sociale</label>
                        <input placeholder="" type="text" v-model="form.society_social_reason">
                        <p class="text-red-600" v-if="errors.society_social_reason">{{errors.society_social_reason}}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <label>Statut Juridique</label>
                        <input placeholder="" type="text" v-model="form.society_legal_status">
                        <p class="text-red-600" v-if="errors.society_legal_status">{{errors.society_legal_status}}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <label>Capital</label>
                        <input placeholder="" type="text" v-model="form.society_capital">
                        <p class="text-red-600" v-if="errors.society_capital">{{errors.society_capital}}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <label>Numéro de siret</label>
                        <input placeholder="" type="text" v-model="form.society_siret_number">
                        <p class="text-red-600" v-if="errors.society_siret_number">{{errors.society_siret_number}}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <label>Code NAF (APE)</label>
                        <input placeholder="" type="text" v-model="form.society_naf_code">
                        <p class="text-red-600" v-if="errors.society_naf_code">{{errors.society_naf_code}}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <label>Pays</label>
                        <input placeholder="" type="text" v-model="form.country">
                        <p class="text-red-600" v-if="errors.country">{{errors.country}}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <label>Adresse</label>
                        <textarea placeholder="" v-model="form.address"></textarea>
                        <p class="text-red-600" v-if="errors.address">{{errors.address}}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <label>Code postal</label>
                        <input placeholder="" type="text" v-model="form.postal_code">
                        <p class="text-red-600" v-if="errors.postal_code">{{errors.postal_code}}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <label>Ville</label>
                        <input placeholder="" type="text" v-model="form.city">
                        <p class="text-red-600" v-if="errors.city">{{errors.city}}</p>

                        <br>
                        <br>
                        <button type="submit" :disabled="form.processing">Editer</button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>

import AppLayout from "@/Layouts/AppLayout";
import Label from "@/Jetstream/Label";
export default {
name: "editCustomer",
    components: {Label, AppLayout},
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
            this.$inertia.put(this.route('customer.update', this.customer.id), this.form)
        },
    }
}
</script>

<style scoped>

</style>
