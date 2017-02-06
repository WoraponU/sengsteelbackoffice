<template>
    <div>
        <nav>
            <div class="nav-wrapper second-nav">
                <ul id="nav-mobile">
                    <li v-for="tab in tabs" :class="{ 'active' : tab.isActive }" class="frontoffice-tab">
                        <a :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a>
                    </li>
                </ul>
            </div>
        </nav>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tabs: []
            }
        },
        created() {
            this.tabs = this.$children
        },
        methods: {
            selectTab(selectedTab) {
                this.tabs.forEach(tab => {
                    tab.isActive = (tab.name == selectedTab.name)
                });
            }
        }
    }
</script>
