<template>
    <div>
        <NavBar></NavBar>
        <tabs>
            <tab name="สรุปผล" :selected="true">
                <div class="container center-align">
                    สรุปผล
                </div>
            </tab>
            <tab name="เติมน้ำมัน">
                <div class="container center-align">
                    <div class="row">
                        <div class="col s12 m10 l8 offset-l2 offset-m1">
                            <div class="col s5 l5 m5">
                                <div class="card-panel">
                                    <img src="/images/user_icon.png" alt="user_photo" class="responsive-img">
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <select>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    </select>
                                    <label>ชื่อคนขับรถ</label>
                                </div>
                            </div>
                            <div class="col s5 l5 m5 offset-l2 offset-m2 offset-s2">
                                <div class="card-panel">
                                    <img src="/images/truck_icon.png" alt="truck_photo" class="responsive-img"> 
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <select>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    </select>
                                    <label>ทะเบียนรถบรรทุก</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card-panel">
                            <div class="col s12 m6 l6">
                                <input type="date" class="datepicker" id="datetimeRefill" name="datetimeRefill">
                                <label for="datetimeRefill">วัน/เวลาที่เติม <span class="icon-star">*</span></label>
                            </div>  
                            <div class="col s12 m6 l6">
                            </div>     
                            <div class="col s12 m6 l6">
                            </div> 
                            <div class="col s12 m6 l6">
                            </div> 
                            <div class="col s12 m6 l6">
                            </div> 
                            <div class="col s12 m6 l6">
                            </div> 
                            <div class="col s12 m6 l6">
                            </div>    
                        </div>                      
                    </div>
                </div>
            </tab>
            <tab name="เปลี่ยนยาง">
                <div class="container center-align">
                    การเปลี่ยนยาง
                </div>
            </tab>
            <tab name="ซ่อมบำรุง">
                <div class="container center-align">
                    การซ่อมบำรุง
                </div>
            </tab>
        </tabs>
    </div>
</template>

<script>
    export default {
        mounted() {
            if ($('#errorMessage').length) {
                let errorMessage = $('#errorMessage').val();
                let toastContent = $('<span>Fail: ' + errorMessage + '</span>');

                Materialize.toast(toastContent, 5000, 'red');
            }
        }
    }
</script>