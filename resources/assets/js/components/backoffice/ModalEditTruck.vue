<template>
    <div id="modalEdit" class="modal modal-fixed-footer left-align">
        <form :action="action" method="POST">
            <input type="hidden" name="_token" v-model="csrfToken">
            <input type="hidden" name="_method" value="PUT">
            <div class="modal-content">
                <h4>ข้อมูลรถบรรทุก</h4>
                <div class="divider"></div>

                <div class="row mt25">
                    <div class="col s12 m12 l12 center-align">
                        <img class="responsive-img" :src="photoPreview" alt="photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col offset-s1 offset-m1 offset-l1 s11 m11 l11 center-align">
                        <input @change="onImageChange($event)" type="file" accept="image/*" readonly>
                        <input name="photo" type="hidden" :value="photoPreview">
                    </div>
                </div>

                <div class="section">
                    <h5>ข้อมูลทั่วไป</h5>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input name="licensePlate" id="licensePlate" type="text" class="validate" :value="truck.license_plate" required>
                            <label for="licensePlate">เลขทะเบียน <span class="icon-star">*</span></label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="owner" id="owner" type="text" class="validate" :value="truck.owner">
                            <label for="owner">เจ้าของ <span class="icon-star">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input name="registerDate" id="registerDate" type="date" class="datepicker" :value="truck.register_date">
                            <label for="registerDate">วันที่จดทะเบียน</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="annualTaxDate" id="annualTaxDate" type="date" class="datepicker" :value="truck.annual_tax_date">
                            <label for="annualTaxDate">วันที่ต่อทะเบียน</label>
                        </div>
                    </div>
                </div>

                <div class="sectiton">
                    <h5>ข้อมูลเชื้อเพลิง</h5>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input name="gasoline" id="gasoline" type="text" class="validate" :value="truck.gasoline" required>
                            <label for="gasoline">น้ำมันเครื่องยนต์ <span class="icon-star">*</span></label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="lubricator" id="lubricator" type="text" class="validate" :value="truck.lubricator" required>
                            <label for="lubricator">น้ำมันห้องเครื่อง <span class="icon-star">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input name="gearBoxOil" id="gearBoxOil" type="text" class="validate" :value="truck.gear_box_oil" required>
                            <label for="gearBoxOil">น้ำมันห้องเกียร์ <span class="icon-star">*</span></label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="finalGearOil" id="finalGearOil" type="text" class="validate" :value="truck.final_gear_oil" required>
                            <label for="finalGearOil">น้ำมันเฟืองท้าย <span class="icon-star">*</span></label>
                        </div>
                    </div>
                </div>
                
                <div class="section">
                    <h5>ข้อมูลล้อรถ</h5>
                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <input name="rowOfWheel" id="rowOfWheel" type="number" min="2" max="30" class="validate" 
                                v-model="rowsOfWheel" required>
                            <label for="rowOfWheel">จำนวนแถวของล้อ <span class="icon-star">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l4" v-for="(number, index) in numberWheelPerRow">
                            <input name="numberWheelPerRow[]" type="number" class="validate" :value="number" required>
                            <label for="numberWheelPerRow">จำนวนล้อ/แถว {{ index+1 }} <span class="icon-star">*</span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="modal-action waves-effect waves-green btn-flat">แก้ไข</button>
                <button type="button" class="modal-close modal-action waves-effect waves-green btn-flat">ปิด</button>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: {
            id: { require: true },
        },
        data() {
            return {
                action: '/backoffice/truck/' + this.id,
                csrfToken: window.Laravel.csrfToken,
                photoPreview: '/images/truck_icon.png',
                truck: [],
				rowsOfWheel: '',
				numberWheelPerRow: '',
            }
        },
        watch: {
            rowsOfWheel: function(rowsOfWheelChange) {
                let rowOfWheel = this.numberWheelPerRow.length
                let rowOfWheelData = this.numberWheelPerRow
                if (rowsOfWheelChange > rowOfWheel) {
                    let numberOfPush = rowsOfWheelChange - rowOfWheel
                    for (let i = 0; i < numberOfPush; i++) {
                        rowOfWheelData.push('2')
                    }
                } else if (rowsOfWheelChange < rowOfWheel) {
                    let numberOfPush = rowOfWheel - rowsOfWheelChange
                    for (let i = 0; i < numberOfPush; i++) {
                        this.numberWheelPerRow.pop()
                    }
                }
            }
        },
		updated: function() {
            Materialize.updateTextFields()
        },
        mounted() {
            Materialize.updateTextFields();
            $('.datepicker').pickadate({
                selectMonths: true,
                selectYears: 15,
                format: 'yyyy-mm-dd',
            });
        },
        beforeMount() {
            axios.get('/backoffice/truck/' + this.id + '/edit')
            .then((response) => {
                this.truck = response.data
                this.photoPreview = this.truck.photo
                this.rowsOfWheel = this.truck.row_of_wheel
                this.numberWheelPerRow = JSON.parse(this.truck.number_wheel_per_row)
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        methods: {
            onImageChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };
                reader.readAsDataURL(file);
            },
        }
    }
</script>