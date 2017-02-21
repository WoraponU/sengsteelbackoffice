<template>
    <div id="reportMaintain" class="modal bottom-sheet">
		<div id="pdfMaintain" class="modal-content">
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
                                <td>{{ maintain.truck.license_plate }}</td>
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
            <div class="section left-align">
                <div class="row">
                    <div class="input-field col s12 m9 l5 offset-l7 offset-m3">
                        <blockquote>
                            <p>ค่าแรงทั้งหมด: {{ totalWage }} บาท</p>
                            <p>ค่าอะไหล่ทั้งหมด: {{ totalSpare  }} บาท</p>
                            <p>ค่าใช้จ่ายทั้งหมด: {{ amountCost }} บาท</p>
                        </blockquote>
                    </div>
                </div>						
            </div>
		</div>
		<div class="modal-footer">
            <a @click="onClickPrintReportMaintain" class="modal-action modal-close waves-effect waves-green btn-flat">Print</a>
			<a class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
		</div>
	</div>
</template>

<script>
    export default {
        data() {
			return {
				totalWage: 0,
                totalSpare: 0,
                amountCost: 0,
			}
		},
        props: {
            maintains: { require: true },
        },
        methods: {
            onClickPrintReportMaintain: function() {
                printJS('pdfMaintain', 'html');
            }
        },
        mounted() {
			let wage = 0;
			let spare = 0;
			let cost = 0;
			$.each(this.maintains, function(index, maintain) {
				wage = wage + maintain.maintain.total_wage
				spare = spare + maintain.maintain.total_spare
				cost = cost + maintain.maintain.amount_cost
			}); 
			this.totalWage = wage;
			this.totalSpare = spare;
			this.amountCost = cost;
		}
    }
</script>