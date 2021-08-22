<template>
    <div>
        <h1 class="text-xl text-center text-indigo-700">Welcome</h1>

        <inertia-link href="/dashboard" class="text-xl text-center text-green-700 font-extrabold">Dashboard</inertia-link>
        <br>
        <br>
        <inertia-link href="/dynamic-search" class="text-xl text-center text-green-700 font-extrabold">Dynamic Search</inertia-link>

        <p class="text-center">
            <input type="text" placeholder="search" class="border border-gray-200 rounded-md px-3 py-1 outline-none" />
        </p>
        <typed />
        <tab />
        <Here :data="jsonFile" />
    </div>
</template>
<script>
import jsonData from "../../../public/Assets/sample4"
import Here from "../components/Here.vue"
import typed from "../components/Typed"
import tab from "../components/Tab.vue"

export default {
    components: {
        jsonData,
        Here,
        typed,
        tab,
    },
    setup() {
        const jsonFile = jsonData
        // console.log(jsonFile)

        return {
            jsonFile,
        }
    },
}
</script>
<style scoped></style>
