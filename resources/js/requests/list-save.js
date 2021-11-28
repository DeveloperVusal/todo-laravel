import axios from 'axios'

export const api_list_save = async (payload) => {
    const url_req = '/list/save'

    try {
        return await axios.post(url_req, payload)
    } catch (err) {
        console.error('Request List Save', err)
    }
}