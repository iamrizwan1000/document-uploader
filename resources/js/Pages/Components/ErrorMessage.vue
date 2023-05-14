<template>
    <span class="text-red text-sm">
        {{message}}
    </span>
</template>

<script>
export default {
name: "ErrorMessage",
    props: {
    message : String
    }
}
</script>

<style scoped>

</style>
