<template>
    <div id="modalEditTire" class="modal modal-fixed-footer left-align">
        <div class="container center-align">
            <form action="/tire" method="POST">
                <input type="hidden" name="_token" v-model="csrfToken">

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
                                <input type="date" class="datepicker" id="tireDate" name="tireDate" required>
                                <label for="tireDate">วันที่ <span class="icon-star">*</span></label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input id="tireEmployee" name="tireEmployee" type="text" class="validate" required>
                                <label for="tireEmployee">ผู้เปลี่ยน <span class="icon-star">*</span></label>
                            </div>  
                        </div>

                        <div class="section">
                            <div class="row">
                                <span class="section-header col s12 m12 l8 offset-l2">รายละเอียดยาง</span>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-l2">
                                    <input id="typeOfTire" name="typeOfTire" type="text" class="validate" required>
                                    <label for="typeOfTire">ชนิดยาง <span class="icon-star">*</span></label>
                                </div> 
                                <div class="input-field col s12 m6 l4">
                                    <input id="brandOfTire" name="brandOfTire" type="text" class="validate" required>
                                    <label for="brandOfTire">ยี่ห้อ <span class="icon-star">*</span></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-l2">
                                    <input id="pricePerUnit" name="pricePerUnit" min="1" v-model="pricePerUnit" type="number" class="validate" required>
                                    <label for="pricePerUnit">ราคา/เส้น <span class="icon-star">*</span></label>
                                </div> 
                                <div class="input-field col s12 m6 l4">
                                    <input id="wagePerUnit" name="wagePerUnit" v-model="wagePerUnit" min="1" type="number" class="validate" required>
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
                                        <img class="responsive-img" :src="photoPreview" alt="photo">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col offset-s1 offset-m1 offset-l1 s11 m11 l11 center-align">
                                        <input @change="onImageChange($event)" type="file" accept="image/*" readonly>
                                        <input name="photoTire" type="hidden" :value="photoPreview">
                                    </div>
                                </div>
                                <div class="input-field col s12 m6 l4 offset-l2">
                                    <select name="sectionOfTire" required>
                                        <option value="" disabled selected>ประเภทยาง</option>
                                        <option value="parent">ตัวแม่</option>
                                        <option value="child">ตัวลูก</option>
                                    </select>
                                    <label>ตัวแม่/ตัวลูก <span class="icon-star">*</span></label>
                                </div> 
                                <div class="input-field col s12 m6 l4">
                                    <input id="rowOfTire" name="rowOfTire" type="number" class="validate" required>
                                    <label for="rowOfTire">ยางแถวที่ <span class="icon-star">*</span></label>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-l2">
                                    <input id="numberOfTire" name="numberOfTire" min="1" type="number" class="validate" required>
                                    <label for="numberOfTire">หมายเลขยาง <span class="icon-star">*</span></label>
                                </div> 
                                <div class="input-field col s12 m6 l4">
                                    <input id="quantity" name="quantity" min="1" v-model="quantity" type="number" class="validate" required>
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
                        
                        <div class="input-field col s12 m12 l12 right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>  
            </form>               
        </div>          
    </div>
</template>

<script>
    export default {
		data() {
            return {
                csrfToken: window.Laravel.csrfToken,
                // thisId: this.id,
                // thisFirstName: this.firstName,
                // thisLastName: this.lastName,
                // thisUserPhoto: this.userPhoto,
                // thisTruckPhoto: this.truckPhoto,
                // thisLicensePlate: this.licensePlate,
                // thisTireDate: this.tireDate,
                // thisTireEmployee: this.tireEmployee,
                // thisTypeOfTire: this.typeOfTire,
                // thisBrandOfTire: this.brandOfTire,
                // thisPricePerUnit: this.pricePerUnit,
                // thisWagePerUnit: this.wagePerUnit,
                // thisPhotoTire: this.photoTire,
                // thisSectionOfTire: this.sectionOfTire,
                // thisRowOfTire: this.rowOfTire,
                // thisNumberOfTire: this.numberOfTire,
                // thisQuantity: this.quantity,
                // thisTotalTirePrice: this.totalTirePrice,
                // thisTotalAmoutCost: this.totalAmoutCost,
                // thisNote: this.note,
            }
        },
        props: {
            // id: { require: true },
            // firstName: { require: true },
            // lastName: { require: true },
            // userPhoto: { require: true },
            // truckPhoto: { require: true },
            // licensePlate: { require: true },
            // tireDate: { require: true },
            // tireEmployee: { require: true },
            // typeOfTire: { require: true },
            // brandOfTire: { require: true },
            // pricePerUnit: { require: true },
            // wagePerUnit: { require: true },
            // photoTire: { require: true },
            // sectionOfTire: { require: true },
            // rowOfTire: { require: true },
            // numberOfTire: { require: true },
            // quantity: { require: true },
            // totalTirePrice: { require: true },
            // totalAmoutCost: { require: true },
            // note: { require: true },
        },
    }
</script>