<template>
    <div class="first">
        <SideBar/>
    </div>
</template>

<script>
import SideBar from "../components/sidebar/SideBar.vue"
export default {
    name: "PostView",
    components:{
        SideBar
    }
}
</script>

<style scoped>
.first{
    /* background-color: #4700d8; */
    height: 100vh;
}
</style>