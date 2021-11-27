import axios from 'axios'

export const api_list_create = async (payload) => {
    const url_req = '/list/create'

    try {
        return await axios.post(url_req, payload)
    } catch (err) {
        console.error('Request List Create', err)
    }
}