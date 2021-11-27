import axios from 'axios'

export const api_task_add = async (payload) => {
    const url_req = '/task/add'

    try {
        return await axios.post(url_req, payload)
    } catch (err) {
        console.error('Request Task Add', err)
    }
}