<template>
    <div id="modalUser" class="modal">
        <div class="modal-content">
            <h4>User Infomation</h4>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <input id="firstname" type="text" class="validate">
                    <label for="firstname">First Name</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input id="lastname" type="text" class="validate">
                    <label for="lastname">Last Name</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input id="identificationNumber" type="text" class="validate">
                    <label for="identificationNumber">Identification Number</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong format">Email</label>
                </div>
                <div class="input-field col s12 m12 l12">
                    <textarea id="address" class="materialize-textarea"></textarea>
                    <label for="address">Address</label>
                </div>
                <div class="input-field col s12 m12 l12">
                    <select>
                        <option value="" disabled selected>Choose Role</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="truckDriver">Truck Driver</option>
                    </select>
                    <label>Role</label>
                </div>
                <div class="input-field col s12 m12 l6">
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
            <a @click="addUser" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
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
            }
        }
        // props: {
        //     name: { require: true },
        //     selected: { default: false }
        // },
        // data() {
        //     return {
        //         isActive: true
        //     }
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