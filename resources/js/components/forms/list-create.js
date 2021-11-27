import { $api } from '../../requests/index'

export let list_create = async (form) => {
    const formData = new FormData(form)
    const response = await $api.list_create(formData)
    const data = response.data

    if (data.status === 'success') {
        window.location.reload()
    } else {
        alert(data.message)
    }
}