import { $api } from '../../requests/index'
import { $func } from '../../func/index'

export let task_add = async (form) => {
    const formData = new FormData(form)
    const parse_url = $func.parse_url(window.location.href)
    const $get = $func.parse_query(parse_url.query)
    const alert = form.querySelector('.alert-danger')

    alert.classList.add('d-none')

    if ($get.hasOwnProperty('list') && parseInt($get['list'])) {
        formData.append('list_id', parseInt($get['list']))

        const response = await $api.task_add(formData)
        const data = response.data

        console.log(data)

        if (data.status === 'success') {
            window.location.reload()
        } else {
            alert.innerHTML = ''

            if (data.status === 'error') {
                if (data.code === 0) {
                    const errors = data.errors
                    let html = ''

                    for (let key in errors) {
                        if (key != 'list_id') html += '<li>' + errors[key][0] + '</li>'
                    }
                    
                    alert.classList.remove('d-none')
                    alert.innerHTML = html
                } else {
                    alert.classList.remove('d-none')
                    alert.innerHTML = '<li>Произошла неизвестная ошибка, повторите попытку позднее!</li>'
                }
            }
        }
    } else {
        alert('Выберите список, чтобы добавить задачу!')
    }
}