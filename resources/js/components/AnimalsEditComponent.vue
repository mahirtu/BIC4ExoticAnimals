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
                                    {{form.animal_id}}
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
                                    <label class="label" for="species">Species</label>
                                    <div class="control">
                                        <div class="select is-fullwidth" :class="loading ? 'is-loading' : ''">
                                            <select id="species" :disabled="loading" v-model="form.species_id">
                                                <option v-if="loading" :value="form.species_id"> Loading...</option>
                                                <option v-for="cat in speciesList" v-if="!loading" v-text="cat.name"
                                                        :value="cat.id"/>
                                            </select>
                                        </div>
                                    </div>
                                    <p class="help is-danger" v-if="form.errors.has('category_id')"
                                       v-text="form.errors.get('category_id')"/>
                                    <p v-if="noSpecies" class="help is-warning">Add some species to create animals!</p>
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
    'animal_id': '',
    'name': '',
    'description': '',
    'species_id': '',
    'noReset': ['category_id']
});
export default {

    name: "Animal",
    mounted() {
        this.getSpecies();
    },
    created() {
        this.form = form;
        this.animal = this.currentAnimal;
        this.species = this.currentSpecies;
        this.edit = this.isEditable;

        this.loading= false
        console.log(this.animal)
        console.log(this.species);

        if (this.edit) {
            this.url = '/animal/' + this.currentAnimal.slug;
            this.form.name = this.animal.name;
            this.form.animal_id = this.animal.id;
            this.form.species_id = this.animal.species_id;
            this.form.description = this.animal.description;
            this.form.noReset = ['animal_id', 'name', 'description', 'species_id'];
        } else {
            this.url = '/animal';
        }


    },
    props: {
        "currentAnimal": {

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
                        this.url = '/animal/' + response.slug;
                        this.form.animal_id = response.id;
                        this.form.name = response.name;
                        this.form.description = response.description;
                        this.form.species_id = response.species_id;
                        this.form.noReset = ['animal_id', 'name', 'description', 'species_id'];
                        this.edit = true;

                    });
        }
    },
    }
}
</script>

<style scoped>

</style>
