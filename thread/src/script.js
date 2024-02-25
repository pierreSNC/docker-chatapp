const apiURL = 'http://localhost:8080/messages';

function fetchMessages() {
    fetch(apiURL)
        .then(response => response.json())
        .then(messages => {
            const chatroom = document.getElementById('chatroom');
            chatroom.innerHTML = ''; // Effacer les anciens messages

            if (messages.length === 0) {
                const emptyMessageElement = document.createElement('div');
                emptyMessageElement.classList.add('empty-message');
                emptyMessageElement.textContent = 'Aucun message pour le moment.';
                chatroom.appendChild(emptyMessageElement);
            } else {
                messages.forEach(message => {
                    const messageElement = document.createElement('a');
                    messageElement.classList.add('list-group-item', 'list-group-item-action');
                    messageElement.innerHTML = `<strong>${message.pseudo}</strong>: ${message.message}`;
                    chatroom.appendChild(messageElement);
                });
            }
        })
        .catch(error => console.error(error));
}

document.addEventListener('DOMContentLoaded', function() {
    fetchMessages();
});
