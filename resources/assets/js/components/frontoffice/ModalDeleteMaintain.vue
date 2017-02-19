<template>
	<div id="modalDeleteMaintain" class="modal modal-fixed-footer left-align">
		<form :action="action" method="POST">
            <input type="hidden" name="_token" v-model="csrfToken">
            <input type="hidden" name="_method" value="DELETE">
			<div class="modal-content">
				<h4>ลบรายละเอียดการเติมน้ำมัน</h4>
				<div class="divider"></div>
				<p>&emsp;ชื่อคนขับรถ: {{ firstName }} {{ lastName }}</p>
				<p>&emsp;ทะเบียนรถ: {{ licensePlate }}</p>
				<p>&emsp;วันที่เติมน้ำมัน: {{ maintainDate }}</p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="modal-action waves-effect waves-green btn-flat">Delete</button>
				<button type="button" class="modal-close modal-action waves-effect waves-green btn-flat">Cancel</button>
			</div>
		</form>
	</div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: {
			id: { require: true },
            firstName: { require: true },
            lastName: { require: true },
            licensePlate: { require: true },
            maintainDate: { require: true },
        },
		data() {
            return {
                action: '/maintain/' + this.id,
				csrfToken: window.Laravel.csrfToken,
            }
        },
    }
	
</script>