<template>
    <div id="modalEditFuel" class="modal modal-fixed-footer left-align">
        <form :action="action" method="POST">         
            <div class="modal-content">
                <div class="container center-align">
                    <input type="hidden" name="_token" v-model="csrfToken">
                    <input type="hidden" name="_method" value="PUT">

                    <TruckAndDriverMap 
                        :truckDriver="thisTruckDriver"
                        :truckDriverPhoto="thisUserPhoto"
                        :licensePlate="truckId"
                        :truckImage="thisTruckPhoto"
                    ></TruckAndDriverMap>
                    <div class="container">
                        <div class="row left-align card-panel">
                            <div class="row">
                                <div class="col offset-l1">
                                    <h5>แก้ไขรายละเอียดการเติมน้ำมัน</h5>						
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-l2">
                                    <input type="date" class="datepicker" id="fuelDate" name="fuelDate" v-model="thisFuelDate" required>
                                    <label for="fuelDate">วันที่ <span class="icon-star">*</span></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-l2">
                                    <input id="gasEmployee" name="gasEmployee" type="text" class="validate" v-model="thisGasEmployee" required>
                                    <label for="gasEmployee">ผู้เติม <span class="icon-star">*</span></label>
                                </div>  
                                <div class="input-field col s12 m6 l4">
                                    <select name="gasType" required :value="gasType">
                                        <option value="" disabled selected>โปรดระบุ</option>
                                        <option value="gasoline">น้ำมันเครื่องยนต์</option>
                                        <option value="lubricator">น้ำมันห้องเครื่อง</option>
                                        <option value="gear_box_oil">น้ำมันห้องเกียร์</option>
                                        <option value="final_gear_oil">น้ำมันเฟืองท้าย</option>
                                    </select>
                                    <label>ประเภทน้ำมัน <span class="icon-star">*</span></label>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-l2">
                                    <input id="lastNumberCar" name="lastNumberCar" type="number" v-model="thisLastNumberCar" class="validate" required>
                                    <label for="lastNumberCar">หมายเลขกิโลเมตรครั้งก่อน</label>
                                </div>   
                                <div class="input-field col s12 m6 l4">
                                    <input id="presentNumberCar" name="presentNumberCar" type="number" :min="thisLastNumberCar" v-model="thisPresentNumberCar" class="validate" required>
                                    <label for="presentNumberCar">หมายเลขกิโลเมตรล่าสุด <span class="icon-star">*</span></label>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-l2">
                                    <input id="liter" name="liter" type="number" min="1" v-model="thisLiter" class="validate" required>
                                    <label for="liter">จำนวนลิตร <span class="icon-star">*</span></label>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l8 offset-l2">
                                    <textarea id="note" name="note" v-model="thisNote" class="materialize-textarea"></textarea>
                                    <label for="note">บันทึกรายละเอียด</label>
                                </div>
                            </div>

                            <div class="section">
                                <div class="row">
                                    <div class="input-field col s12 m12 l8 offset-l2">
                                        <blockquote>
                                            <p class="flow-text">ระยะทางที่วิ่ง: {{ thisTotalDistanceCompute }} กิโลเมตร</p>
                                            <p class="flow-text">น้ำมันที่ใช้: {{ thisTotalGasCompute }} ลิตร</p>
                                            <p class="flow-text">อัตราการใช้น้ำมัน: {{ thisGasPerDistanceCompute }} กิโลเมตร/ลิตร</p>
                                        </blockquote>
                                        <input type="hidden" name="totalDistance" :value="thisTotalDistanceCompute">
                                        <input type="hidden" name="gasPerDistance" :value="thisGasPerDistanceCompute">
                                    </div>
                                </div>						
                            </div>			
                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="modal-action waves-effect waves-green btn-flat ">แก้ไข</button>
                <button type="button" class="modal-action modal-close waves-effect waves-green btn-flat ">ปิด</button>
            </div>
        </form>               
    </div>
</template>

<script>
    export default {
		data() {
			return {
                action: '/fuel/' + this.id,
                csrfToken: window.Laravel.csrfToken,
                thisId: this.id,
                thisFirstName: this.firstName,
                thisLastName: this.lastName,
                thisUserPhoto: this.userPhoto,
                thisTruckPhoto: this.truckPhoto,
                thisLicensePlate: this.licensePlate,
                thisTruckDriver: this.truckDriver,
                thisFuelDate: this.fuelDate,
                thisGasEmployee: this.gasEmployee,
                thisGasType: this.gasType,
                thisLastNumberCar: this.lastNumberCar,
                thisPresentNumberCar: this.presentNumberCar,
                thisLiter: this.liter,
                thisNote: this.note,
                thisGasPerDistance: this.gasPerDistance,
                thisTotalDistance: this.totalDistance,
            }
		},
        props: {
            id: { require: true },
            firstName: { require: true },
            lastName: { require: true },
            userPhoto: { require: true },
            truckPhoto: { require: true },
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
            truckId: { require: true },      
        },
		mounted() {
            $('.datepicker').pickadate({
                selectMonths: true,
                selectYears: 15,
                format: 'yyyy-mm-dd',
            });
        },
		computed: {
			thisTotalDistanceCompute: function () {
				return this.thisPresentNumberCar - this.thisLastNumberCar;
			},
			thisTotalGasCompute: function () {
				return this.thisLiter;
			},
			thisGasPerDistanceCompute: function () {
				return ((this.thisPresentNumberCar - this.thisLastNumberCar) / this.thisLiter).toFixed(2);
			}
		}
    }
</script>