<template>
    <div>
        <h1 class="text-xl text-center text-indigo-700">Here</h1>
        <There />
    </div>
</template>
<script>
import There from "../components/There.vue"

export default {
    components: {
        There,
    },
    props:{
        data: Array,
    },
    setup(props) {
        console.log("here", props.data)
        return {}
    },
}
</script>
<style scoped></style>
