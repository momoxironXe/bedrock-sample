<template>
    <div class="temp-container" style="padding-bottom: 5rem;">
        <div class="btn-container">
            <button class="btn btn-primary"
                    @click="$emit('getPosts')">Grab Blog Posts
            </button>
        </div>
    </div>
</template>

<script type="application/javascript">
    export default {
        name: "TempPostGrab"
    };
</script>

<style lang="scss" scoped>
    .temp-container {
        flex: 0 0 100%;
        .loading-container,
        .btn-container {
            width: 100%;
        }
    }
    .btn-primary {
        display:          inline-block;
        font-weight:      400;
        line-height:      1.5;
        text-align:       center;
        text-decoration:  none;
        vertical-align:   middle;
        cursor:           pointer;
        user-select:      none;
        padding:          .375rem .75rem;
        font-size:        1rem;
        border-radius:    .25rem;
        transition:       color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        color:            #FFFFFF;
        background-color: #0D6EFD;
        border-color:     #0D6EFD;
    }
</style>
