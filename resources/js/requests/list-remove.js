import axios from 'axios'

export const api_list_remove = async (payload) => {
    const url_req = '/list/remove'

    try {
        return await axios.post(url_req, payload)
    } catch (err) {
        console.error('Request List Remove', err)
    }
}