<template>
    <div id="reportTire" class="modal bottom-sheet">
		<div class="modal-content">
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
                                <td>{{ tire.tire.license_plate }}</td>
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
            <div class="section left-align">
                <div class="row">
                    <div class="input-field col s12 m9 l4 offset-l8 offset-m3">
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
	import 'print.js';

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
                printJS('reportTire', 'html');
            }
        },
        mounted() {
			let amoutCost = 0;
			$.each(this.tires, function(index, tire) {
				amoutCost = amoutCost + tire.tire.total_amout_cost
			}); 
			this.totalAmoutCost = amoutCost;
		}
    }
</script>