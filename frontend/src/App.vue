<script setup>
import Todo from "@/components/Todo.vue";
import Login from "@/components/Login.vue";
import Register from "@/components/Register.vue";
import {ref} from 'vue';

const dataFromChild = ref(false);

const handleDataPassed = (data) => {
    dataFromChild.value = data;
};
</script>

<template>
    <header>
        <div class="wrapper">
            <h1 class="text-green-600 text-5xl center">TodoApp👋</h1>
        </div>
    </header>

    <main class="flex gap-4">
        <div v-if="!dataFromChild">
            <p class="font-bold text-xl">Register</p>
            <Register/>
            <p class="font-bold text-xl">Login</p>
            <Login @data-passed="handleDataPassed"/>
        </div>
        <Todo/>
    </main>
</template>
