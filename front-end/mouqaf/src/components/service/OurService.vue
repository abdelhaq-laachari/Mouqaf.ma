<template>
    <div class="first">
        <div class="first__title">
            <h3>Most Popular Services</h3>
        </div>
        <div class="first__card">
            <div class="card__img">
                <img src="../../assets/img/1.jpg" alt="">
            </div>
            <div class="card__par">
                <span>Electrician</span>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos dolor, obcaecati commodi laborum omnis sit. Minima suscipit aut quam maiores ratione veritatis repellendus illum! Laudantium ab tenetur odio repellendus illum?</p>
            </div>
        </div>
        <div class="first__card">
            <div class="card__par">
                <span>Electrician</span>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos dolor, obcaecati commodi laborum omnis sit. Minima suscipit aut quam maiores ratione veritatis repellendus illum! Laudantium ab tenetur odio repellendus illum?</p>
            </div>
            <div class="card__img">
                <img src="../../assets/img/2.jpg" alt="">
            </div>
        </div>
        <div class="first__card">
            <div class="card__img">
                <img src="../../assets/img/3.jpg" alt="">
            </div>
            <div class="card__par">
                <span>Electrician</span>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos dolor, obcaecati commodi laborum omnis sit. Minima suscipit aut quam maiores ratione veritatis repellendus illum! Laudantium ab tenetur odio repellendus illum?</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OurService",

}
</script>

<style scoped>
.first{
    width: 100%;
    display: flex;
    flex-direction: column;
}
.first__card{
    width: 90%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.card__img{
    width: 45%;
}
.card__img img{
    width: 100%;
}
.card__par{
    width: 50%;
}

</style>