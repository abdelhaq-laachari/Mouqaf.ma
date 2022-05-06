<template>
    <div class="first">
        <ClientHeader/>
    </div>
</template>

<script>
import ClientHeader from "../components/client/ClientHeader.vue"
export default {
    name: "PostView",
    components:{
        ClientHeader
    }
}
</script>

<style scoped>
.first{
    background-color: red;
    height: 100vh;
}
</style>