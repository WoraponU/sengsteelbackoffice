<template>
    <div class="row">
        <div class="col s12 m10 l8 offset-l2 offset-m1">
            <div class="col s5 l5 m5">
                <div class="card-panel">
                    <img src="/images/user_icon.png" alt="user_photo" class="responsive-img">
                </div>
                <div class="input-field col s12 m12 l12">
                    <select name="role"  @change="onUserSelectedChange" required>
                        <option v-for="option in userOptions" :photo="userOptions.photo" :disabled="option.disabled">
                            {{ option.text }}
                        </option>
                    </select>
                    <label>ชื่อคนขับรถ</label>
                </div>
            </div>
            <div class="col s5 l5 m5 offset-l2 offset-m2 offset-s2">
                <div class="card-panel">
                    <img src="/images/truck_icon.png" alt="truck_photo" class="responsive-img"> 
                </div>
                <div class="input-field col s12 m12 l12">
                    <select name="role" v-model="selected" required>
                        <option v-for="option in truckOption" v-bind:value="truckOption.value" :disabled="option.disabled">
                            {{ option.text }}
                        </option>
                    </select>
                    <label>ทะเบียนรถบรรทุก</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                userSelected: '',
                userOptions: [
                    { text: 'Choose your option', value: '', disabled: true },
                ],
                truckOption: [
                    { text: 'Choose your option', value: '', disabled: true },
                ],
            }
        },
        beforeMount() {
            axios.get('/backoffice/user')
            .then((response) => {
                for (let i = 0; i < response.data.length; i++) { 
                    this.userOptions.push({
                         text: response.data[i].firstname, 
                         value: response.data[i].id,
                         photo: response.data[i].photo
                    });
                }
            })
            .catch(function (error) {
                console.log(error);
            });

            axios.get('/backoffice/truck')
            .then((response) => {
                for (let i = 0; i < response.data.length; i++) { 
                    this.truckOption.push({
                         text: response.data[i].license_plate, 
                         value: response.data[i].id,
                         photo: response.data[i].photo
                    });
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        updated: function() {
            $('select').material_select()
            Materialize.updateTextFields()
        },
        methods: {
            onUserSelectedChange() {
                console.log('fdsaf');
            }
        }
    }
</script>