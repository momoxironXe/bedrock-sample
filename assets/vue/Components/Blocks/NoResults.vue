<template>
  <div :class="containerClass">
    <p :class="paragraphClass" v-text="noResultsText"></p>
  </div>
</template>

<script type="application/javascript">
export default {
  props: {
    containerClass: String,
    noResultsText: String,
    paragraphClass: String,
  },
  name: "NoResults"
};
</script>

<style scoped>

</style>
