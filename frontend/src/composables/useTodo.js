import axios from "axios";
import {ref} from "vue";

// axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
export default function useTodo(){
    const errors = ref({});
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
    return{
        create
    }
}
