document.addEventListener('DOMContentLoaded', function () {
    fetch('/lista-favoritos')
        .then(response => response.json())
        .then(data => {
            const listContainer = document.querySelector('#user-s-list');
            listContainer.innerHTML = '';

            if (data.length === 0) {
                listContainer.innerHTML = '<li>NO TIENES PELÍCULAS FAVORITAS.</li>';
            } else {
                data.forEach(link => {
                    const listItem = document.createElement('li');
                    listItem.classList.add('manga-item');
                
                    const boxContainer = document.createElement('div');
                    boxContainer.classList.add('manga-box');
                
                    const titleElement = document.createElement('span');
                    titleElement.textContent = link.title;
                
                    const linkElement = document.createElement('a');
                    linkElement.href = link.url;
                    linkElement.textContent = "VER";
                    
                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Eliminar de mi lista';
                    deleteButton.classList.add('delete-button');
                    deleteButton.setAttribute('data-id', link.id);
                
                    boxContainer.appendChild(titleElement);
                    boxContainer.appendChild(linkElement);
                    boxContainer.appendChild(deleteButton);
                    
                    listItem.appendChild(boxContainer);
                    listContainer.appendChild(listItem);
                });
            }

            listContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('delete-button')) {
                    const mangaId = event.target.getAttribute('data-id');
                    const csrfToken = document.querySelector('meta[name="csrf-token"]');
                    if (csrfToken) {
                        fetch(`/eliminar-manga/${mangaId}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                event.target.closest('li').remove();
                                console.log('PELÍCULA ELIMINADA DE FAVORITOS');
                            } else {
                                console.error('Error al eliminar PELÍCULA:', data.message);
                            }
                        })
                        .catch(error => console.error('Hubo un error en la solicitud:', error));
                    } else {
                        console.error('Token CSRF no encontrado');
                    }
                }
            });
        })
        .catch(error => {
            console.error('Hubo un problema con la operación de fetch:', error);
        });
});
