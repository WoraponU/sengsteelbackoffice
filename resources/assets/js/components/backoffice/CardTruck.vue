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
                        <p>เจ้าของ: {{ owner }}</p>
                        <p>วันที่จดทะเบียน: {{ registerDate }}</p>
                        <p>วันที่ต่อทะเบียน: {{ annualTaxDate }}</p>
                        <p>น้ำมันเครื่องยนต์: {{ gasoline }}</p>
                        <p>น้ำมันห้องเครื่อง: {{ lubricator }}</p>
                        <p>น้ำมันห้องเกียร์: {{ gearBoxOil }}</p>
                        <p>น้ำมันเฟืองท้าย: {{ finalGearOil }}</p>
                        <p v-for="(numberWheel, index) in thisNumberWheelPerRow">จำนวนล้อแถวที่ {{ index + 1 }}: {{ numberWheel }}</p>
                    </blockquote>
                    
                </div>
            </div>
            <div class="card-action right-align">
                <a v-if="userModelRole == 'main_admin'" @click="onCallModalEdit" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">mode_edit</i>
                </a>
                <a href="#modalReportTruck" v-if="userModelRole == 'main_admin'" @click="onCallModalReport" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">print</i>
                </a>
                <a v-if="userModelRole == 'main_admin'" @click="onCallModalDelete" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">delete</i>
                </a>
            </div>
        </div>
        <ModalReportTruck v-if="showModalReport" :id="id"></ModalReportTruck>        
        <ModalEditTruck v-if="showModalEdit" :id="id"></ModalEditTruck>        
        <ModalDeleteTruck v-if="showModalDelete" :id="id" :licensePlate="licensePlate" ></ModalDeleteTruck>        
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
            userModelRole: { require: true },
        },
        data() {
            return {
                showModalEdit: false,
                showModalDelete: false,
                showModalReport: false,
                thisNumberWheelPerRow: '',
            }
        },
        beforeMount() {
            const numberWheelPerRow = JSON.parse(this.numberWheelPerRow);
            this.thisNumberWheelPerRow = numberWheelPerRow
        },
        updated: function() {
            $('.modal').modal({
                complete: () => {
                    this.showModalReport = false
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
            },
            onCallModalReport() {
                this.showModalReport = true
            }
        }
    }
</script>