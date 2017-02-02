<template>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" :src="photo">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{ licensePlate }}<i class="material-icons right">more_vert</i></span>
                <p>{{ owner }}</p>
            </div>
            <div class="card-reveal left-align">
                <span class="card-title grey-text text-darken-4">{{ licensePlate }}<i class="material-icons right">close</i></span>
                <div class="section">
                    <blockquote>
                        <p>Owner: {{ owner }}</p>
                        <p>Register Date: {{ registerDate }}</p>
                        <p>Annual Tax Date: {{ annualTaxDate }}</p>
                        <p>Gasoline: {{ gasoline }}</p>
                        <p>Lubricator: {{ lubricator }}</p>
                        <p>Gear Box Oil: {{ gearBoxOil }}</p>
                        <p>Final Gear Oil: {{ finalGearOil }}</p>
                        <p>Last Number Car: {{ lastNumberCar }}</p>
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
        <ModalEditTruck v-if="showModalEdit" :id="id"></ModalEditTruck>        
        <ModalDelete v-if="showModalDelete" :id="id" :firstname="firstname" :lastname="lastname"></ModalEdit>        
    </div>
</template>

<script>
    export default {
        props: {
            id: { require: true },
            licensePlate: { require: true },
            owner: { require: true },
            photo: { require: true },
            registerDate: { require: true },
            annualTaxDate: { require: true },
            gasoline: { require: true },
            lubricator: { require: true },
            gearBoxOil: { require: true },
            finalGearOil: { require: true },
            lastNumberCar: { require: true },
            numberWheelPerRow: { require: true },
            rowOfWheel: { require: true },
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