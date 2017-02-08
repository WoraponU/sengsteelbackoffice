<template>
  	<div class="container center-align">
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
						<input type="date" class="datepicker" id="dateTime" name="dateTime">
						<label for="dateTime">วัน/เวลา <span class="icon-star">*</span></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6 l4 offset-l2">
						<input id="tireEmployee" type="text" class="validate">
						<label for="tireEmployee">ผู้ซ่อม <span class="icon-star">*</span></label>
					</div>  
				</div>

                <div class="section">
                    <div class="row">
                        <span class="section-header col s12 m12 l8 offset-l2">รายการที่ซ่อม</span>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l4 offset-l2">
                            <input id="lastNumberCar" type="text" class="validate">
                            <label for="lastNumberCar">รายการ <span class="icon-star">*</span></label>
                        </div> 
                        <div class="input-field col s3 m3 l2">
                            <input id="lastNumberCar" type="number" class="validate">
                            <label for="lastNumberCar">ราคา(บาท) <span class="icon-star">*</span></label>
                        </div>
                        <div class="input-field col s3 m3 l2">
                            <input id="lastNumberCar" type="number" class="validate">
                            <label for="lastNumberCar">ราคา(บาท) <span class="icon-star">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="row">
					<div class="input-field col s12 m12 l8 offset-l2">
						<textarea id="note" class="materialize-textarea"></textarea>
						<label for="note">บันทึกรายละเอียด</label>
					</div>
				</div>
				
				<div class="input-field col s12 m12 l12 right-align">
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
						<i class="material-icons right">send</i>
					</button>
				</div>
			</div>
		</div>                 
	</div>
</div>
</template>

<script>
    export default {
    }
</script>