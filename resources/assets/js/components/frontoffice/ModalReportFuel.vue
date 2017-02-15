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
									<td>{{ fuel.fuel.license_plate }}</td>
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
		</div>
		<div class="modal-footer">
			<a class="modal-action modal-close waves-effect waves-green btn-flat">Print</a>
			<a class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
		</div>
	</div>
</template>

<script>
    export default {
        props: {
            fuels: { require: true },
        },
    }
</script>