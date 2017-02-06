<template>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" :src="photo">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{ firstname }} {{ lastname }}<i class="material-icons right">more_vert</i></span>
                <p>{{ role }}</p>
            </div>
            <div class="card-reveal left-align">
                <span class="card-title grey-text text-darken-4">{{ firstname }} {{ lastname }}<i class="material-icons right">close</i></span>
                <div class="section">
                    <blockquote>
                        <p>Role: {{ role }}</p>
                        <p>ID Number: {{ identificationNumber }}</p>
                        <p>Driver's License: {{ driverLicense }}</p>
                        <p>Tel. {{ phone }}</p>
                        <p>Email: {{ email }}</p>
                        <p>Address: {{ address }}</p>
                    </blockquote>
                </div>
            </div>
            <div class="card-action right-align">
                <a @click="onCallModalEdit" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">mode_edit</i>
                </a>
                <a @click="onCallModalDelete" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">delete</i>
                </a>
            </div>
        </div>
        <ModalEditUser v-if="showModalEdit" :id="id"></ModalEditUser>        
        <ModalDeleteUser v-if="showModalDelete" :id="id" :firstname="firstname" :lastname="lastname"></ModalDeleteUser>        
    </div>
</template>

<script>
    export default {
        props: {
            id: { require: true },
            firstname: { require: true },
            lastname: { require: true },
            identificationNumber: { require: true },
            driverLicense: { require: true },
            email: { require: true },
            phone: { require: true },
            photo: { require: true },
            address: { require: true },
            role: { require: true },
        },
        data() {
            return {
                showModalEdit: false,
                showModalDelete: false,
            }
        },
        updated: function() {
            $('.modal').modal({
                complete: () => {
                    this.showModalEdit = false
                    this.showModalDelete = false
                }
            });
            $('#modalEdit').modal('open');
            $('#modalDelete').modal('open');
        },
        methods: {
            onCallModalEdit() {
                this.showModalEdit = true
            },
            onCallModalDelete() {
                this.showModalDelete = true
            }
        }
    }
</script>