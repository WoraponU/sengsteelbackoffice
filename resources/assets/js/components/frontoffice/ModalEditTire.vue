<template>
    <div id="modalEditTire" class="modal modal-fixed-footer left-align">
        <form :action="action" method="POST">
            <div class="modal-content">
                <div class="container center-align">
                    <input type="hidden" name="_token" v-model="csrfToken">
                    <input type="hidden" name="_method" value="PUT">

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
                                    <h5>รายละเอียดการเปลี่ยนยาง</h5>						
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-l2">
                                    <input type="date" class="datepicker" id="tireDate" name="tireDate" v-model="thisTireDate" required>
                                    <label for="tireDate">วันที่ <span class="icon-star">*</span></label>
                                </div>
                                <div class="input-field col s12 m6 l4">
                                    <input id="tireEmployee" name="tireEmployee" v-model="thisTireEmployee" type="text" class="validate" required>
                                    <label for="tireEmployee">ผู้เปลี่ยน <span class="icon-star">*</span></label>
                                </div>  
                            </div>

                            <div class="section">
                                <div class="row">
                                    <span class="section-header col s12 m12 l8 offset-l2">รายละเอียดยาง</span>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6 l4 offset-l2">
                                        <input id="typeOfTire" name="typeOfTire" v-model="thisTypeOfTire" type="text" class="validate" required>
                                        <label for="typeOfTire">ชนิดยาง <span class="icon-star">*</span></label>
                                    </div> 
                                    <div class="input-field col s12 m6 l4">
                                        <input id="brandOfTire" name="brandOfTire" v-model="thisBrandOfTire" type="text" class="validate" required>
                                        <label for="brandOfTire">ยี่ห้อ <span class="icon-star">*</span></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6 l4 offset-l2">
                                        <input id="pricePerUnit" name="pricePerUnit" min="1" v-model="thisPricePerUnit" type="number" class="validate" required>
                                        <label for="pricePerUnit">ราคา/เส้น <span class="icon-star">*</span></label>
                                    </div> 
                                    <div class="input-field col s12 m6 l4">
                                        <input id="wagePerUnit" name="wagePerUnit" v-model="thisWagePerUnit" min="1" type="number" class="validate" required>
                                        <label for="wagePerUnit">ค่าแรง/เส้น <span class="icon-star">*</span></label>
                                    </div>    
                                </div>
                            </div>

                            <div class="section">
                                <div class="row">
                                    <span class="section-header col s12 m12 l8 offset-l2">ตำแหน่งยาง</span>
                                </div>
                                <div class="row">
                                    <div class="row">
                                        <div class="col s12 m12 l12 center-align">
                                            <img class="responsive-img" :src="thisPhotoTire" alt="photo">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col offset-s1 offset-m1 offset-l1 s11 m11 l11 center-align">
                                            <input @change="onImageChange($event)" type="file" accept="image/*" readonly>
                                            <input name="photoTire" type="hidden" :value="thisPhotoTire">
                                        </div>
                                    </div>
                                    <div class="input-field col s12 m6 l4 offset-l2">
                                        <select name="sectionOfTire" :value="thisSectionOfTire" required>
                                            <option value="" disabled selected>ประเภทยาง</option>
                                            <option value="parent">ตัวแม่</option>
                                            <option value="child">ตัวลูก</option>
                                        </select>
                                        <label>ตัวแม่/ตัวลูก <span class="icon-star">*</span></label>
                                    </div> 
                                    <div class="input-field col s12 m6 l4">
                                        <input id="rowOfTire" name="rowOfTire" v-model="thisRowOfTire" type="number" class="validate" required>
                                        <label for="rowOfTire">ยางแถวที่ <span class="icon-star">*</span></label>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m6 l4 offset-l2">
                                        <input id="numberOfTire" name="numberOfTire" v-model="thisNumberOfTire" min="1" type="number" class="validate" required>
                                        <label for="numberOfTire">หมายเลขยาง <span class="icon-star">*</span></label>
                                    </div> 
                                    <div class="input-field col s12 m6 l4">
                                        <input id="quantity" name="quantity" min="1" v-model="thisQuantity" type="number" class="validate" required>
                                        <label for="quantity">จำนวน <span class="icon-star">*</span></label>
                                    </div>    
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m12 l8 offset-l2">
                                    <textarea id="note" name="note" class="materialize-textarea"></textarea>
                                    <label for="note">บันทึกรายละเอียด</label>
                                </div>
                            </div>

                            <div class="section">
                                <div class="row">
                                    <div class="input-field col s12 m12 l8 offset-l2">
                                        <blockquote>
                                            <p class="flow-text">ราคายางทั้งหมด: {{ totalTirePrice }} บาท</p>
                                            <p class="flow-text">ค่าใช้จ่ายทั้งหมด: {{ totalAmoutCost  }} บาท</p>
                                        </blockquote>
                                        <input type="hidden" name="totalTirePrice" :value="totalTirePrice">
                                        <input type="hidden" name="totalAmoutCost" :value="totalAmoutCost">
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
                action: '/tire/' + this.id,

                thisId: this.id,
                thisFirstName: this.firstName,
                thisLastName: this.lastName,
                thisUserPhoto: this.userPhoto,
                thisTruckPhoto: this.truckPhoto,
                thisTruckDriver: this.truckDriver,
                thisLicensePlate: this.licensePlate,
                thisTireDate: this.tireDate,
                thisTireEmployee: this.tireEmployee,
                thisTypeOfTire: this.typeOfTire,
                thisBrandOfTire: this.brandOfTire,
                thisPricePerUnit: this.pricePerUnit,
                thisWagePerUnit: this.wagePerUnit,
                thisPhotoTire: this.photoTire,
                thisSectionOfTire: this.sectionOfTire,
                thisRowOfTire: this.rowOfTire,
                thisNumberOfTire: this.numberOfTire,
                thisQuantity: this.quantity,
                thisTotalTirePrice: this.totalTirePrice,
                thisTotalAmoutCost: this.totalAmoutCost,
                thisNote: this.note,
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
        mounted() {
            $('.datepicker').pickadate({
                selectMonths: true,
                selectYears: 15
            });
        }
    }
</script>