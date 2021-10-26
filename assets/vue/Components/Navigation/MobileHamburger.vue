<template>
    <div class="header__wrap">
        <a :href="homeUrl"
           class="logo">
            <Logo />
        </a>
        
        <div class="hamburger-container">
            <button class="hamburger"
                    v-bind:class="{ 'is-active': menuOpen }" >
                <div class="hamburger-box">
                    <div class="hamburger-inner" />
                </div>
            </button>
        </div>
    </div>
</template>

<script type="application/javascript">
    import Logo from "./Logo.vue";
    
    export default {
        props: {
            homeUrl: String,
            menuOpen: Boolean,
        },
        components: {Logo},
        name: "MobileHamburger"
    };
</script>

<style scoped lang="scss">
    .header__wrap {
        display: flex;
        flex-flow: row nowrap;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 0.5rem;
    }
</style>
