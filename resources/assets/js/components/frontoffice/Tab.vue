<template>
    <div v-show="isActive">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: {
            name: { require: true },
            selected: { default: false }
        },
        data() {
            return {
                isActive: true
            }
        },
        computed: {
            href() {
                return '#' + this.name.toLowerCase().replace(/ /g, '-');
            }
        },
        mounted() {
            this.isActive = this.selected
        }
    }
</script>