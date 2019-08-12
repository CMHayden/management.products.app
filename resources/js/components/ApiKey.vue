<style scoped>
    .action-link {
        cursor: pointer;
    }
</style>

<template>
    <div>
        <div>
            <div class="card card-default">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span v-if="key.length === 0">
                            API Key
                        </span>
                        <span v-if="key.length > 0">
                            API Tokens
                        </span>

                        <a class="action-link" tabindex="-1" @click="showAddAPIKeyForm" v-if="key.length === 0">
                            Add API Key
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- No Key Notice -->
                    <p class="mb-0" v-if="key.length === 0">
                        You have not added any API Keys.
                    </p>

                    <!-- API Tokens options -->
                    <table class="table table-borderless mb-0" v-if="key.length > 0">
                        <tbody>
                            <tr>
                                <td style="vertical-align: middle;">
                                    <a class="action-link text-primary" href="#" @click="del">
                                        Remove key
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align: middle;">
                                    <a class="action-link text-primary" href="#">
                                        Another option maybe remove product
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add API Key Modal -->
        <div class="modal fade" id="modal-add-api-key" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Add API Key
                        </h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="form.errors.length > 0">
                            <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in form.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Add API Key Form -->
                        <form role="form" @submit.prevent="store">
                            <!-- Name -->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Key</label>

                                <div class="col-md-6">
                                    <input id="add-api-key" type="text" class="form-control" name="key" v-model="form.name">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" @click="store">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Access Token Modal -->
        <div class="modal fade" id="modal-access-token" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Success
                        </h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <p>
                            Succesfully added a new API Key
                        </p>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
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

                form: {
                    key: '',
                    errors: []
                }
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

                $('#modal-add-api-key').on('shown.bs.modal', () => {
                    $('#add-api-key').focus();
                });

            },

            getkey() {
                axios.get('/api/viewkeys')
                    .then(response => {
                        this.key = response.data;
                        return response.data
                    });
            },

            /**
             * Show the form for creating new keys.
             */
            showAddAPIKeyForm() {
                $('#modal-add-api-key').modal('show');
            },

            /**
             * Create a new personal access token.
             */
            store() {

                let key = document.getElementById('add-api-key').value;

                if(key == ""){
                    this.form.errors = ['Please insert a valid API Key'];
                    return 0;
                }

                axios.post('/api/addkey', key)
                    .then(response => {
                        if(response.status == 200) {
                            this.key = key;
                            alert("Key added");
                        }
                    });

                $('#modal-add-api-key').modal('hide');

            },

            /**
             * Delete API Key
             */
            del() {

                axios.get('/api/removekey', 1)
                    .then(response => {
                        if(response.status == 200) {
                            this.key = '';
                            alert("Key removed");
                            return 1
                        }
                        alert("Error: " + response.status);
                    });

            }
        }
    }
</script>
