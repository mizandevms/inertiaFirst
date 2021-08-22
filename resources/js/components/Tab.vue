<template>
    <tabs class=" max-w-lg mx-auto py-4">
        <tab name="First tab"> First tab content </tab>
        <tab name="Second tab"> Second tab content </tab>
        <tab name="Third tab"> Third tab content </tab>
    </tabs>
</template>

<script>
import {createApp} from "vue"
import {Tabs, Tab} from "vue3-tabs-component"
export default {
    components: {
        Tabs,
        Tab,
    },
}
</script>
<style scoped>
.tabs-component {
    display: flex;
    justify-content: space-between;
    gap: 2rem;
}
.tabs-component-tabs li {
    font-size: 16px !important;
}
.tabs-component-panels section {
    background-color: hotpink !important;
}
</style>
