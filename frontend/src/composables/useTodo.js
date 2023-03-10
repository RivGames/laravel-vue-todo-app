import axios from "axios";
import {ref} from "vue";

// axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
export default function useTodo(){
    const errors = ref({});
    const todos = ref([]);
    const create = async (data) => {
        try {
            await axios.post('http://localhost:8000/api/V1/todos/',data,{
                headers:{
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            });
        }catch (error){
            errors.value = error.data;
        }
    }
    const read = async () => {
        try {
            const response = await axios.get('http://localhost:8000/api/V1/todos/',{headers:
                    {Authorization: `Bearer ${localStorage.getItem('token')}`}
            })
            todos.value = response.data.data;
        }catch(error){
            errors.value = error.data;
        }
    };
    return{
        todos,
        read,
        create
    }
}
