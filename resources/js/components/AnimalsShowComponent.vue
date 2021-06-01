<template>



   <div class="container">
        <div class="columns is-multiline">
            <div class="card column is-full block">

                    <header class="card-header">
                        <h1 class="card-header-title columns">

                            <div class="column is-10">
                                {{animal.name}}
                            </div>

                            <div class="column is-2">
                                <div class="is-pulled-right">
                                    {{animal.id}}
                                </div>

                            </div>


                        </h1>
                    </header>
                    <div class="card-content">
                        <div class="content columns">
                            <div class="column is-10">
                                <div class="block">
                                    {{animal.description}}
                                </div>
                                <div class="block" v-if="species.length > 0">
                                    Species   <a :href="'/species/' + species.slug" class="tag is-link">
                                    {{species.name}}
                                </a>
                                </div>

                            </div>
                            <div class="column is-2">
                                <a class="button is-primary is-pulled-right" :href="'/animal/' + animal.slug + '/edit'">
                                    Edit Animal
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-footer-item">
                            Created at: <div class="tag">{{animal.created_at}}</div>
                            Updated at: <div class="tag">{{animal.updated_at}} </div>

                        </div>

                    </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "Animal",
    mounted() {

    },
    created() {
        this.animal = this.currentAnimal;
        this.species = this.currentSpecies;
        console.log(this.animal)

    },
    props: {
        "currentAnimal": {
            required: true
        },
        "currentSpecies": {
            required: true
        },

    },
    data() {
        return {
            animal: [],
            species: []

        }

    },
    methods: {

    }
}
</script>

<style scoped>

</style>
