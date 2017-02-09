<template>
    <div class="row">
        <div class="col s12 m10 l8 offset-l2 offset-m1">
            <div class="col s5 l5 m5">
                <div class="card-panel">
                    <img :src="userPhoto" alt="user_photo" class="responsive-img">
                </div>
                <div class="col s12 m12 l12">
                    <label class="role-label">ชื่อคนขับรถ <span class="icon-star">*</span></label>
                    <select name="truckDriver" class="browser-default" v-model="userSelected" @change="onUserSelectedChange" required>
                        <option v-for="option in userOptions" :value="option.value" :disabled="option.disabled">
                            {{ option.text }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col s5 l5 m5 offset-l2 offset-m2 offset-s2">
                <div class="card-panel">
                    <img :src="truckPhoto" alt="truck_photo" class="responsive-img"> 
                </div>
                <div class="col s12 m12 l12">
                    <label class="role-label">ทะเบียนรถบรรทุก <span class="icon-star">*</span></label>
                    <select name="licensePlate" class="browser-default" v-model="truckSelected" @change="onTruckSelectedChange" required>
                        <option v-for="option in truckOptions" :value="option.value" :disabled="option.disabled">
                            {{ option.text }}
                        </option>
                    </select>
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
                userPhoto: '/images/user_icon.png',

                truckSelected: '',  
                truckOptions: [
                    { text: 'Choose your option', value: '', disabled: true },
                ],
                truckPhoto: '/images/truck_icon.png',
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
                    this.truckOptions.push({
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
                const userSelected = this.userSelected;
                let setUserSelectedPhoto;
                this.userOptions.forEach(function(userOption) {
                    if (userSelected == userOption.value) {
                        setUserSelectedPhoto = userOption.photo
                    }
                });

                this.userPhoto = setUserSelectedPhoto;
            },
            onTruckSelectedChange() {
                const truckSelected = this.truckSelected;
                let setTruckSelectedPhoto;
                this.truckOptions.forEach(function(truckOption) {
                    if (truckSelected == truckOption.value) {
                        setTruckSelectedPhoto = truckOption.photo
                    }
                });
                this.truckPhoto = setTruckSelectedPhoto;
            }
        }
    }
</script>