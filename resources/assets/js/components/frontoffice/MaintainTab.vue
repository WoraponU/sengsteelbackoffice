<template>
  	<div class="container center-align">
		<form action="/maintain" method="POST">
			<input type="hidden" name="_token" v-model="csrfToken">
			<TruckAndDriverMap></TruckAndDriverMap>

			<div class="container tire-tab">
				<div class="row left-align card-panel">
					<div class="row">
						<div class="col offset-l1">
							<h5>รายละเอียดการซ่อมบำรุง</h5>						
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6 l4 offset-l2">
							<input type="date" class="datepicker" id="maintainDate" name="maintainDate" required>
							<label for="maintainDate">วันที่ <span class="icon-star">*</span></label>
						</div>
						<div class="input-field col s12 m6 l4">
							<input id="maintainEmployee" name="maintainEmployee" type="text" class="validate" required>
							<label for="maintainEmployee">ผู้ซ่อม <span class="icon-star">*</span></label>
						</div>  
					</div>

					<div class="section">
						<div class="row">
							<div class="col s8 m8 l8 offset-l2">
								<span class="section-header">รายการที่ซ่อม</span>
								<a class="btn-floating btn waves-effect waves-light right" @click="maintainListsRow++"><i class="material-icons">add</i></a>
								<a class="btn-floating btn waves-effect waves-light right" @click="maintainListsRow--"><i class="material-icons">remove</i></a>
							</div>
						</div>
						<div class="row" v-for="list in maintainListsRow">
							<div class="input-field col s6 m6 l4 offset-l2">
								<input id="maintainLists" name="maintainLists[]" type="text" class="validate" required>
								<label for="maintainLists">รายการ {{ list }} <span class="icon-star">*</span></label>
							</div> 
							<div class="input-field col s3 m3 l2">
								<input id="wagePerList" name="wagePerList[]" ref="wages" @change="onWagePerListChange" type="number" class="validate" required>
								<label for="wagePerList">ค่าแรง(บาท) <span class="icon-star">*</span></label>
							</div>
							<div class="input-field col s3 m3 l2">
								<input id="sparePerList" name="sparePerList[]" ref="spares" @change="onSparePerListChange" type="number" class="validate" required>
								<label for="sparePerList">ค่าอะไหล่(บาท) <span class="icon-star">*</span></label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12 m12 l8 offset-l2">
							<textarea id="note" name="note" class="materialize-textarea"></textarea>
							<label for="note">บันทึกรายละเอียด</label>
						</div>
					</div>
					
					<div class="section">
						<div class="row">
							<div class="input-field col s12 m12 l8 offset-l2">
								<blockquote>
									<p class="flow-text">ค่าแรงทั้งหมด: {{ totalWage }} บาท</p>
									<p class="flow-text">ค่าอะไหล่ทั้งหมด: {{ totalSpare  }} บาท</p>
									<p class="flow-text">ค่าใช้จ่ายทั้งหมด: {{ amountCost }} บาท</p>
								</blockquote>
								<input type="hidden" name="totalWage" :value="totalWage">
								<input type="hidden" name="totalSpare" :value="totalSpare">
								<input type="hidden" name="amountCost" :value="amountCost">
							</div>
						</div>						
					</div>

					<div class="input-field col s12 m12 l12 right-align">
						<button class="btn waves-effect waves-light" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</div>       
		</form>          
	</div>
</div>
</template>

<script>
    export default {
		data() {
            return {
                csrfToken: window.Laravel.csrfToken,

                maintainListsRow: 1,
				totalWage: 0,
				totalSpare: 0,
            }
        },
		watch: {
			maintainListsRow: function () {
				if ( this.maintainListsRow <= 0 ) {
					this.maintainListsRow = 1;
				}
			}
        },
		methods: {
			onWagePerListChange: function () {
				let totalWage = 0;
				this.$refs.wages.forEach(function(wage) {
					totalWage = totalWage + parseInt(wage.value);
                });
				this.totalWage = totalWage;
			},
			onSparePerListChange: function () {
				let totalSpare = 0;
				this.$refs.spares.forEach(function(spare) {
					totalSpare = totalSpare + parseInt(spare.value);
                });
				this.totalSpare = totalSpare;
			},
		},
		computed: {
			amountCost: function () {
                return this.totalWage * this.totalSpare;
            },
        },
    }
</script>