<script setup>
import {onMounted} from "vue";
import TodoCreate from "@/components/Todo/TodoCreate.vue";
import TodoRead from "@/components/Todo/TodoRead.vue";
import useTodo from "@/composables/useTodo";

const {read, todos} = useTodo()
setInterval(function () {
    read()
}, 2000)
onMounted(() => read())
</script>
<template>
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
            <div class="mb-4">
                <h1 class="text-grey-darkest">Todo List</h1>
                <TodoCreate/>
            </div>
            <TodoRead :todos="todos"/>
        </div>
    </div>
</template>
