<template>
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800"> {{value}} </span>
</template>

<script>
export default {
    props : ['value'],
    name: "DangerBadge"
}
</script>

<style scoped>

</style>
