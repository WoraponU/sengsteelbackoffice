<template>
    <div id="modalEditMaintain" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
        </div>
    </div>
</template>

<script>
    export default {
		// data() {
		// 	return {
        //         action: '/fuel/' + this.id,
        //         csrfToken: window.Laravel.csrfToken,
        //         thisId: this.id,
        //         thisFirstName: this.firstName,
        //         thisLastName: this.lastName,
        //         thisUserPhoto: this.userPhoto,
        //         thisTruckPhoto: this.truckPhoto,
        //         thisLicensePlate: this.licensePlate,
        //         thisTruckDriver: this.truckDriver,
        //         thisFuelDate: this.fuelDate,
        //         thisGasEmployee: this.gasEmployee,
        //         thisGasType: this.gasType,
        //         thisLastNumberCar: this.lastNumberCar,
        //         thisPresentNumberCar: this.presentNumberCar,
        //         thisLiter: this.liter,
        //         thisNote: this.note,
        //         thisGasPerDistance: this.gasPerDistance,
        //         thisTotalDistance: this.totalDistance,
        //     }
		// },
        // props: {
        //     id: { require: true },
        //     firstName: { require: true },
        //     lastName: { require: true },
        //     userPhoto: { require: true },
        //     truckPhoto: { require: true },
        //     licensePlate: { require: true },
        //     truckDriver: { require: true },
        //     fuelDate: { require: true },
        //     gasEmployee: { require: true },
        //     gasType: { require: true },
        //     lastNumberCar: { require: true },
        //     presentNumberCar: { require: true },
        //     liter: { require: true },
        //     note: { require: true },
        //     gasPerDistance: { require: true },
        //     totalDistance: { require: true },
        // },
		// mounted() {
        //     $('.datepicker').pickadate({
        //         selectMonths: true,
        //         selectYears: 15
        //     });
        // },
		// computed: {
		// 	thisTotalDistanceCompute: function () {
		// 		return this.thisPresentNumberCar - this.thisLastNumberCar;
		// 	},
		// 	thisTotalGasCompute: function () {
		// 		return this.thisLiter;
		// 	},
		// 	thisGasPerDistanceCompute: function () {
		// 		return (this.thisPresentNumberCar - this.thisLastNumberCar) / this.thisLiter;
		// 	}
		// }
    }
</script>