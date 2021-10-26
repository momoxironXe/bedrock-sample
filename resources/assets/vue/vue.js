/**
 * A file that contains most of the Vue Components and logic
 */
import axios from "axios";
import Vue from "vue";
import {store} from "./Vuex/store.js";
import { MediaQueries } from "vue-media-queries";
import VueAccessibleModal from "vue-accessible-modal";

window.Vue = Vue;
const mediaQueries = new MediaQueries();
Vue.use(mediaQueries);

/** Vue Accessibility Default Options **/
const modalOptions = {
    transition: 'fade',
};
Vue.use(VueAccessibleModal, modalOptions);

Vue.config.productionTip = false;

const navigationElm = document.getElementById("vue-navigation-container");

const VueInstance = new Vue({
    store,
    mediaQueries: mediaQueries,
    created() {
        if (typeof NAV !== "undefined" && navigationElm !== null) {
            this.$store.dispatch('getNavigation', {viewport: "desktop", navID: NAV.navID});
            this.$store.dispatch('getNavigation', {viewport: "mobile", navID: NAV.navID});
        }
    }
});

/**
 * The Navigation
 */
if (navigationElm !== null) {
    const navigationContainer = Vue.component("NavigationContainer", require('./Components/Navigation.vue').default);
    const navigationElm = new Vue({
        el: "#vue-navigation-container",
        mediaQueries: mediaQueries,
        store,
        render: h => h(navigationContainer)
    });
}

if (document.getElementById("modal-cnt") !== null) {
    const ModalWindow = Vue.component("modal", require('./Components/ModalContainer.vue').default);
    const modalElm = new Vue({
        el: "#modal-cnt",
        render: h => h(ModalWindow)
    });
}
