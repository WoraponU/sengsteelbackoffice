<template>
	<div id="modalDelete" class="modal left-align">
		<form :action="action" method="POST">
            <input type="hidden" name="_token" v-model="csrfToken">
            <input type="hidden" name="_method" value="DELETE">
			<div class="modal-content">
				<h4>ลบข้อมูลพนักงาน</h4>
				<div class="divider"></div>
				<p>&emsp;{{ firstname }} {{ lastname }}</p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="modal-action waves-effect waves-green btn-flat">ลบ</button>
				<button type="button" class="modal-close modal-action waves-effect waves-green btn-flat">ปิด</button>
			</div>
		</form>
	</div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: {
            id: { require: true },
            firstname: { require: true },
            lastname: { require: true }
        },
		data() {
            return {
                action: '/backoffice/user/' + this.id,
				csrfToken: window.Laravel.csrfToken,
            }
        },
    }
</script>