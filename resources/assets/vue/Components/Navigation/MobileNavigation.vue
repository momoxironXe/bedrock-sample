<template>
    <div v-show="menuOpen"
        class="topnav vue-mobile-navigation mobile-navigation">
        <ul class="header__dropdown">
            <Link v-for="(item) in menu"
                  :key="item.id"
                  :menu-item="item"
                  :post-id="postId" />
        </ul>
    </div>
</template>

<script type="application/javascript">
    import Link from "./Link.vue";

    export default {
        props: {
            homeUrl: String,
            menu: [Array, Object],
            menuOpen: [Boolean],
            postId: [Number, String]
        },
        data() { return{} },
        created() {},
        methods: {},
        components: {Link},
        name: "MobileNavigation"
    };
</script>

<style scoped>

</style>
