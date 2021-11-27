import { $api } from '../../requests/index'
import { $func } from '../../func/index'

export const list_remove = () => {
    const btns = document.querySelectorAll('button[name=btn-rm-list]')

    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', async function(evt) {
            let el = evt.target

            if (el.tagName.toLowerCase() != 'button') {
                el = el.closest('button[name=btn-rm-list]')
            }

            let attrId = el.getAttribute('id')

            attrId = parseInt(attrId.split('-')[2])

            if (attrId) {
                const formData = {
                    id: attrId
                }
                const response = await $api.list_remove(formData)
                const data = response.data

                if (data.status === 'success') {
                    const parse_url = $func.parse_url(window.location.href)

                    window.location.href = parse_url.scheme + parse_url.host + ((parse_url.port) ? ':' + parse_url.port : '') + parse_url.path
                } else {
                    alert(data.message)
                }
            }
        })
    }
}