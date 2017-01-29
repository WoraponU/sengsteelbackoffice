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
                <!--<div class="divider"></div>-->
                <div class="section">
                    <blockquote>
                        <p>Role: {{ role }}</p>
                        <p>Identification Number: {{ identificationNumber }}</p>
                        <p>Tel. {{ phone }}</p>
                        <p>Email: {{ email }}</p>
                        <p>Address: {{ address }}</p>
                    </blockquote>
                </div>
            </div>
            <div class="card-action right-align">
                <a @click="onCallModalEdit" href="#modalEdit" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">mode_edit</i>
                </a>
                <a href="#modalUser" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">delete</i>
                </a>
            </div>

            <ModalEdit></ModalEdit>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            firstname: { require: true },
            lastname: { require: true },
            identificationNumber: { require: true },
            email: { require: true },
            phone: { require: true },
            photo: { require: true },
            address: { require: true },
            role: { require: true },
        },
        data() {
            return {
                showModalEdit: false
            }
        },
        methods: {
            onCallModalEdit() {
                this.showModalEdit = true
            }
        }
        

    }
</script>