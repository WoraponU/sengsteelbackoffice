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
	</div>
</div>
</template>

<script>
    import axios from 'axios';

    export default {
		data() {
            return {
				fuels: [],
            }
        },
		beforeMount() {
			axios.get('/fuel')
            .then((response) => {
				console.log(response.data);
                this.fuels = response.data
                // this.users = response.data.users
            })
            .catch(function (error) {
                console.log(error);
            });
		}
    }
</script>