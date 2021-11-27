import { $api } from '../../requests/index'

export const task_remove = () => {
    const btns = document.querySelectorAll('button[name=btn-rm-task]')

    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', async function(evt) {
            let el = evt.target

            if (el.tagName.toLowerCase() != 'button') {
                el = el.closest('button[name=btn-rm-task]')
            }

            let attrId = el.getAttribute('id')

            attrId = parseInt(attrId.split('-')[2])

            if (attrId) {
                const formData = {
                    id: attrId
                }
                const response = await $api.task_remove(formData)
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