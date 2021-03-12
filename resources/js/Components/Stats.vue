<template>

    <div>
        <h2>Statistiques</h2>

        <div>
            <h3>Nombre de clients</h3>
            <p>{{ customers.all.length }} ->{{ getAugmentation('customers') }}%</p>
        </div>
        <div>
            <h3>Nombre de projets</h3>
            <p>{{ projects.all.length }} ->{{ getAugmentation('projects') }}%</p>
        </div>
    </div>

</template>

<script>

import {round} from "lodash";

export default {
    props: ['customers', 'projects'],
    name: "Stats",
    methods: {
        getAugmentation(type) {
            let result = 0;
            switch (type) {
                case 'customers':
                    result = ((this.customers.current_month.length-this.customers.last_month.length)/this.customers.last_month.length)*100;
                    break;
                case 'projects':
                    result = ((this.projects.current_month.length-this.projects.last_month.length)/this.projects.last_month.length)*100;
                    break;
            }

            return round(result, 2);
        }
    }
}
</script>

<style scoped>

</style>
