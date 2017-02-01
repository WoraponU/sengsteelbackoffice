<template>
    <div id="modalAddTruck" class="modal modal-fixed-footer">
        <form action="/backoffice/user" method="POST">
            <input type="hidden" name="_token" v-model="csrfToken">
            <div class="modal-content">
                <h4>Truck Infomation</h4>
                <div class="divider"></div>

                <div class="row mt25">
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
                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <input name="license_plate" id="license_plate" type="text" class="validate" required>
                        <label for="license_plate">License Plate <span class="icon-star">*</span></label>
                    </div>
                    <div class="input-field col s12 m12 l6">
                        <input name="owner" id="owner" type="text" class="validate" required>
                        <label for="owner">Owner <span class="icon-star">*</span></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l6">
                        <input name="register_date" id="register_date" type="date" class="datepicker" required>
                        <label for="register_date">Register Date <span class="icon-star">*</span></label>
                    </div>
                    
                </div>
                <!--<div class="row">
                    <div class="input-field col s12 m12 l6">
                        <input name="phone" id="phone" type="text" class="validate" required>
                        <label for="phone">Tel <span class="icon-star">*</span></label>
                    </div>
                    <div class="input-field col s12 m12 l6">
                        <input name="email" id="email" type="email" class="validate">
                        <label for="email" data-error="wrong format">Email</label>
                    </div>
                </div>-->
                <!--<div class="row">
                    <div class="input-field col s12 m12 l12">
                        <textarea name="address" id="address" class="materialize-textarea"></textarea>
                        <label for="address">Address</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l6">
                        <label class="role-label">Role <span class="icon-star">*</span></label>
                        <select name="role" class="browser-default" v-model="selected" @change="onRoleChange" required>
                            <option v-for="option in options" v-bind:value="option.value" :disabled="option.disabled">
                                {{ option.text }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row" v-if="isShowUserPass">
                    <div class="input-field col s12 m12 l6" >
                        <input name="username" id="username" type="text" class="validate" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field col s12 m12 l6">
                        <input name="password" id="password" type="password" class="validate" required>
                        <label for="password">Password</label>
                    </div>
                </div>-->
            </div>
            <div class="modal-footer">
                <button type="submit" class="modal-action waves-effect waves-green btn-flat">Add</button>
                <button type="button" class="modal-close modal-action waves-effect waves-green btn-flat">Cancel</button>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                csrfToken: window.Laravel.csrfToken,
                isShowUserPass: false,
                selected: '',
                options: [
                    { text: 'Choose your option', value: '', disabled: true },
                    { text: 'Owner', value: 'owner' },
                    { text: 'Admin', value: 'admin' },
                    { text: 'Truck Driver', value: 'truckDriver' }
                ],
                photoPreview: '/images/truck_icon.png',
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
            onRoleChange() {
                if (this.selected == 'truckDriver') {
                    this.isShowUserPass = false

                } else {
                    this.isShowUserPass = true
                }
            },
        }
    }
</script>