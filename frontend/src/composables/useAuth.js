import axios from "axios";
import {ref} from "vue";

axios.defaults.baseURL = ('http://localhost:8000/api/V1')

export default function useAuth() {
    const isLoggedIn = ref({});
    const errors = ref({});
    const register = async (data) => {
        try {
            const json = await axios.post('/register', data);
            localStorage.setItem('token', json.data.authorisation.token)
            isLoggedIn.value = true
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
                console.log(errors.value.name)
            }
        }
    }
    const login = async (data) => {
        try {
            await axios.post('/login', data);
            isLoggedIn.value = true
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }
    return {
        register,
        login,
        errors,
        isLoggedIn
    }
}
