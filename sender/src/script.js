document.getElementById('message-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const pseudo = document.getElementById('pseudo').value;
    const message = document.getElementById('message').value;
    const apiURL = 'http://localhost:8080/messages';

    fetch(apiURL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ pseudo, message })
    })
        .then(response => response.json())
        .then(data => {
            // Afficher le message de confirmation
            const messageStatus = document.getElementById('message-status');
            messageStatus.textContent = 'Message envoyé';
            messageStatus.classList.add('alert-success');
            messageStatus.style.display = 'block';

            // Réinitialiser le formulaire
            document.getElementById('message-form').reset();
        })
        .catch(error => {
            // Afficher le message d'erreur
            const messageStatus = document.getElementById('message-status');
            messageStatus.textContent = 'Erreur lors de l\'envoi du message';
            messageStatus.classList.add('alert-danger');
            messageStatus.style.display = 'block';
            console.error('Erreur:', error);
        });
});
