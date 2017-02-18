<template>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" :src="userPhoto">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{ firstName }} {{ lastName }}<i class="material-icons right">more_vert</i></span>
                <p>{{ licensePlate }}</p>
                <p>{{ tireDate }}</p>
            </div>
            <div class="card-reveal left-align">
                <span class="card-title grey-text text-darken-4">{{ firstName }} {{ lastName }}<i class="material-icons right">close</i></span>
                <div class="section">
                    <blockquote>
                        <p>วันที่: {{ tireDate }}</p>
                        <p>ผู้เปลี่ยน: {{ tireEmployee }}</p>
                        <p>ชนิดยาง: {{ typeOfTire }}</p>
                        <p>ยี่ห้อ: {{ brandOfTire }}</p>
                        <p>ราคา/เส้น: {{ pricePerUnit }} บาท</p>
                        <p>ค่าแรง/เส้น: {{ wagePerUnit }} บาท</p>
                        <p>ตัวแม่ตัวลูก: {{ sectionOfTire }}</p>
                        <p>ยางแถวที่: {{ rowOfTire }}</p>
                        <p>หมายเลขยาง: {{ numberOfTire }}</p>
                        <p>จำนวน: {{ quantity }}</p>
                        <p>ราคายางทั้งหมด: {{ totalTirePrice }} บาท</p>
                        <p>ค่าใช้จ่ายทั้งหมด: {{ totalAmoutCost }} บาท</p>
                        <p>บันทึกรายละเอียด: {{ note }}</p>
                    </blockquote>
                </div>
            </div>
            <div class="card-action right-align">
                <a @click="showModalEditTire = true" href="#modalEditTire" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">mode_edit</i>
                </a>
                <a @click="" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">delete</i>
                </a>
            </div>
        </div>
        <ModalEditTire v-if="showModalEditTire"
            
        ></ModalEditTire>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                showModalEditTire: false
            }
        },
        props: {
            id: { require: true },
            firstName: { require: true },
            lastName: { require: true },
            userPhoto: { require: true },
            truckDriver: { require: true },
            truckPhoto: { require: true },
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
        updated() {
            $('.modal').modal({
                complete: function() { 
                    this.showModalEditTire = false
                }
            });
        }
    }
</script>