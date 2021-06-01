<template>

    <div class="container">
        <div class="columns is-multiline">
            <div

                class="card column is-full block" v-for="(species, index) in species" :key="index"
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
                                <a v-for="(animal, index) in species.animals" :key="index" :href="'/animal/' + animal.slug" class="tag is-link">
                                    {{animal.name}}
                                </a>
                            </div>

                        </div>
                        <div class="column action-buttons">
                            <div class="is-pulled-right">
                                <a class="button is-primary " :href="'/species/' + species.slug">
                                    Show Species
                                </a>
                                <button  @click="deleteSpecies(species.slug)"
                                         class="button  is-danger is-outlined ">Delete Species
                                </button>
                            </div>

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
    props: {
        "allSpecies": {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            species: []
        }

    },
    created() {
        this.species = this.allSpecies;
        console.log(this.species)
    },
    methods: {
        getSpecies(){
            window.axios.get( `/list/species`).then((response)=>{

                this.species = response.data
            }).catch((err) => {
                console.error("Something went wrong", err)
            })
        },
        deleteSpecies(speciesSlug){


            window.axios.delete( `/species/`+speciesSlug).then((response)=>{
                console.log(response);
                this.getSpecies();
            }).catch((err) => {
                console.error("Something went wrong", err)
            })
        }
    }
}
</script>

<style scoped>

.tag.is-link {
    margin: 2px;
}

.action-buttons .button{
    margin-bottom: 5px;

}

</style>
