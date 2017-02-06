<template>
    <div>
        <NavBar></NavBar>
        <tabs>
            <tab name="สรุปผล" :selected="true">
                <div class="container center-align">
                    สรุปผล
                </div>
            </tab>
            <tab name="การเติมน้ำมัน">
                <div class="container center-align">
                    การเติมน้ำมัน
                </div>
            </tab>
            <tab name="การเปลี่ยนยาง">
                <div class="container center-align">
                    การเปลี่ยนยาง
                </div>
            </tab>
            <tab name="การซ่อมบำรุง">
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