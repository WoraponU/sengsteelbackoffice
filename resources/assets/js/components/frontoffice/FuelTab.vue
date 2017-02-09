<template>
  	<div class="container center-align">
		<TruckAndDriverMap></TruckAndDriverMap>

		<div class="container">
			<div class="row left-align card-panel">
				<div class="row">
					<div class="col offset-l1">
						<h5>รายละเอียดการเติมน้ำมัน</h5>						
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
						<input id="gasEmployee" type="text" class="validate">
						<label for="gasEmployee">ผู้เติม <span class="icon-star">*</span></label>
					</div>  
					<div class="input-field col s12 m6 l4">
						<select name="gasType">
							<option value="" disabled selected>โปรดระบุ</option>
							<option value="1">น้ำมันเครื่องยนต์</option>
							<option value="2">น้ำมันห้องเครื่อง</option>
							<option value="3">น้ำมันห้องเกียร์</option>
							<option value="3">น้ำมันเฟืองท้าย</option>
						</select>
						<label>ประเภทน้ำมัน <span class="icon-star">*</span></label>
					</div>   
				</div>
				<div class="row">
					<div class="input-field col s12 m6 l4 offset-l2">
						<input id="lastNumberCar" type="text" class="validate">
						<label for="lastNumberCar">หมายเลขกิโลเมตรครั้งก่อน</label>
					</div>   
					<div class="input-field col s12 m6 l4">
						<input id="presentNumberCar" type="text" class="validate">
						<label for="presentNumberCar">หมายเลขกิโลเมตรล่าสุด <span class="icon-star">*</span></label>
					</div>  
				</div>
				<div class="row">
					<div class="input-field col s12 m6 l4 offset-l2">
						<input id="liter" name="liter" type="number" class="validate">
						<label for="liter">จำนวนลิตร <span class="icon-star">*</span></label>
					</div> 
				</div>
				<div class="row">
					<div class="input-field col s12 m12 l8 offset-l2">
						<textarea id="note" name="note" class="materialize-textarea"></textarea>
						<label for="note">บันทึกรายละเอียด</label>
					</div>
				</div>

				<div class="divider"></div>
				<div class="section">
					<div class="row">
						<div class="input-field col s12 m12 l8 offset-l2">
                    		<blockquote>
								<p class="flow-text">ระยะทางที่วิ่ง: 500 กิโลเมตร</p>
								<p class="flow-text">น้ำมันที่ใช้: 500 ลิตร</p>
								<p class="flow-text">อัตราการใช้น้ำมัน: 1 กิโลเมตร/ลิตร</p>
                    		</blockquote>
						</div>
					</div>						
				</div>
				<div class="divider"></div>				

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