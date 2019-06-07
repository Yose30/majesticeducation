<template>
    <div>
        <table class="table">
            <tbody>
                <tr v-for="link in links">
                    <td>{{ link.titulo }}</td>
                    <td>
                        <a 
                            class="btn"
                            :href="link.url" 
                            :style="{'background-color': '#7d4f9d', 'color': '#ffffff'}" 
                            v-b-tooltip.hover 
                            title="Abrir link"
                            target="_blank">
                            <i class="fa fa-globe"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
  
    </div>
</template>


<script>
    export default {
        name: 'app',
        props: ['links'],
        data() {
            return {
                link: '',
            }
        },
        methods: {
            datos(link) {
                console.log(link);
                this.link = link;
            }
        }
    }
</script>
