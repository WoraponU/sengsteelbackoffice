<template>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" :src="photo">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{ firstName }} {{ lastName }}<i class="material-icons right">more_vert</i></span>
                <p>{{ licensePlate }}</p>
            </div>
            <div class="card-reveal left-align">
                <span class="card-title grey-text text-darken-4">{{ firstName }} {{ lastName }}<i class="material-icons right">close</i></span>
                <div class="section">
                    <blockquote>
                        <p>วัน/เวลา: {{ tireDate }}</p>
                        <p>ผู้เปลี่ยน: {{ tireEmployee }}</p>
                        <p>ชนิดยาง: {{ typeOfTire }}</p>
                        <p>ยี่ห้อ: {{ brandOfTire }}</p>
                        <p>ราคา/เส้น: {{ pricePerUnit }}</p>
                        <p>ค่าแรง/เส้น: {{ wagePerUnit }}</p>
                        <p>ตัวแม่ตัวลูก: {{ sectionOfTire }}</p>
                        <p>ยางแถวที่: {{ rowOfTire }}</p>
                        <p>หมายเลขยาง: {{ numberOfTire }}</p>
                        <p>จำนวน: {{ quantity }}</p>
                        <p>ราคายางทั้งหมด: {{ totalTirePrice }}</p>
                        <p>ค่าใช้จ่ายทั้งหมด: {{ totalAmoutCost }}</p>
                        <p>ผู้เปลี่ยน: {{ note }}</p>
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
            tireDate: { require: true },
            tireEmployee: { require: true },
            typeOfTire: { require: true },
            brandOfTire: { require: true },
            pricePerUnit: { require: true },
            wagePerUnit: { require: true },
            photoTire: { require: true },
            sectionOfTire: { require: true },
            rowOfTire: { require: true },
            numberOfTire: { require: true },
            quantity: { require: true },
            totalTirePrice: { require: true },
            totalAmoutCost: { require: true },
            note: { require: true },
        },
    }
</script>