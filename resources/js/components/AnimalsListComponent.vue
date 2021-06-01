<template>


    <div class="container">
        <div class="columns is-multiline">
            <div

                class="card column is-full block"  v-for="(animal, index) in animals" :key="index"
            >



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
                            <div class="column is-8">
                                <div class="block">
                                    {{animal.description}}
                                </div>

                                <div class="block" v-if="animal.species">
                                    Species   <a :href="'/species/' + animal.species.slug" class="tag is-link">
                                    {{animal.species.name}}
                                </a>
                                </div>
                            </div>
                            <div class="column  ">
                                <div class="is-pulled-right">
                                    <a class="button is-primary " :href="'/animal/' + animal.slug">
                                        Show Animal
                                    </a>
                                    <button  @click="deleteAnimal(animal.slug)"
                                             class="button  is-danger is-outlined ">Delete Animal
                                    </button>
                                </div>

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
    props: {
        "allAnimals": {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            animals: []
        }

    },
    created() {
        this.animals = this.allAnimals;
    },

    methods: {


        getAnimals(){
            window.axios.get( `/list/animal`).then((response)=>{
                console.log(response);
                this.animals = response.data
            }).catch((err) => {
                console.error("Something went wrong", err)
            })
        },
        deleteAnimal(animalSlug){
            console.log(animalSlug)

            window.axios.delete( `/animal/`+animalSlug).then((response)=>{
                console.log(response);
                this.getAnimals();
            }).catch((err) => {
                console.error("Something went wrong", err)
            })
        }
    }
}
</script>

<style scoped>

</style>
