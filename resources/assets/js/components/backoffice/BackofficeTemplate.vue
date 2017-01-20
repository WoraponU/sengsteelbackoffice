<template>
    <div> 
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo">Logo</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="sass.html">Sass</a></li>
                        <li><a href="badges.html">Components</a></li>
                        <li><a href="collapsible.html">JavaScript</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <nav>
            <div class="nav-wrapper second-nav">
                <ul id="nav-mobile" class="hide-on-med-and-down">
                    <li :class="{ 'active':tab=='user'}"><a href="sass.html">User Management</a></li>
                    <li><a href="badges.html">Truck Management</a></li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        props: ['tab'],
        mounted() {
            console.log(this.tab)
        },
        data() {
            return {
                test: 'a'
            }
        }
    }
</script>
