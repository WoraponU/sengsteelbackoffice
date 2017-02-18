<template>
    <div id="modalEditTire" class="modal modal-fixed-footer left-align">
        <form :action="action" method="POST">         
            <div class="modal-content">
                <div class="container center-align">
                    <input type="hidden" name="_token" v-model="csrfToken">
                    <input type="hidden" name="_method" value="PUT">

                    <TruckAndDriverMap></TruckAndDriverMap>
                    <div class="container">
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="modal-action waves-effect waves-green btn-flat ">แก้ไข</button>
                <button class="modal-action modal-close waves-effect waves-green btn-flat ">ปิด</button>
            </div>
        </form>               
    </div>
</template>

<script>
    export default {
		data() {
			return {
            }
		},
    }
</script>