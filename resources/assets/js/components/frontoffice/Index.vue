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
    }
</script>