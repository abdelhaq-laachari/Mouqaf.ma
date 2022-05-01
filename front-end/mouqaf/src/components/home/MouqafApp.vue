<template>
    <div class="app">
        <div class="left">
            <img src="../../assets/svg/app.svg" alt="">
        </div>
        <div class="right">
            <div class="title">
                <h3>The MOUQAF App will be available soon.</h3>
            </div>
            <div class="par">
                <p>You may easily search for any service you want with the MOUQAF App.</p>
            </div>
            <div class="store">
                <div class="store-img">
                    <img src="../../assets/img/google.png" alt="">
                </div>
                <div class="store-img">
                    <img src="../../assets/img/apple.png" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    name: 'MouqafApp',

}
</script>

<style scoped>
.app {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    height: 100vh;
    /* background: #0464F1; */
    background-color: #fff;
}
.left{
    width: 30%;
}
.left img{
    width: 100%;
}
.right{
    width: 65%;
    display: flex;
    flex-direction: column;
    gap: 2rem;
}
.store{
    width: 50%;
    display: flex;
    justify-content: space-between;
    
}
.store-img{
    width: 45%;
}
.store-img img{
    width: 100%;
}
.title h3{
    /* color: #fff; */
    color: #000;
    font-size: 2rem;
    font-weight: bold;
    font-family: 'Serif';
}
.par{
    width: 80%;
}
.par p{
    /* color: #fff; */
    color: #000;
    font-size: 1.1rem;
    font-family: 'poppins';
}
</style>