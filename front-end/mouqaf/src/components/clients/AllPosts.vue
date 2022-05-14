<template>
    <div class="all__posts">
        <div class="post">
            <div class="post__header">
                <h3>Post Title</h3>
                <span>6 weeks ago</span>
                <span> <FIcons :icon="['fas', 'location']" class="b-icon face" />&nbsp; Safi</span>
            </div>
            <div class="post__topic">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et iste beatae dolorem sed labore nobis error voluptatibus non aspernatur dolores? Dolore a accusantium culpa voluptate eius tempore nisi? Velit, eum.</p>
            </div>
            <button class="btn btn-primary">Read Comment</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "AllPosts"
}
</script>

<style scoped>

</style>