<style scoped>
    .action-link {
        cursor: pointer;
    }

    .customstyle {
        text-align: center;
        margin: 15px;
    }
</style>

<template>
    <div>
        <div>
            <div id="hot"></div>
            <div id="export-buttons" class="visible customstyle">
                <button id="export-csv" class="btn size-medium btn-success text-white shadow hover-moveup" style="margin-right: 5px;">Export as .csv</button>
                <button id="store-api" class="btn size-medium btn-primary text-white shadow hover-moveup">Send to API</button>
            </div>
        </div>
    </div>


</template>
<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                accessToken: null,

                key: '',
                scopes: [],

            };
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {

                this.getkey();
                this.table();

            },

            getkey() {
                axios.get('/api/viewkeys')
                    .then(response => {
                        this.key = response.data;
                        var parsedobj = JSON.parse(JSON.stringify(this.key))
                        console.log(parsedobj[0])

                        console.log(this.key);
                        return response.data
                    });
            },

            /**
             * Creates the excel table
             */
            table(){
                var hotElement = document.querySelector('#hot');
                var hotElementContainer = hotElement.parentNode;
                var hotSettings = {
                    columns: [
                    {
                        data: 'ProductName',
                        type: 'text',
                        width: 60
                    },
                    {
                        data: 'ProductModel',
                        type: 'text',
                        width: 60
                    },
                    {
                        data: 'Description',
                        type: 'text'
                    },
                    {
                        data: 'SKU',
                        type: 'numeric',
                        width: 40
                    },
                    {
                        data: 'Price',
                        type: 'numeric',
                        width: 40
                    }
                    ],
                    stretchH: 'all',
                    width: 1037,
                    autoWrapRow: true,
                    manualRowResize: true,
                    manualColumnResize: true,
                    height: 300,
                    rowHeaders: true,
                    colHeaders: [
                    'Name',
                    'Model',
                    'Description',
                    'SKU',
                    'Price'
                    ],
                    dropdownMenu: true,
                    exportFile: true,
                    contextMenu: true
                };

                var hot = new Handsontable(hotElement, hotSettings);

                document.getElementById("export-csv").addEventListener("click", function(event) { hot.getPlugin("exportFile").downloadFile("csv", {filename: "product.management.addProdcut"});})

                document.getElementById("store-api").addEventListener('click', function() {

                    /* Test data - Saves writing it out everytime just being able to copy paste
                    iPhone	test	test desc	111111	5
                    oPhone	test	test desc	111112	6
                    aPhone	test	test desc	111113	7
                    ePhone	test	test desc	111114	8
                    uPhone	test	test desc	111115	9
                    */

                    axios.post('/api/products', JSON.stringify(hot.getData()))
                        .then(response => {
                            if(response.status == 200) {
                                alert("Products added");
                                hot.clear();
                                return 0;
                            }
                            console.error("Unexpected error. Please contact Chris to fix it");
                        });


                    console.log(hot.getData());
                    console.log(JSON.stringify(hot.getData()));
                });
            },
        }
    }


</script>
