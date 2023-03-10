<script setup>
import TodoItem from "@/components/Todo/TodoItem.vue";

defineProps({
    todos: Array
})
</script>
<template>
    <div class="flex mb-4 items-center" v-for="todo in todos" :key="todo.id">
        <TodoItem :todo="todo"/>
    </div>
</template>
