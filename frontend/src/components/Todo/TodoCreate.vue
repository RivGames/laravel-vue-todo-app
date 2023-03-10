<script setup>
import {reactive} from "vue";
import useTodo from "@/composables/useTodo";
const form = reactive({
    title:'',
    body:'',
});
const {create} = useTodo();
</script>
<template>
    <form @submit.prevent="create(form)">
    <div class="flex mt-4">
        <input v-model="form.title" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Title">
        <input v-model="form.body" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Some text...">
        <button class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal">Add</button>
    </div>
    </form>
</template>
