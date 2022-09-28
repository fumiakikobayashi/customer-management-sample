import Axios from 'axios'

const axios = Axios.create({
    baseURL: process.env.NEXT_PUBLIC_API_URL,
    responseType: 'json',
    withCredentials: true,
    headers: {
        'Content-Type': 'application/json;',
    },
})

export default axios
