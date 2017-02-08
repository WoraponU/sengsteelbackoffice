<template>
  	<div class="container center-align">
		<TruckAndDriverMap></TruckAndDriverMap>

		<div class="container tire-tab">
			<div class="row left-align card-panel">
				<div class="row">
					<div class="col offset-l1">
						<h5>รายละเอียดการเปลี่ยนยาง</h5>						
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
						<label for="tireEmployee">ผู้เปลี่ยน <span class="icon-star">*</span></label>
					</div>  
				</div>

                <div class="section">
                    <div class="row">
                        <span class="section-header col s12 m12 l8 offset-l2">รายละเอียดยาง</span>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-l2">
                            <input id="lastNumberCar" type="text" class="validate">
                            <label for="lastNumberCar">ชนิดยาง <span class="icon-star">*</span></label>
                        </div> 
                        <div class="input-field col s12 m6 l4">
                            <input id="lastNumberCar" type="text" class="validate">
                            <label for="lastNumberCar">ยี่ห้อ <span class="icon-star">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-l2">
                            <input id="lastNumberCar" type="number" class="validate">
                            <label for="lastNumberCar">ราคา/เส้น <span class="icon-star">*</span></label>
                        </div> 
                        <div class="input-field col s12 m6 l4">
                            <input id="lastNumberCar" type="number" class="validate">
                            <label for="lastNumberCar">ค่าแรง/เส้น <span class="icon-star">*</span></label>
                        </div>    
                    </div>
                </div>

                <div class="section">
                    <div class="row">
                        <span class="section-header col s12 m12 l8 offset-l2">ตำแหน่งยาง</span>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col s12 m12 l12 center-align">
                                <img class="responsive-img" :src="photoPreview" alt="photo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col offset-s1 offset-m1 offset-l1 s11 m11 l11 center-align">
                                <input @change="onImageChange($event)" type="file" accept="image/*" readonly>
                                <input name="photo" type="hidden" :value="photoPreview">
                            </div>
                        </div>
                        <div class="input-field col s12 m6 l4 offset-l2">
                            <select>
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">ตัวแม่</option>
                                <option value="2">ตัวลูก</option>
                            </select>
                            <label>ตัวแม่/ตัวลูก <span class="icon-star">*</span></label>
                        </div> 
                        <div class="input-field col s12 m6 l4">
                            <input id="lastNumberCar" type="number" class="validate">
                            <label for="lastNumberCar">ยางแถวที่ <span class="icon-star">*</span></label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-l2">
                            <input id="lastNumberCar" type="number" class="validate">
                            <label for="lastNumberCar">หมายเลขยาง <span class="icon-star">*</span></label>
                        </div> 
                        <div class="input-field col s12 m6 l4">
                            <input id="lastNumberCar" type="number" class="validate">
                            <label for="lastNumberCar">จำนวน <span class="icon-star">*</span></label>
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
        data() {
            return {
                csrfToken: window.Laravel.csrfToken,
                photoPreview: '/images/tire_icon.png',
            }
        },
        methods: {
            onImageChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };
                reader.readAsDataURL(file);
            },
        }
    }
</script>