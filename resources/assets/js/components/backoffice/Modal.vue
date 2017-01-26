<template>
    <div id="modalUser" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>User Infomation</h4>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <input @change="test" id="firstname" type="text" class="validate">
                    <label for="firstname">First Name <span class="icon-star">*</span></label>
                    
                </div>
                <div class="input-field col s12 m12 l6">
                    <input id="lastname" type="text" class="validate">
                    <label for="lastname">Last Name <span class="icon-star">*</span></label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input id="identificationNumber" type="text" class="validate">
                    <label for="identificationNumber">Identification Number <span class="icon-star">*</span></label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong format">Email</label>
                </div>

                <br>
                <div class="input-field col s12 m12 l12">
                    <textarea id="address" class="materialize-textarea"></textarea>
                    <label for="address">Address</label>
                </div>

                <br>
                <div class="input-field col s12 m12 l6">
                    <select @change="test">
                        <option value="" disabled selected>Choose Role</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="truckDriver">Truck Driver</option>
                    </select>
                    <label>Role <span class="icon-star">*</span></label>
                </div>
                <div class="input-field col s12 m12 l6" v-show="dataShow">
                    <input id="username" type="text" class="validate">
                    <label for="username">Username</label>
                </div>
                <div class="input-field col s12 m12 l6" v-show="dataShow">
                    <input id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a @click="test" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                dataShow: false
            }
        },
        methods: {
            addUser() {
                axios.post('/user', {
                    firstName: 'Fred',
                    lastName: 'Flintstone'
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            test() {
                alert();
            }
        }
        // props: {
        //     name: { require: true },
        //     selected: { default: false }
        // },
        
        // computed: {
        //     href() {
        //         return '#' + this.name.toLowerCase().replace(/ /g, '-');
        //     }
        // },
        // mounted() {
        //     this.isActive = this.selected
        // }
    }
</script>