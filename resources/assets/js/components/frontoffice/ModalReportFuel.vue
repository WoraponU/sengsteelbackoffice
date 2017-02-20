<template>
	<div id="reportFuel" class="modal bottom-sheet">
		<div class="modal-content">
			<h4>รายงานการเติมน้ำมัน</h4>
			<div class="row">
				<div class="col s12 m12 l12">
					<table class="centered">
						<thead>
						<tr>
							<th>คนขับรถ</th>
							<th>ทะเบียนรถ</th>
							<th>วันที่เติมน้ำมัน</th>
							<th>ผู้เติมน้ำมัน</th>
							<th>ประเภทน้ำมัน</th>
							<th>จำนวน <br>(ลิตร)</th>
							<th>ระยะทางที่วิ่ง <br>(กิโลเมตร)</th>
							<th>อัตราการใช้น้ำมัน <br>(กิโลเมตร/ลิตร)</th>
						</tr>
						</thead>

						<tbody>
							<tr v-for="fuel in fuels">
								<td>{{ fuel.user.firstname }} {{ fuel.user.lastname }}</td>
								<td>{{ fuel.truck.license_plate }}</td>
								<td>{{ fuel.fuel.fuel_date }}</td>
								<td>{{ fuel.fuel.gas_employee }}</td>
								<td>{{ fuel.fuel.gas_type }}</td>
								<td>{{ fuel.fuel.liter }}</td>
								<td>{{ fuel.fuel.total_distance }}</td>
								<td>{{ fuel.fuel.gas_per_distance }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="section left-align">
				<div class="row">
					<div class="input-field col s12 m9 l4 offset-l8 offset-m3">
						<blockquote>
							<p>น้ำมันที่ใช้: {{ totalLiter }} ลิตร</p>
							<p>ระยะทางที่วิ่ง: {{ totalDistance }} กิโลเมตร</p>
							<p>อัตราการใช้น้ำมันเฉลี่ย: {{ gasPerDistance }} กิโลเมตร/ลิตร</p>
						</blockquote>
					</div>
				</div>						
			</div>
		</div>
		<div class="modal-footer">
			<a @click="onClickPrintReportFuel" class="modal-action modal-close waves-effect waves-green btn-flat">Print</a>
			<a class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
		</div>
	</div>
</template>

<script>
    export default {
		data() {
			return {
				totalDistance: 0,
				totalLiter: 0,
				totalGasPerDistance: 0,
			}
		},
        props: {
            fuels: { require: true },
        },
		methods: {
			onClickPrintReportFuel: function() {
				printJS('reportFuel', 'html');
			}
		},
		mounted() {
			let distance = 0;
			let liter = 0;
			let gasPerDistance = 0;
			let count = 0;
			$.each(this.fuels, function(index, fuel) {
				distance = distance + fuel.fuel.total_distance	
				liter = liter + fuel.fuel.liter	
				gasPerDistance = gasPerDistance + fuel.fuel.gas_per_distance
				count = index + 1;	
			}); 
			this.totalDistance = distance;
			this.totalLiter = liter;
			this.gasPerDistance = gasPerDistance / count
		}
    }
</script>