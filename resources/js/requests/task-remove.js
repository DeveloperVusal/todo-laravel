import axios from 'axios'

export const api_task_remove = async (payload) => {
    const url_req = '/task/remove'

    try {
        return await axios.post(url_req, payload)
    } catch (err) {
        console.error('Request Task Remove', err)
    }
}