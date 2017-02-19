<template>
    <div id="modalEditMaintain" class="modal modal-fixed-footer">
        <form :action="action" method="POST">
            <input type="hidden" name="_token" v-model="csrfToken">
            <input type="hidden" name="_method" value="PUT">

            <div class="modal-content">
                <div class="container center-align">
                    <TruckAndDriverMap 
                        :truckDriver="thisTruckDriver"
                        :truckDriverPhoto="thisUserPhoto"
                        :licensePlate="thisLicensePlate"
                        :truckImage="thisTruckPhoto"
                    ></TruckAndDriverMap>
                    <div class="container tire-tab">
                        <div class="row left-align card-panel">
                            <div class="row">
                                <div class="col offset-l1">
                                    <h5>แก้ไขรายละเอียดการซ่อมบำรุง</h5>						
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-l2">
                                    <input type="date" class="datepicker" id="maintainDate" name="maintainDate" v-model="thisMaintainDate" required>
                                    <label for="maintainDate">วันที่ <span class="icon-star">*</span></label>
                                </div>
                                <div class="input-field col s12 m6 l4">
                                    <input id="maintainEmployee" name="maintainEmployee" type="text" class="validate" v-model="thisMaintainEmployee" required>
                                    <label for="maintainEmployee">ผู้ซ่อม <span class="icon-star">*</span></label>
                                </div>  
                            </div>

                            <div class="section">
                                <div class="row">
                                    <div class="col s8 m8 l8 offset-l2">
                                        <span class="section-header">รายการที่ซ่อม</span>
                                        <a class="btn-floating btn waves-effect waves-light right" @click="onAddListClick"><i class="material-icons">add</i></a>
                                        <a class="btn-floating btn waves-effect waves-light right" @click="onSubListClick"><i class="material-icons">remove</i></a>
                                    </div>
                                </div>
                                <div class="row" v-for="(list, index) in thisDataMaintainLists">
                                    <div class="input-field col s6 m6 l4 offset-l2">
                                        <input id="maintainLists" name="maintainLists[]" type="text" class="validate" v-model="list.maintainList" required>
                                        <label for="maintainLists">รายการ {{ index + 1 }} <span class="icon-star">*</span></label>
                                    </div> 
                                    <div class="input-field col s3 m3 l2">
                                        <input id="wagePerList" name="wagePerList[]" ref="wages" v-model="list.wageList" @change="onWagePerListChange" type="number" class="validate" required>
                                        <label for="wagePerList">ค่าแรง(บาท) <span class="icon-star">*</span></label>
                                    </div>
                                    <div class="input-field col s3 m3 l2">
                                        <input id="sparePerList" name="sparePerList[]" ref="spares" v-model="list.spareList" @change="onSparePerListChange" type="number" class="validate" required>
                                        <label for="sparePerList">ค่าอะไหล่(บาท) <span class="icon-star">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m12 l8 offset-l2">
                                    <textarea id="note" name="note" class="materialize-textarea" v-model="thisNote"></textarea>
                                    <label for="note">บันทึกรายละเอียด</label>
                                </div>
                            </div>
                            <div class="section">
                                <div class="row">
                                    <div class="input-field col s12 m12 l8 offset-l2">
                                        <blockquote>
                                            <p class="flow-text">ค่าแรงทั้งหมด: {{ thisTotalWage }} บาท</p>
                                            <p class="flow-text">ค่าอะไหล่ทั้งหมด: {{ thisTotalSpare  }} บาท</p>
                                            <p class="flow-text">ค่าใช้จ่ายทั้งหมด: {{ thisAmountCost }} บาท</p>
                                        </blockquote>
                                        <input type="hidden" name="totalWage" :value="thisTotalWage">
                                        <input type="hidden" name="totalSpare" :value="thisTotalSpare">
                                        <input type="hidden" name="amountCost" :value="thisAmountCost">
                                    </div>
                                </div>						
                            </div>
                        </div>
                    </div>       
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="modal-action waves-effect waves-green btn-flat ">แก้ไข</button>
                <button class="modal-action modal-close waves-effect waves-green btn-flat ">ปิด</button>
            </div>
        </form>                  
    </div>
</template>

<script>
    export default {
        data() {
            return {
                csrfToken: window.Laravel.csrfToken,
                action: '/maintain/' + this.id,

                thisId: this.id,
                thisFirstName: this.firstName,
                thisLastName: this.lastName,
                thisUserPhoto: this.userPhoto,
                thisLicensePlate: this.licensePlate,
                thisMaintainDate: this.maintainDate,
                thisMaintainEmployee: this.maintainEmployee,
                thisMaintainLists: this.maintainLists,
                thisWagePerList: this.wagePerList,
                thisSparePerList: this.sparePerList,
                thisTotalWage: this.totalWage,
                thisTotalSpare: this.totalSpare,
                thisNote: this.note,
                thisTruckDriver: this.truckDriver,
                thisTruckPhoto: this.truckPhoto,

                thisDataMaintainLists: [],
            }
        },
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
        },
		methods: {
			onWagePerListChange: function () {
				let totalWage = 0;
				this.$refs.wages.forEach(function(wage) {
					totalWage = totalWage + parseInt(wage.value);
                });
				this.thisTotalWage = totalWage;
			},
			onSparePerListChange: function () {
				let totalSpare = 0;
				this.$refs.spares.forEach(function(spare) {
					totalSpare = totalSpare + parseInt(spare.value);
                });
				this.thisTotalSpare = totalSpare;
			},

            onAddListClick: function () {
                let dataMaintainLists = this.thisDataMaintainLists;
                dataMaintainLists.push({
                    maintainList: '',
                    wageList: '',
                    spareList: '',
                });
                this.thisDataMaintainLists = dataMaintainLists
            },
            onSubListClick: function () {
                let dataMaintainLists = this.thisDataMaintainLists;

                if (dataMaintainLists.length >= 2) {
                    dataMaintainLists.pop();
                    this.thisDataMaintainLists = dataMaintainLists
                }
                
            }
		},
        mounted() {
            $('.datepicker').pickadate({
                selectMonths: true,
                selectYears: 15
            });

            const maintainLists = JSON.parse(this.thisMaintainLists)              
            const wageLists = JSON.parse(this.thisWagePerList)              
            const spareLists = JSON.parse(this.thisSparePerList)   
            let dataMaintainLists = [];           
            
            for (let i = 0; i < maintainLists.length; i++) {
                dataMaintainLists.push({
                    maintainList: maintainLists[i],
                    wageList: wageLists[i],
                    spareList: spareLists[i],
                });               
            }
            this.thisDataMaintainLists = dataMaintainLists;
        },
		computed: {
			thisAmountCost: function () {
                return this.thisTotalWage + this.thisTotalSpare;
            },
        },
    }
</script>