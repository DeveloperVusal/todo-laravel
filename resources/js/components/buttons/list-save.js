import { $api } from '../../requests/index'

export const list_save = () => {
    const btns = document.querySelectorAll('button[name=btn-ed-list]')

    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', async function(evt) {
            let el = evt.target

            if (el.tagName.toLowerCase() != 'button') {
                el = el.closest('button[name=btn-ed-list]')
            }

            const elNavLink = el.parentNode.previousElementSibling
            const name = prompt('Название списка', elNavLink.innerText)
            let attrId = el.getAttribute('id')

            attrId = parseInt(attrId.split('-')[2])

            if (attrId) {
                const formData = {
                    id: attrId,
                    name: name
                }
                const response = await $api.list_save(formData)
                const data = response.data

                if (data.status === 'success') {
                    window.location.reload()
                } else {
                    alert(data.message)
                }
            }
        })
    }
}