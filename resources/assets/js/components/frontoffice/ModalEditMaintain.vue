<template>
    <div id="modalEditMaintain" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <div class="container center-align">
                <form action="/maintain" method="POST">
                    <input type="hidden" name="_token" v-model="csrfToken">
                    
                    <TruckAndDriverMap></TruckAndDriverMap>
                    <div class="container tire-tab">
                        <div class="row left-align card-panel">
                            <div class="row">
                                <div class="col offset-l1">
                                    <h5>รายละเอียดการซ่อมบำรุง</h5>						
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
                                        <a class="btn-floating btn waves-effect waves-light right" @click="maintainListsRow++"><i class="material-icons">add</i></a>
                                        <a class="btn-floating btn waves-effect waves-light right" @click="maintainListsRow--"><i class="material-icons">remove</i></a>
                                    </div>
                                </div>
                                <div class="row" v-for="list in maintainListsRow">
                                    <div class="input-field col s6 m6 l4 offset-l2">
                                        <input id="maintainLists" name="maintainLists[]" type="text" class="validate" required>
                                        <label for="maintainLists">รายการ {{ list }} <span class="icon-star">*</span></label>
                                    </div> 
                                    <div class="input-field col s3 m3 l2">
                                        <input id="wagePerList" name="wagePerList[]" ref="wages" @change="onWagePerListChange" type="number" class="validate" required>
                                        <label for="wagePerList">ค่าแรง(บาท) <span class="icon-star">*</span></label>
                                    </div>
                                    <div class="input-field col s3 m3 l2">
                                        <input id="sparePerList" name="sparePerList[]" ref="spares" @change="onSparePerListChange" type="number" class="validate" required>
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
                                            <p class="flow-text">ค่าแรงทั้งหมด: {{ totalWage }} บาท</p>
                                            <p class="flow-text">ค่าอะไหล่ทั้งหมด: {{ totalSpare  }} บาท</p>
                                            <p class="flow-text">ค่าใช้จ่ายทั้งหมด: {{ amountCost }} บาท</p>
                                        </blockquote>
                                        <input type="hidden" name="totalWage" :value="totalWage">
                                        <input type="hidden" name="totalSpare" :value="totalSpare">
                                        <input type="hidden" name="amountCost" :value="amountCost">
                                    </div>
                                </div>						
                            </div>
                        </div>
                    </div>       
                </form>          
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                csrfToken: window.Laravel.csrfToken,
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
                thisAmountCost: this.amountCost,
                thisNote: this.note,
                truckDriver: this.truckDriver,
                truckPhoto: this.truckPhoto,
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
		watch: {
			maintainListsRow: function () {
				if ( this.maintainListsRow <= 0 ) {
					this.maintainListsRow = 1;
				}
			}
        },
		methods: {
			onWagePerListChange: function () {
				let totalWage = 0;
				this.$refs.wages.forEach(function(wage) {
					totalWage = totalWage + parseInt(wage.value);
                });
				this.totalWage = totalWage;
			},
			onSparePerListChange: function () {
				let totalSpare = 0;
				this.$refs.spares.forEach(function(spare) {
					totalSpare = totalSpare + parseInt(spare.value);
                });
				this.totalSpare = totalSpare;
			},
		},
		computed: {
			amountCost: function () {
                return this.totalWage * this.totalSpare;
            },
        },
    }
</script>