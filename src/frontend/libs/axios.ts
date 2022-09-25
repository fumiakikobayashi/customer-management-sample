import Axios from 'axios'

const axios = Axios.create({
    baseURL: process.env.API_URL,
    headers: {
        'Content-Type': 'application/json; charset=utf8',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
    },
    withCredentials: true,
})

export default axios
