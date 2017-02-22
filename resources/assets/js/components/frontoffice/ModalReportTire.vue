<template>
    <div id="reportTire" class="modal bottom-sheet">
		<div id="pdfTire" class="modal-content">
			<h4>รายงานการเปลี่ยนยาง</h4>
            <div class="row">
                <div class="col s12 m12 l12">
                    <table class="centered">
                        <thead>
                        <tr>
                            <th>คนขับรถ</th>
                            <th>ทะเบียนรถ</th>
                            <th>วันที่เปลี่ยนยาง</th>
                            <th>ผู้เปลี่ยนยาง</th>
                            <th>จำนวน <br>(เส้น)</th>
                            <th>ราคายางทั้งหมด <br>(บาท)</th>
                            <th>ค่าใช้จ่ายทั้งหมด <br>(บาท)</th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr v-for="tire in tires">
                                <td>{{ tire.user.firstname }} {{ tire.user.lastname }}</td>
                                <td>{{ tire.truck.license_plate }}</td>
                                <td>{{ tire.tire.tire_date }}</td>
                                <td>{{ tire.tire.tire_employee }}</td>
                                <td>{{ tire.tire.quantity }}</td>
                                <td>{{ tire.tire.total_tire_price }}</td>
                                <td>{{ tire.tire.total_amout_cost }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>

        <div class="modal-content">
			<div class="section materialboxed">
				<div class="row">
					<div class="col s12 m8 l6 offset-l3 offset-m2">
						<canvas id="myChartTire" width="100%" height="100%"></canvas>								
					</div>
				</div>
			</div>
		</div>

		<div class="modal-content">
			<div class="section left-align">
                <div class="row">
                    <div class="input-field col s12 m9 l5 offset-l7 offset-m3">
                        <blockquote>
                            <p>ค่าใช้จ่ายทั้งหมด: {{ totalAmoutCost }} บาท</p>
                        </blockquote>
                    </div>
                </div>						
            </div>
		</div>

		<div class="modal-footer">
            <a @click="onClickPrintReportTire" class="modal-action modal-close waves-effect waves-green btn-flat">Print</a>
			<a class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
		</div>
	</div>
</template>

<script>
    import Chart from 'chart.js'

    export default {
        data() {
			return {
				totalAmoutCost: 0,
			}
		},
        props: {
            tires: { require: true },
        },
        methods: {
            onClickPrintReportTire: function() {
                printJS('pdfTire', 'html');
            },
            showGraph: function(date, amoutCostGraph) {
				const ctxTire = document.getElementById("myChartTire");
				const myChartTire = new Chart(ctxTire, {
					type: 'line',
					data: {
						labels: date,
						datasets: [
							{
								label: 'อัตราการใช้น้ำมัน (กิโลเมตร/ลิตร)',
								data: amoutCostGraph,
								fill: false,
								borderColor: 'rgba(255,99,132,1)',
							},
						]
					},
				});
			}
        },
        mounted() {
            $('.materialboxed').materialbox();

			let amoutCost = 0;
			$.each(this.tires, function(index, tire) {
				amoutCost = amoutCost + tire.tire.total_amout_cost
			}); 
			this.totalAmoutCost = amoutCost;
            ///////////////////////////
            /////////////////////////////////

			let date = [];
			let amoutCostGraph = [];

			$.each(this.tires, function(index, tire) {
				date.push(tire.tire.tire_date);
				amoutCostGraph.push(tire.tire.total_amout_cost)
			}); 
            console.log(amoutCostGraph);
			this.showGraph(date, amoutCostGraph);
		}
    }
</script>