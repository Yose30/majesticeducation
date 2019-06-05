<template>
    <div>
    <b-container fluid>
        <b-row>
            <b-col cols="4">
                <div v-for="categoria in categorias" >
                    <b-list-group v-b-scrollspy:listgroup-ex>
                        <b-list-group-item href="#list-item-{{categoria.id}}">{{categoria.categoria}}</b-list-group-item>
                    </b-list-group>
                </div>
            </b-col>

            <b-col cols="8">
                <div id="listgroup-ex" style="position:relative; overflow-y:auto; height:300px">
                <h4 id="list-item-1">Item 1</h4>
                <p></p>
                <h4 id="list-item-2">Item 2</h4>
                <p></p>
                <h4 id="list-item-3">Item 3</h4>
                <p></p>
                <h4 id="list-item-4">Item 4</h4>
                <p></p>
                <h4 id="list-item-5">Item 5</h4>
                <p></p>
                </div>
            </b-col>
        </b-row>
    </b-container>
    </div>
</template>

<script>
  export default {
    name: 'app',
    props: ['documentos', 'categorias'],
    data() {
        return {
            documento: '',
        }
    },
    methods: {
        datos(documento) {
            console.log(documento);
            this.documento = documento;
        }
    }
  }
</script>
