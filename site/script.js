document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector('.car-list .container');
    const carItems = Array.from(document.querySelectorAll('.car-item'));
    const containerWidth = container.offsetWidth; // Largura do container
    const carItemWidth = containerWidth * 0.3; // Largura dos car-items exceto o central
    const centralCarItemWidth = 500; // Largura do car-item central
    const numItems = carItems.length;
    let currentIndex = 0;

    function moveCarItems() {
        currentIndex = (currentIndex + 1) % numItems;

        // Remover classes antigas de todos os car-items
        carItems.forEach(item => {
            item.classList.remove('central');
            item.style.width = carItemWidth + 'px'; // Restaura a largura padrão para os car-items exceto o central
        });

        // Adicionar classe e ajustar largura para o car-item central
        const centralIndex = (currentIndex + Math.floor(numItems / 2)) % numItems;
        carItems[centralIndex].classList.add('central');
        carItems[centralIndex].style.width = centralCarItemWidth + 'px';

        // Mover car-items
        for (let i = 0; i < numItems; i++) {
            container.appendChild(carItems[(currentIndex + i) % numItems]);
        }
    }

    setInterval(moveCarItems, 2000); // Move a cada 10 segundos
});

function abrirModal() {
    const modal = document.getElementById('janela-modal')
    modal.classList.add('abrir')

    modal.addEventListener('click', (e) => {
        if(e.target.id == 'fechar' || e.target.id == 'janela-modal') {
            modal.classList.remove('abrir')
        }
    })
}