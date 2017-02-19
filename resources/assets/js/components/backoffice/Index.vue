<template>
    <div>
        <NavBar></NavBar>
        <tabs>
            <tab name="จัดการพนักงาน" :selected="true">
                <div class="container center-align">
                    <div class="row">
                        <a href="#modalAddUser" class="btn-floating btn-large waves-effect waves-light right"><i class="material-icons">add</i></a>
                    </div>
                    <div class="row">
                        <CardUser v-for="user in users" 
                            :id="user.id"
                            :firstname="user.firstname"
                            :lastname="user.lastname"
                            :identificationNumber="user.identification_number"
                            :driverLicense="user.driver_license"
                            :email="user.email"
                            :phone="user.phone"
                            :photo="user.photo"
                            :address="user.address"
                            :role="user.role"
                        ></CardUser>
                    </div>

                    <div class="row" v-if="dataUserNotFound">
                        <div class="col s12 m12 l12 center-align">
                            <h4>Data Not Found</h4>
                        </div>
                    </div>
                </div>
            </tab>
            <tab name="จัดการรถบรรทุก">
            <div class="container center-align">
                    <div class="row">
                        <a href="#modalAddTruck" class="btn-floating btn-large waves-effect waves-light right"><i class="material-icons">add</i></a>
                    </div>

                    <div class="row">
                        <CardTruck v-for="truck in trucks" 
                            :id="truck.id"
                            :licensePlate="truck.license_plate"
                            :owner="truck.owner"
                            :photo="truck.photo"
                            :registerDate="truck.register_date"
                            :annualTaxDate="truck.annual_tax_date"
                            :gasoline="truck.gasoline"
                            :lubricator="truck.lubricator"
                            :gearBoxOil="truck.gear_box_oil"
                            :finalGearOil="truck.final_gear_oil"
                            :lastNumberCar="truck.last_number_car"
                            :numberWheelPerRow="truck.number_wheel_per_row"
                            :rowOfWheel="truck.row_of_wheel"
                        ></CardTruck>
                    </div>

                    <div class="row" v-if="dataTruckNotFound">
                        <div class="col s12 m12 l12 center-align">
                            <h4>Data Not Found</h4>
                        </div>
                    </div>
                </div>
            </tab>
        </tabs>

        <ModalAddUser></ModalAddUser>
        <ModalAddTruck></ModalAddTruck>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                users: [],
                trucks: [],
                dataUserNotFound: false,
                dataTruckNotFound: false
            }
        },
        beforeMount() {
            axios.get('/backoffice/user')
            .then((response) => {
                this.users = response.data
                
                if (!this.users.length) {
                    this.dataUserNotFound = true
                }
            })
            .catch(function (error) {
                console.log(error);
            });
            //////////////////////////////
            axios.get('/backoffice/truck')
            .then((response) => {
                this.trucks = response.data
                
                if (!this.trucks.length) {
                    this.dataTruckNotFound = true
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        mounted() {
            if ($('#errorMessage').length) {
                let errorMessage = $('#errorMessage').val();
                let toastContent = $('<span>Fail: ' + errorMessage + '</span>');

                Materialize.toast(toastContent, 5000, 'red');
            }
        }
    }
</script>