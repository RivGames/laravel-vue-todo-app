<template>
    <p :class="{'line-through':isDone}" class="w-full text-grey-darkest" >{{ todo.body }}</p>
    <button
        @click="toggle"
        class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green">
        {{isDone ? 'Not Done' : 'Done'}}
    </button>
    <button
        class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">
        Remove
    </button>
</template>

<script setup>
defineProps({
    todo:Object
})
import {ref} from "vue";

const isDone = ref(false)
const toggle = () => {
    isDone.value = !isDone.value
}
</script>
