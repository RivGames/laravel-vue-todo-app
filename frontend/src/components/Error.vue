<script setup>
defineProps({
    errors:Object,
    name:String
})
</script>
<template>
    <div v-if="errors.name">
        <span class="text-sm text-red-400">{{ errors.name[0] }}</span>
    </div>
</template>
