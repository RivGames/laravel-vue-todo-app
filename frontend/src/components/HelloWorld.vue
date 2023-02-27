<script setup>
defineProps({
    msg: {
        type: String,
        required: true
    }
})
</script>

<template>
    <div class="greetings">
        <h1 class="text-green-600 text-5xl">{{ msg }}</h1>
    </div>
</template>
