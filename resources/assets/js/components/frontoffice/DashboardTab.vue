<template>
  	<div class="container center-align">
		<div class="section">
           	<div class="row">
				<span class="section-header col s11 m11 l11 left-align">ตัวกรอง</span> 
           	</div>
			<div class="row left-align card-panel">
				<div class="input-field col s12 m6 l4">
					<input ref="startDate" type="date" class="datepicker" id="startDate" name="startDate" required>
					<label for="startDate">วันที่</label>
				</div>
				<div class="input-field col s12 m6 l4">
					<input ref="endDate" type="date" class="datepicker" id="endDate" name="endDate" required>
					<label for="endDate">ถึงวันที่</label>
				</div>
				<div class="input-field col s12 m6 l4">
					<select ref="truckDriver" name="truckDriver" v-model="userSelected" required>
                        <option v-for="option in userOptions" :value="option.value" :disabled="option.disabled">
                            {{ option.text }}
                        </option>
                    </select>
					<label>ชื่อคนขับรถ</label>
				</div>
				<div class="input-field col s12 m12 l12 right-align">
					<button @click="onClickFilter" class="btn waves-effect waves-light" type="button" name="action">กรองข้อมูล
						<i class="material-icons right">send</i>
					</button>
				</div>
			</div>
		</div>
		<div class="section">
           	<div class="row">
				<span class="section-header col s11 m11 l11 left-align">เติมน้ำมัน</span>
				<div class="col s1 m1 l1">
					<a href="#reportFuel" class="btn-floating btn-large waves-effect waves-light btn"><i class="material-icons">insert_chart</i></a>
				</div>
			</div> 
			<div class="row">
				<CardFuel v-for="fuel in fuels"
					:id="fuel.fuel.id"
					:firstName="fuel.user.firstname"
					:lastName="fuel.user.lastname"
					:photo="fuel.user.photo"
					:fuelDate="fuel.fuel.fuel_date"
					:gasEmployee="fuel.fuel.gas_employee"
					:gasPerDistance="fuel.fuel.gas_per_distance"
					:gasType="fuel.fuel.gas_type"
					:lastNumberCar="fuel.fuel.last_number_car"
					:licensePlate="fuel.fuel.license_plate"
					:liter="fuel.fuel.liter"
					:note="fuel.fuel.note"
					:presentNumberCar="fuel.fuel.present_number_car"
					:totalDistance="fuel.fuel.total_distance"
					:truckDriver="fuel.fuel.truck_driver"
				></CardFuel>
				<DataNotFound v-if="dataFuelNotFound"></DataNotFound>
			</div>        

			<ModalReportFuel :fuels="fuels" v-if="showModalReportFuel"></ModalReportFuel>
		</div>

		<div class="section">
           	<div class="row">
				<span class="section-header col s11 m11 l11 left-align">เปลี่ยนยาง</span>
				<div class="col s1 m1 l1">
					<a href="#reportTire" class="btn-floating btn-large waves-effect waves-light btn" ><i class="material-icons">insert_chart</i></a>
				</div>
			</div> 
			<div class="row">
				<CardTire v-for="tire in tires"
					:id="tire.tire.id"
					:firstName="tire.user.firstname"
					:lastName="tire.user.lastname"
					:photo="tire.user.photo"
					:licensePlate="tire.tire.license_plate"
					:tireDate="tire.tire.tire_date"
					:tireEmployee="tire.tire.tire_employee"
					:typeOfTire="tire.tire.type_of_tire"
					:brandOfTire="tire.tire.brand_of_tire"
					:pricePerUnit="tire.tire.price_per_unit"
					:wagePerUnit="tire.tire.wage_per_unit"
					:photoTire="tire.tire.photo_tire"
					:sectionOfTire="tire.tire.section_of_tire"
					:rowOfTire="tire.tire.row_of_tire"
					:numberOfTire="tire.tire.number_of_tire"
					:quantity="tire.tire.quantity"
					:totalTirePrice="tire.tire.total_tire_price"
					:totalAmoutCost="tire.tire.total_amout_cost"
					:note="tire.tire.note"
				></CardTire>
				<DataNotFound v-if="dataTireNotFound"></DataNotFound>				
			</div> 

			<div class="row">
				<ModalReportTire :tires="tires" v-if="showModalReportTire"></ModalReportTire>
			</div>             					
		</div>

		<div class="section">
           	<div class="row">
				<span class="section-header col s11 m11 l11 left-align">ซ่อมบำรุง</span>
				<div class="col s1 m1 l1">
					<a href="#reportMaintain" class="btn-floating btn-large waves-effect waves-light btn"><i class="material-icons">insert_chart</i></a>
				</div>
			</div> 
			<div class="row">
				<CardMaintain v-for="maintain in maintains"
					:id="maintain.maintain.id"
					:firstName="maintain.user.firstname"
					:lastName="maintain.user.lastname"
					:photo="maintain.user.photo"
					:licensePlate="maintain.maintain.license_plate"
					:maintainDate="maintain.maintain.maintain_date"
					:maintainEmployee="maintain.maintain.maintain_employee"
					:maintainLists="maintain.maintain.maintain_lists"
					:wagePerList="maintain.maintain.wage_per_list"
					:sparePerList="maintain.maintain.spare_per_list"
					:totalWage="maintain.maintain.total_wage"
					:totalSpare="maintain.maintain.total_spare"
					:amountCost="maintain.maintain.amount_cost"
					:note="maintain.maintain.note" 
				></CardMaintain>
				<DataNotFound v-if="dataMaintainNotFound"></DataNotFound>				
			</div>   

			<div class="row">
				<ModalReportMaintain :maintains="maintains" v-if="showModalReportMaintain"></ModalReportMaintain>
			</div>           					
		</div>
	</div>
</div>
</template>

<script>
    import axios from 'axios';

    export default {
		data() {
            return {
				fuels: [],
				tires: [],
				maintains: [],

				showModalReportFuel: false,
				showModalReportTire: false,
				showModalReportMaintain: false,
				
				dataFuelNotFound: false,
				dataTireNotFound: false,
				dataMaintainNotFound: false,

				userOptions: [
                    { text: 'โปรดระบุ', value: '', disabled: true },
                ],
				userSelected: '',
            }
        },
		beforeMount() {
			axios.get('/fuel')
            .then((response) => {
                this.fuels = response.data
				this.showModalReportFuel = true
				if (this.fuels.length == 0) {
					this.dataFuelNotFound = true;
				}
            })
            .catch(function (error) {
                console.log(error);
            });
			////////////////////
			axios.get('/tire')
            .then((response) => {
                this.tires = response.data
				this.showModalReportTire = true	
				if (this.tires.length == 0) {
					this.dataTireNotFound = true;
				}	
            })
            .catch(function (error) {
                console.log(error);
            });
			//////////////////////
			axios.get('/maintain')
            .then((response) => {
                this.maintains = response.data
				this.showModalReportMaintain = true
				if (this.maintains.length == 0) {
					this.dataMaintainNotFound = true;
				}
            })
            .catch(function (error) {
                console.log(error);
            });
			////////////////////
			axios.get('/backoffice/user')
            .then((response) => {
                for (let i = 0; i < response.data.length; i++) { 
                    this.userOptions.push({
                         text: response.data[i].firstname, 
                         value: response.data[i].id,
                         photo: response.data[i].photo
                    });
                }
            })
            .catch(function (error) {
                console.log(error);
            });
		},
		updated: function() {
			$('select').material_select();				
			$('.modal').modal();
		},
		methods: {
			onClickFilter: function() {
				let startDate = 'all';
				let endDate = 'all';
				if (this.$refs.startDate.value != '') {
					const convertStartDate = new Date(this.$refs.startDate.value);
					startDate = convertStartDate.getFullYear() + '-' +( parseInt(convertStartDate.getMonth()) + 1 ) + '-' + convertStartDate.getDate();
				}
				if (this.$refs.endDate.value != '') {
					const convertEndDate = new Date(this.$refs.endDate.value);
					endDate = convertEndDate.getFullYear() + '-' +( parseInt(convertEndDate.getMonth()) + 1 ) + '-' + convertEndDate.getDate();			
				}

				axios.get('/fuel', {
					params: {
						startDate: startDate,
						endDate: endDate
					}
				})
				.then((response) => {
					this.fuels = response.data
					if (this.fuels.length == 0) {
						this.dataFuelNotFound = true;
					}
				})
				.catch(function (error) {
					console.log(error);
				});
				////////////////////
				axios.get('/tire', {
					params: {
						startDate: startDate,
						endDate: endDate
					}
				})
				.then((response) => {
					this.tires = response.data
					if (this.tires.length == 0) {
						this.dataTireNotFound = true;
					}
				})
				.catch(function (error) {
					console.log(error);
				});
				/////////////////////
				axios.get('/maintain', {
					params: {
						startDate: startDate,
						endDate: endDate
					}
				})
				.then((response) => {
					this.maintains = response.data
					if (this.maintains.length == 0) {
						this.dataMaintainNotFound = true;
					}
				})
				.catch(function (error) {
					console.log(error);
				});
			}
		}
    }
</script>