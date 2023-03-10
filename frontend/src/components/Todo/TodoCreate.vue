<script setup>
import {reactive} from "vue";
const form = reactive({
    title:'',
    body:'',
})
const emit = defineEmits(['data-passed'])
const handleData = () => {
    emit('data-passed',form)
}
</script>
<template>
    <div class="flex mt-4">
        <input v-model="form.title" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Title">
        <input v-model="form.body" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Some text...">
        <button @click="handleData" class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal">Add</button>
    </div>
</template>
