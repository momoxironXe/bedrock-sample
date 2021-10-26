<template>
    <div class="col-xs-12">
        <button id="show-modal"
                type="button"
                @click="showModal">Show Modal</button>
        <vue-accessible-modal>
            <template v-slot:backdrop></template>
            <template v-slot:header>Test</template>
        </vue-accessible-modal>
    </div>
</template>

<script type="application/javascript">
    import Modal from "./Modal/Modal.vue";
    
    export default {
        data() {
            return {
                show : false,
            }
        },
        methods: {
            showModal() {
                this.$modal.show(Modal, {
                    label: 'Accessible Modal',
                    attributes: {
                        id: 'accessible-modal',
                    },
                })
            }
        },
        name: "ModalContainer"
    };
</script>

<style scoped lang="scss">
    @import 'vue-accessible-modal/src/styles/core.scss';
</style>
