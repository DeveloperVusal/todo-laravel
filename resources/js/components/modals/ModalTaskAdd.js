import { $func } from '../../func/index'

export const TaskAdd = (modal, overlay) => {
    const request_uri = window.location.href
    const parse_url = $func.parse_url(request_uri)
    const $get = $func.parse_query(parse_url.query)

    if ($get.hasOwnProperty('list') && parseInt($get['list'])) {
        overlay.classList.remove('d-none')
        overlay.classList.add('show')

        modal.classList.add('show')

        modal.addEventListener('transitionend', () => {
            modal.style.zIndex = 1055
        }, false)
    } else {
        alert('Выберите список, чтобы добавить задачу!')
    }
}