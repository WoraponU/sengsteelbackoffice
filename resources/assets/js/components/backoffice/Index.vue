<template>
    <div>
        <NavBar></NavBar>
        <tabs>
            <tab name="User Management" :selected="true">
                <div class="container center-align">
                    <div class="row">
                        <a href="#modalAdd" class="btn-floating btn-large waves-effect waves-light right"><i class="material-icons">add</i></a>
                    </div>
                    <div class="row">
                        <Card v-for="user in users" 
                            :firstname="user.firstname"
                            :lastname="user.lastname"
                            :identificationNumber="user.identification_number"
                            :email="user.email"
                            :phone="user.phone"
                            :photo="user.photo"
                            :address="user.address"
                            :role="user.role"
                        ></Card>
                    </div>

                    <div class="row" v-if="dataNotFound">
                        <div class="col s12 m12 l12 center-align">
                            <h4>Data Not Found</h4>
                        </div>
                    </div>
                </div>
            </tab>
            <tab name="Tuck Management">
            <div class="container center-align">
                    <div class="row">
                        <a href="#modal" class="btn-floating btn-large waves-effect waves-light right"><i class="material-icons">add</i></a>
                    </div>

                    <div class="row">
                        <!--<Card></Card>
                        <Card></Card>
                        <Card></Card>-->
                    </div>
                </div>
            </tab>
        </tabs>

        <ModalAdd></ModalAdd>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                users: [],
                dataNotFound: false
            }
        },
        beforeMount() {
            axios.get('/backoffice/user')
            .then((response) => {
                this.users = response.data
                
                if (!this.users.length) {
                    this.dataNotFound = true
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }
</script>