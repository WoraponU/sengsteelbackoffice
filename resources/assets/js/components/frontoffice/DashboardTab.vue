<template>
  	<div class="container center-align">
		<div class="section">
           	<div class="row">
				<span class="section-header col s12 m12 l8 left-align">เติมน้ำมัน</span>
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
			</div>            					
		</div>

		<div class="section">
           	<div class="row">
				<span class="section-header col s12 m12 l8 left-align">เปลี่ยนยาง</span>
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
            }
        },
		beforeMount() {
			axios.get('/fuel')
            .then((response) => {
                this.fuels = response.data
            })
            .catch(function (error) {
                console.log(error);
            });

			axios.get('/tire')
            .then((response) => {
                this.tires = response.data
            })
            .catch(function (error) {
                console.log(error);
            });
		}
    }
</script>