
<template>



   <div class="container">

        <div class="columns is-multiline">
            <div

                class="card column is-full block"
            >



                    <header class="card-header" v-if="edit">
                        <h1 class="card-header-title columns">

                            <div class="column is-10">
                                {{form.name}}
                            </div>

                            <div class="column is-2">
                                <div class="is-pulled-right">
                                    {{form.species_id}}
                                </div>

                            </div>


                        </h1>
                    </header>
                    <div class="card-content">
                        <div class="content columns">


                            <form @submit.prevent="submit" class="column">
                                <div class="field" v-if="!edit">
                                    <label class="label" for="title">Title</label>
                                    <div class="control">
                                        <input id="title"
                                               v-model="form.name"
                                               class="input"
                                               v-bind:class="{ 'is-danger': form.errors.has('name')}"
                                               type="text" autofocus>
                                    </div>
                                    <p class="help is-danger" v-if="form.errors.has('name')"
                                       v-text="form.errors.get('name')"/>
                                </div>

                                <div class="field">

                                    <div class="control">


                                        <div class="block"  >
                                            Animals:
                                            <a v-for="(animal, index) in species.animals" :key="index" :href="'/animal/' + animal.slug" class="tag is-link">
                                                {{animal.name}}
                                            </a>
                                        </div>

                                    </div>

                                </div>

                                <div class="field">
                                    <label class="label" for="body">Description</label>
                                    <div class="control">
                                        <textarea id="body" v-model="form.description" class="textarea"></textarea>
                                    </div>
                                    <p class="help is-danger" v-if="form.errors.has('body')"
                                       v-text="form.errors.get('body')"/>
                                </div>

                                <button type="submit" class="button is-large is-primary is-outlined is-fullwidth"
                                        v-text="edit ? 'Save' : 'Post'" :disabled="loading"/>
                            </form>

                        </div>
                    </div>

            </div>

        </div>
    </div>
</template>

<script>
let form = new Form({
    'species_id': '',
    'name': '',
    'description': '',
    'animal_id': '',
    'noReset': ['animal_id']
});
export default {

    name: "Species",
    mounted() {

    },
    created() {
        this.form = form;
        this.animal = this.currentAnimals;
        this.species = this.currentSpecies;
        this.edit = this.isEditable;

        this.loading= false
        console.log(this.animal)
        console.log(this.species);

        if (this.edit) {
            this.url = '/species/' + this.currentSpecies.slug;
            this.form.name = this.species.name;
            this.form.animal_id = this.species.animal_id;
            this.form.species_id = this.species.id;
            this.form.description = this.species.description;
            this.form.noReset = ['animal_id', 'name', 'description', 'species_id'];
        } else {
            this.url = '/species';
        }


    },
    props: {
        "currentAnimals": {

        },
        "currentSpecies": {

        },
        isEditable: {
            required: false,
            type: Boolean,
            default: false
        },
    },
    data() {
        return {
            form: null,
            animal: [],
            species: [],
            speciesList: [],
            edit: false,
            url: "",
            noSpecies: true,
            loading: true
        }

    },
    methods: {
        getSpecies(){
            window.axios.get( `/list/species`).then((response)=>{
                console.log(response);
                this.speciesList = response.data.filter((element)=> element.name)
                this.noSpecies = false;
            }).catch((err) => {
                console.error("Something went wrong", err)
            })
        },
        submit() {
            if (this.edit) {
                console.log(this.form)
                this.form
                    .put(this.url);
            }
            else {

                this.form
                    .post(this.url)
                    .then((response) => {
                        console.log(response);
                        this.url = '/species/' + response.slug;
                        this.form.species_id = response.id;
                        this.form.name = response.name;
                        this.form.description = response.description;
                        this.form.animal_id = response.animal_id;
                        this.form.noReset = ['animal_id', 'name', 'description', 'species_id'];
                        this.edit = true;
                        window.history.pushState("", "", this.url);
                    });
        }
    },
    }
}
</script>

<style scoped>

</style>
