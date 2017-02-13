<template>
    <div>
        <NavBar></NavBar>
        <tabs>
            <tab name="สรุปผล" :selected="true">
                <DashboardTab></DashboardTab>
            </tab>
            <tab name="เติมน้ำมัน">
                <FuelTab></FuelTab>
            </tab>
            <tab name="เปลี่ยนยาง">
                <TireTab></TireTab>
            </tab>
            <tab name="ซ่อมบำรุง">
                <MaintainTab></MaintainTab>
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