<template>
  <picture v-if="!isObjEmpty(image)">
    <source v-if="image.webpSrcset"
            :srcset="image.webpSrcset"
            :sizes="image.sizes"
            type="image/webp" />
    <source :srcset="image.srcset"
            :sizes="image.sizes"
            :type="image.type" />
    <img :src="image.src"
         :data-src="image.src"
         class="img-inner"
         :content="image.src"
         :alt="image.alt"
         role="img"
         property="v:image" />
  </picture>
</template>

<script type="application/javascript">
import mixins from "../../Util/mixins.js";

export default {
  props: {
    image: [Array, Object]
  },
  mixins: [mixins],
  name: "PostImage"
};
</script>

<style scoped>

</style>
