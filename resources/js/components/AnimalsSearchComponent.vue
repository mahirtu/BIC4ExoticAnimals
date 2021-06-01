<template>
    <div>
    <div class="container">
        <form  @submit.prevent="submit" class="column">
            <div class="field">
                <label class="label" for="title">Query</label>
                <div class="control">
                    <input id="title"
                           v-model="form.q"
                           name="query"
                           class="input"
                           type="text" autofocus>
                </div>

            </div>
            <button class="button is-primary " >
                Search animals
            </button>
        </form>


    </div>
    <div class="container">
        <animal-list-component v-if="shouldShow"  :all-animals="animals" ></animal-list-component>
    </div>
    </div>

</template>

<script>



let form = new Form({
    'q': ''
});
export default {
    name: "AnimalsSearch",

    created() {

        this.form = form;
        this.form.q = "";

    },

    data() {
        return {
            animals: [],
            query : '',
            show: false

        }

    },
    methods: {
        submit(){
            this.show = false;
            this.form.post( `/search/animal`).then((response)=>{
                this.animals = response;
                this.show = true;
            }).catch((err) => {
                console.error("Something went wrong", err)
            })
        },
    },
    computed: {
        shouldShow() {
            return this.show
        }
    }
}
</script>

<style scoped>

</style>
