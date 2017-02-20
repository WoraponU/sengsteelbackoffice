<template>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" :src="userPhoto">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{ firstName }} {{ lastName }}<i class="material-icons right">more_vert</i></span>
                <p>{{ licensePlate }}</p>
                <p>{{ maintainDate }}</p>
            </div>
            <div class="card-reveal left-align">
                <span class="card-title grey-text text-darken-4">{{ firstName }} {{ lastName }}<i class="material-icons right">close</i></span>
                <div class="section">
                    <blockquote>
                        <p>วันที่: {{ maintainDate }}</p>
                        <p>ผู้ซ่อม: {{ maintainEmployee }}</p>
                        <table>
                            <thead>
                            <tr>
                                <th data-field="id">รายการ</th>
                                <th data-field="name">ค่าแรง</th>
                                <th data-field="price">ค่าอะไหล่</th>
                            </tr>
                            </thead>

                            <tbody>
                                <tr v-for="maintainData in maintainDatas">
                                    <td>{{ maintainData.maintainList }}</td>
                                    <td>{{ maintainData.wagePerList }}</td>
                                    <td>{{ maintainData.sparePerList }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>ค่าแรงทั้งหมด: {{ totalWage }} บาท</p>
                        <p>ค่าอะไหล่ทั้งหมด: {{ totalSpare }} บาท</p>
                        <p>ค่าใช้จ่ายทั้งหมด: {{ amountCost }} บาท</p>
                        <p>บันทึกรายละเอียด: {{ note }}</p>
                    </blockquote>
                </div>
            </div>
            <div class="card-action right-align">
                <a  v-if="userModelRole == 'main_admin'" href="#modalEditMaintain" @click="showModalEditMaintain = true" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">mode_edit</i>
                </a>
                <a  v-if="userModelRole == 'main_admin'" href="#modalDeleteMaintain" @click="showModalDeleteMaintain = true" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">delete</i>
                </a>
            </div>
        </div>
        <ModalEditMaintain v-if="showModalEditMaintain"
            :id="id"
            :firstName="firstName"
            :lastName="lastName"
            :userPhoto="userPhoto"
            :truckDriver="truckDriver"
            :truckPhoto="truckPhoto"
            :licensePlate="licensePlate"
            :maintainDate="maintainDate"
            :maintainEmployee="maintainEmployee"
            :maintainLists="maintainLists"
            :wagePerList="wagePerList"
            :sparePerList="sparePerList"
            :totalWage="totalWage"
            :totalSpare="totalSpare"
            :amountCost="amountCost"
            :note="note"
        ></ModalEditMaintain>

        <ModalDeleteMaintain v-if="showModalDeleteMaintain"
            :id="id"
            :firstName="firstName"
            :lastName="lastName"
            :licensePlate="licensePlate"
            :maintainDate="maintainDate"
        ></ModalDeleteMaintain>
    </div>
</template>

<script>
    export default {
        props: {
            id: { require: true },
            firstName: { require: true },
            lastName: { require: true },
            userPhoto: { require: true },
            licensePlate: { require: true },
            maintainDate: { require: true },
            maintainEmployee: { require: true },
            maintainLists: { require: true },
            wagePerList: { require: true },
            sparePerList: { require: true },
            totalWage: { require: true },
            totalSpare: { require: true },
            amountCost: { require: true },
            note: { require: true },
            truckDriver: { require: true },
            truckPhoto: { require: true },
            userModelRole: { require: true },
        },
        data() {
            return {
				maintainDatas: [],  
                showModalEditMaintain: false,           
                showModalDeleteMaintain: false,           
            }
        },
        beforeMount() {
            const maintainLists = JSON.parse(this.maintainLists);
            const wagePerList = JSON.parse(this.wagePerList);
            const sparePerList = JSON.parse(this.sparePerList);
            let dataPush = [];

            for (let i = 0 ; i < maintainLists.length; i++) {
                dataPush.push({ 
                    maintainList: maintainLists[i],
                    wagePerList: wagePerList[i],
                    sparePerList: sparePerList[i],
                })
            }
            this.maintainDatas = dataPush;
        },
        updated() {
            $('.modal').modal({
                complete: function() {
                    this.showModalEditMaintain = false
                    this.showModalDeleteMaintain = false
                }
            });
        }
    }
</script>