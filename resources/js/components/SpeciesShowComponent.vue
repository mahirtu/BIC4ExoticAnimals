<template>



   <div class="container">
        <div class="columns is-multiline">
            <div

                class="card column is-full block"
            >



                    <header class="card-header">
                        <h1 class="card-header-title columns">

                            <div class="column is-10">
                                {{species.name}}
                            </div>

                            <div class="column is-2">
                                <div class="is-pulled-right">
                                    {{species.id}}
                                </div>

                            </div>


                        </h1>
                    </header>
                    <div class="card-content">
                        <div class="content columns">
                            <div class="column is-10">
                                <div class="block">
                                    {{species.description}}
                                </div>

                                <div class="block"  >
                                    Animals:
                                    <a v-for="(animal, index) in animal" :key="index" :href="'/animal/' + animal.slug" class="tag is-link">
                                    {{animal.name}}
                                </a>
                                </div>

                            </div>
                            <div class="column is-2">
                                <a class="button is-primary is-pulled-right" :href="'/species/' + species.slug + '/edit'">
                                    Edit Species
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-footer-item">
                            Created at: <div class="tag">{{species.created_at}}</div>
                            Updated at: <div class="tag">{{species.updated_at}} </div>

                        </div>

                    </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "Species",
    mounted() {

    },
    created() {
        this.animal = this.currentAnimal;
        this.species = this.currentSpecies;
        console.log(this.animal)
        console.log(this.species);
    },
    props: {
        "currentAnimal": {
            required: true
        },
        "currentSpecies": {
            required: true
        }
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
