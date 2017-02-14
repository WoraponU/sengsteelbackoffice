<template>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" :src="photo">
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
                        <p>วัน/เวลา: {{ fuelDate }}</p>
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
                <a @click="" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">mode_edit</i>
                </a>
                <a @click="" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">delete</i>
                </a>
            </div>
        </div>
        <!--<ModalEditUser v-if="showModalEdit" :id="id"></ModalEditUser>        
        <ModalDeleteUser v-if="showModalDelete" :id="id" :firstname="firstname" :lastname="lastname"></ModalDeleteUser>        -->
    </div>
</template>

<script>
    export default {
        props: {
            id: { require: true },
            firstName: { require: true },
            lastName: { require: true },
            photo: { require: true },
            licensePlate: { require: true },
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
        },
    }
</script>