<template>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" :src="photo">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{ firstname }} {{ lastname }}<i class="material-icons right">more_vert</i></span>
                <p>{{ showRole }}</p>
            </div>
            <div class="card-reveal left-align">
                <span class="card-title grey-text text-darken-4">{{ firstname }} {{ lastname }}<i class="material-icons right">close</i></span>
                <div class="section">
                    <blockquote>
                        <p>ตำแหน่ง: {{ showRole }}</p>
                        <p>เลขประจำตัวประชาชน: {{ identificationNumber }}</p>
                        <p>เลขใบขับขี่: {{ driverLicense }}</p>
                        <p>เบอร์ 0{{ phone }}</p>
                        <p>อีเมลล์: {{ email }}</p>
                        <p>ที่อยู่: {{ address }}</p>
                    </blockquote>
                </div>
            </div>
            <div class="card-action right-align">
                <a v-if="userModelRole == 'main_admin'" @click="onCallModalEdit" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">mode_edit</i>
                </a>
                <a v-if="userModelRole == 'main_admin'" @click="onCallModalReport" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">print</i>
                </a>
                <a v-if="userModelRole == 'main_admin' && userModelId != id" @click="onCallModalDelete" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">delete</i>
                </a>
            </div>
        </div>
        <ModalReportUser v-if="showModalReport" :id="id"></ModalReportUser>        
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
            userModelRole: { require: true },
            userModelId: { require: true },
        },
        data() {
            return {
                showModalEdit: false,
                showModalDelete: false,
                showModalReport: false,
            }
        },
        computed: {
            showRole: function () {
                if (this.role == 'main_admin') {
                    return 'ผู้ดูแลหลัก';
                } else if (this.role == 'admin') { 
                    return 'ผู้เพิ่มข้อมูล';
                } else {
                    return 'พนักงานขับรถ';
                }
            }
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
            },
        }
    }
</script>