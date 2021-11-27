export const closeModal = (idModal) => {
    const modalOverlay = document.querySelector('.modal-backdrop')

    switch (idModal) {
        case 'ModalTaskAdd':
            const modalWindow = document.getElementById(idModal)

            modalOverlay.classList.remove('show')
            modalWindow.classList.remove('show')

            modalWindow.addEventListener('transitionend', () => {
                modalWindow.style.zIndex = -1055
            }, false)

            break;
        default:
            const modalsWindow = document.querySelectorAll('.modal')

            modalOverlay.classList.remove('show')

            for (let i = 0; i < modalsWindow.length; i++) {
                const element = modalsWindow[i];
                
                element.classList.remove('show')

                element.addEventListener('transitionend', (e) => {
                    el = e.target
                    el.style.zIndex = -1055
                }, false)
            }

            break;
    }

    setTimeout(() => {
        modalOverlay.classList.add('d-none')
    }, 500)
}