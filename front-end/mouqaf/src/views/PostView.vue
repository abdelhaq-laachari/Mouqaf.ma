<template>
    <div class="first">
        <SideBar/>
        <!-- <SideBar2/> -->
    </div>
</template>

<script>
import SideBar from "../components/sidebar/SideBar.vue"
// import SideBar2 from "../components/sidebar/SideBar2.vue"
export default {
    name: "PostView",
    components:{
        SideBar
        // SideBar2
    }
}
</script>

<style scoped>
.first{
    /* background-color: #4700d8; */
    height: 100vh;
}
</style>