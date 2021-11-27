import axios from 'axios'

export const api_task_completed = async (payload) => {
    const url_req = '/task/completed'

    try {
        return await axios.post(url_req, payload)
    } catch (err) {
        console.error('Request Task Completed', err)
    }
}