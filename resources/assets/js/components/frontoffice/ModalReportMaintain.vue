<template>
    <div id="reportMaintain" class="modal bottom-sheet">
		<div class="modal-content">
			<h4>รายงานการเปลี่ยนยาง</h4>
				<div class="row">
					<div class="col s12 m12 l12">
                        <table class="centered">
                            <thead>
                            <tr>
                                <th>คนขับรถ</th>
                                <th>ทะเบียนรถ</th>
                                <th>วันที่</th>
                                <th>ผู้ซ่อม</th>
                                <th>ค่าแรงทั้งหมด</th>
                                <th>ค่าอะไหล่ทั้งหมด</th>
                                <th>ค่าใช้จ่ายทั้งหมด</th>
                            </tr>
                            </thead>

                            <tbody>
                                <tr v-for="maintain in maintains">
                                    <td>{{ maintain.user.firstname }} {{ maintain.user.lastname }}</td>
                                    <td>{{ maintain.maintain.license_plate }}</td>
                                    <td>{{ maintain.maintain.maintain_date }}</td>
                                    <td>{{ maintain.maintain.maintain_employee }}</td>
                                    <td>{{ maintain.maintain.total_wage }}</td>
                                    <td>{{ maintain.maintain.total_spare }}</td>
                                    <td>{{ maintain.maintain.amount_cost }}</td>
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
            maintains: { require: true },
        },
    }
</script>