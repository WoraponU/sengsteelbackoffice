<template>
    <div id="modalUser" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>User Infomation</h4>
            <div class="row">
                <div class="col s12 m12 l12 center-align">
                    <img class="circle responsive-img" :src="imgIcon" alt="photo">
                    <input @change="onImageChange($event)" type="file" name="pic" accept="image/*">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <input id="firstname" type="text" class="validate">
                    <label for="firstname">First Name <span class="icon-star">*</span></label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input id="lastname" type="text" class="validate">
                    <label for="lastname">Last Name <span class="icon-star">*</span></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <input id="identificationNumber" type="text" class="validate">
                    <label for="identificationNumber">Identification Number <span class="icon-star">*</span></label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong format">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <textarea id="address" class="materialize-textarea"></textarea>
                    <label for="address">Address</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l6">
                    <label class="role-label">Role <span class="icon-star">*</span></label>
                    <select class="browser-default" v-model="selected" @change="onRoleChange">
                        <option v-for="option in options" v-bind:value="option.value" :disabled="option.disabled">
                            {{ option.text }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="row" v-show="isShowUserPass">
                <div class="input-field col s12 m12 l6" >
                    <input id="username" type="text" class="validate">
                    <label for="username">Username</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                isShowUserPass: false,
                selected: '',
                imgIconValue: '',
                options: [
                    { text: 'Choose your option', value: '', disabled: true },
                    { text: 'Owner', value: 'owner' },
                    { text: 'Admin', value: 'admin' },
                    { text: 'Truck Driver', value: 'truckDriver' }
                ],
                imgIcon: '../img/user_image.png'
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
                    this.imgIcon = e.target.result;
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
            onAddUser() {
                const params = {
                    // firstname: ,
                };
                // axios.post('/user', {
                //     firstname: ,
                //     lastName: 'Flintstone'
                // })
                // .then(function (response) {
                //     console.log(response);
                // })
                // .catch(function (error) {
                //     console.log(error);
                // });
            },
        }
    }
</script>