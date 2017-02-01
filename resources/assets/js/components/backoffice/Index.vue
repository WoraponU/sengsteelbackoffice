<template>
    <div>
        <NavBar></NavBar>
        <tabs>
            <tab name="User Management" :selected="true">
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
            <tab name="Tuck Management">
            <div class="container center-align">
                    <div class="row">
                        <a href="#modalAddTruck" class="btn-floating btn-large waves-effect waves-light right"><i class="material-icons">add</i></a>
                    </div>

                    <div class="row">
                        <CardTruck v-for="user in users" 
                            :id="user.id"
                            :licensePlate="user.license_plate"
                            :owner="user.owner"
                            :photo="user.photo"
                            :registerDate="user.register_date"
                            :annualTaxDate="user.annual_tax_date"
                            :gasoline="user.gasoline"
                            :lubricator="user.lubricator"
                            :gearBoxOil="user.gear_box_oil"
                            :finalGearOil="user.final_gear_oil"
                            :numberOfWheel="user.number_of_wheel"
                            :rowOfWheel="user.row_of_wheel"
                            :lastNumberCar="user.last_number_car"
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

            axios.get('/backoffice/truck')
            .then((response) => {
                this.truck = response.data
                
                if (!this.truck.length) {
                    this.dataTruckNotFound = true
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }
</script>