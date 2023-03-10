<script setup>
import TodoCreate from "@/components/Todo/TodoCreate.vue";
import useTodo from "@/composables/useTodo";
import {ref} from "vue";
const {create} = useTodo()
const dataFromChild = ref('')
const handleData = (data) => {
    dataFromChild.value = data
}
</script>
<template>
    <form @submit.prevent="create(dataFromChild)">
        <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
            <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                <div class="mb-4">
                    <h1 class="text-grey-darkest">Todo List</h1>
                    <TodoCreate @data-passed="handleData" />
                </div>
                <div>
                    <div class="flex mb-4 items-center">
                        <p class="w-full text-grey-darkest">Add another component to Tailwind Components</p>
                        <button
                            class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green">
                            Done
                        </button>
                        <button
                            class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">
                            Remove
                        </button>
                    </div>
                    <div class="flex mb-4 items-center">
                        <p class="w-full line-through text-green">Submit Todo App Component to Tailwind Components</p>
                        <button
                            class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-grey border-grey hover:bg-grey">
                            Not Done
                        </button>
                        <button
                            class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">
                            Remove
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
