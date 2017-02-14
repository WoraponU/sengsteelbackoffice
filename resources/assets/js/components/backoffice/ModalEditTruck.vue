<template>
    <div id="modalEdit" class="modal modal-fixed-footer left-align">
        <form :action="action" method="POST">
            <input type="hidden" name="_token" v-model="csrfToken">
            <input type="hidden" name="_method" value="PUT">
            <div class="modal-content">
                <h4>Truck Infomation</h4>
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
                    <h5>Information</h5>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input name="licensePlate" id="licensePlate" type="text" class="validate" :value="truck.license_plate" required>
                            <label for="licensePlate">License Plate <span class="icon-star">*</span></label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="owner" id="owner" type="text" class="validate" :value="truck.owner">
                            <label for="owner">Owner <span class="icon-star">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input name="registerDate" id="registerDate" type="date" class="datepicker" :value="truck.register_date" required>
                            <label for="registerDate">Register Date <span class="icon-star">*</span></label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="annualTaxDate" id="annualTaxDate" type="date" class="datepicker" :value="truck.annual_tax_date" required>
                            <label for="annualTaxDate">Annual Tax Date <span class="icon-star">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input name="lastNumberCar" id="lastNumberCar" type="text" class="validate" :value="truck.last_number_car" required>
                            <label for="lastNumberCar">Last Number Car <span class="icon-star">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="sectiton">
                    <h5>Fuel</h5>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input name="gasoline" id="gasoline" type="text" class="validate" :value="truck.gasoline" required>
                            <label for="gasoline">Gasoline <span class="icon-star">*</span></label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="lubricator" id="lubricator" type="text" class="validate" :value="truck.lubricator" required>
                            <label for="lubricator">Lubricator <span class="icon-star">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input name="gearBoxOil" id="gearBoxOil" type="text" class="validate" :value="truck.gear_box_oil" required>
                            <label for="gearBoxOil">Gear Box Oil <span class="icon-star">*</span></label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="finalGearOil" id="finalGearOil" type="text" class="validate" :value="truck.final_gear_oil" required>
                            <label for="finalGearOil">Final Gear Oil <span class="icon-star">*</span></label>
                        </div>
                    </div>
                </div>
                
                <div class="section">
                    <h5>Wheel</h5>
                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <input name="rowOfWheel" id="rowOfWheel" type="number" min="2" max="30" class="validate" 
                                v-model="rowsOfWheel" required>
                            <label for="rowOfWheel">Row Of Wheel <span class="icon-star">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l4" v-for="(number, index) in numberWheelPerRow">
                            <input name="numberWheelPerRow[]" type="number" class="validate" :value="number" required>
                            <label for="numberWheelPerRow">Wheel/Row {{ index+1 }} <span class="icon-star">*</span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="modal-action waves-effect waves-green btn-flat">Add</button>
                <button type="button" class="modal-close modal-action waves-effect waves-green btn-flat">Cancel</button>
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
        // computed: {
        //     index: function () {
        //         return this.index+1
        //     }
        // },
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
                selectYears: 15
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