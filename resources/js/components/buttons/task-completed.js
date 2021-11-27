import { $api } from '../../requests/index'

export const task_completed = () => {
    const btns = document.querySelectorAll('button[name=btn-cp-task]')

    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', async function(evt) {
            let el = evt.target

            if (el.tagName.toLowerCase() != 'button') {
                el = el.closest('button[name=btn-cp-task]')
            }

            let attrId = el.getAttribute('id')

            attrId = parseInt(attrId.split('-')[2])

            if (attrId) {
                const formData = {
                    id: attrId
                }
                const response = await $api.task_completed(formData)
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