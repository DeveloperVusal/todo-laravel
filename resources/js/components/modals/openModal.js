import { TaskAdd } from './ModalTaskAdd'

function hideTooltips() {
    const allElments = document.getElementsByTagName('*')
    const tooltips = []

    for (let i = 0; i < allElments.length; i++) {
        const element = allElments[i]

        if (element.getAttribute('data-bs-toggle') != null) tooltips.push(element)
    }

    for (let i = 0; i < tooltips.length; i++) {
        const tooltip = tooltips[i]
        
        tooltip.blur()
    }
}

export const openModal = (idModal) => {
    const modalWindow = document.getElementById(idModal)
    const modalOverlay = document.querySelector('.modal-backdrop')

    hideTooltips()

    switch (idModal) {
        case 'ModalTaskAdd':
            TaskAdd(modalWindow, modalOverlay)

            break;
    }
}