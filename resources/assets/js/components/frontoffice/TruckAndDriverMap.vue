<template>
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
</template>

<script>
    export default {
    }
</script>