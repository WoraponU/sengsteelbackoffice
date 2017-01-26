<template>
    <div>
        <NavBar></NavBar>
        <tabs>
            <tab name="User Management" :selected="true">
                <div class="container center-align">
                    <div class="row">
                        <a href="#modalUser" class="btn-floating btn-large waves-effect waves-light right"><i class="material-icons">add</i></a>
                    </div>

                    <div class="row">
                        <Card></Card>
                        <Card></Card>
                        <Card></Card>
                    </div>
                </div>
            </tab>
            <tab name="Tuck Management">
            <div class="container center-align">
                    <div class="row">
                        <a href="#modal" class="btn-floating btn-large waves-effect waves-light right"><i class="material-icons">add</i></a>
                    </div>

                    <div class="row">
                        <Card></Card>
                        <Card></Card>
                        <Card></Card>
                    </div>
                </div>
            </tab>
        </tabs>
        <Modal></Modal>
    </div>
</template>

<script>
    import axios from 'axios';
    
    export default {
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
        //     // axios.get('/skills').then(response => console.log(response))
        // }
    }
</script>