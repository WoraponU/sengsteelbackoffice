<template>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" :src="userPhoto">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{ firstName }} {{ lastName }}<i class="material-icons right">more_vert</i></span>
                <p>{{ licensePlate }}</p>
                <p>{{ fuelDate }}</p>
            </div>
            <div class="card-reveal left-align">
                <span class="card-title grey-text text-darken-4">{{ firstName }} {{ lastName }}<i class="material-icons right">close</i></span>
                <div class="section">
                    <blockquote>
                        <p>วันที่: {{ fuelDate }}</p>
                        <p>ผู้เติม: {{ gasEmployee }}</p>
                        <p>ประเภทน้ำมัน: {{ gasType }}</p>
                        <p>หมายเลขกิโลเมตรครั้งก่อน: {{ lastNumberCar }}</p>
                        <p>หมายเลขกิโลเมตรล่าสุด: {{ presentNumberCar }}</p>
                        <p>จำนวนลิตร: {{ liter }} ลิตร</p>
                        <p>ระยะทางที่วิ่ง: {{ totalDistance }} กิโลเมตร</p>
                        <p>อัตราการใช้น้ำมัน: {{ gasPerDistance }} กิโลเมตร/ลิตร</p>
                        <p>บันทึกรายละเอียด: {{ note }}</p>
                    </blockquote>
                </div>
            </div>
            <div class="card-action right-align">
                <a v-if="userModelRole == 'main_admin'" @click="showModalEditFuel = true" href="#modalEditFuel" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">mode_edit</i>
                </a>
                <a  v-if="userModelRole == 'main_admin'" @click="showModalDeleteFuel = true" href="#modalDeleteFuel" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">delete</i>
                </a>
            </div>
        </div>
        <ModalEditFuel v-if="showModalEditFuel" 
            :id="id"
            :firstName="firstName"
            :lastName="lastName"
            :userPhoto="userPhoto"
            :truckPhoto="truckPhoto"
            :licensePlate="licensePlate"
            :truckDriver="truckDriver"
            :fuelDate="fuelDate"
            :gasEmployee="gasEmployee"
            :gasType="gasType"
            :lastNumberCar="lastNumberCar"
            :presentNumberCar="presentNumberCar"
            :liter="liter"
            :note="note"
            :gasPerDistance="gasPerDistance"
            :totalDistance="totalDistance"
        ></ModalEditFuel>     
        <ModalDeleteFuel v-if="showModalDeleteFuel"
            :id="id" 
            :firstName="firstName" 
            :lastName="lastName" 
            :licensePlate="licensePlate" 
            :fuelDate="fuelDate" 
        ></ModalDeleteFuel>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                showModalEditFuel: false,
                showModalDeleteFuel: false
            }
        },
        props: {
            id: { require: true },
            firstName: { require: true },
            lastName: { require: true },
            userPhoto: { require: true },
            licensePlate: { require: true },
            truckPhoto: { require: true },
            truckDriver: { require: true },
            fuelDate: { require: true },
            gasEmployee: { require: true },
            gasType: { require: true },
            lastNumberCar: { require: true },
            presentNumberCar: { require: true },
            liter: { require: true },
            note: { require: true },
            gasPerDistance: { require: true },
            totalDistance: { require: true },
            userModelRole: { require: true },
        },
        updated() {
            $('.modal').modal({
                complete: function() { 
                    this.showModalEditFuel = false
                    this.showModalDeleteFuel = false
                }
            });
        },
    }
</script>