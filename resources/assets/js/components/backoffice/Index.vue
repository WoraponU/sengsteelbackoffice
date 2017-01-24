<template>
    <div>
        <NavBar></NavBar>
        <tabs>
            <tab name="User Management" :selected="true">
                <div class="container center-align">
                    <div class="row">
                        <a href="#modal1" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
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
                        <a href="#modal1" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
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
        //     this.isActive = this.selected
        // }
    }
</script>