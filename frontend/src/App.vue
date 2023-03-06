<script setup>
import Todo from "@/components/Todo.vue";
import Login from "@/components/Login.vue";
import Register from "@/components/Register.vue";
</script>

<template>
    <header>
        <div class="wrapper">
            <h1 class="text-green-600 text-5xl center">TodoApp👋</h1>
        </div>
    </header>

    <main class="flex gap-4">
        <Register />
        <Login />
        <Todo/>
    </main>
</template>
