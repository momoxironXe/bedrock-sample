<template>
    <div class="topnav desktop-navigation">
        <a :href="homeUrl"
           class="logo">
            <Logo />
        </a>
        
        <ul class="header__nav">
            <Link v-for="(item) in menu"
                  :key="item.id"
                  :menu-item="item"
                  :post-id="postId" />
        </ul>
    </div>
</template>

<script type="application/javascript">
    import Logo from "./Logo.vue";
    import Link from "./Link.vue";
    
    export default {
        props: {
            homeUrl: String,
            menu: [Array, Object],
            postId: [Number, String],
        },
        data() {return {}},
        methods: {},
        components: {Link, Logo},
        name: "DesktopNavigation"
    };
</script>

<style scoped>

</style>
