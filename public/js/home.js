// Path: src\Controller\public\js\home.js

const div = document.querySelector('#result')
const usersbtn = document.querySelector('#users')
const booksbtn = document.querySelector('#books')

const userIdInput = document.querySelector('#userIdInput');
const searchUserBtn = document.querySelector('#searchUserBtn');

const bookIdInput = document.querySelector('#bookIdInput');
const searchBookBtn = document.querySelector('#searchBookBtn');

usersbtn.addEventListener('click', async function(e) {
    e.preventDefault()
    div.innerHTML = ''
    const ufetch = await fetch('/users');
    const users = await ufetch.json();

    // créer la table
    let table = document.createElement('table')
    // créer le header
    const headerRow = table.insertRow();
    const idHeader = headerRow.insertCell();
    idHeader.textContent = 'ID';
    const nameHeader = headerRow.insertCell();
    nameHeader.textContent = 'firstname';   
    const lastnameHeader = headerRow.insertCell();
    lastnameHeader.textContent = 'lastname';
    const emailHeader = headerRow.insertCell();
    emailHeader.textContent = 'Email';

    // Parcours des données à afficher dans le tableau
    for (let i = 0; i < users.length; i++) {
        const rowData = users[i];
        console.log(rowData)

        // Ajout d'une ligne pour les données
        const row = table.insertRow();

        // Ajout de la colonne ID
        const idCell = row.insertCell();
        idCell.textContent = rowData.id;

        // Ajout de la colonne Firstname
        const firstnameCell = row.insertCell();
        firstnameCell.textContent = rowData.first_name;

        // Ajout de la colonne Lastname
        const lastnameCell = row.insertCell();
        lastnameCell.textContent = rowData.last_name;

        // Ajout de la colonne Email
        const emailCell = row.insertCell();
        emailCell.textContent = rowData.email;
    }
    div.appendChild(table)

})

booksbtn.addEventListener('click', async function(e) {
    e.preventDefault()
    div.innerHTML = ''
    const bfetch = await fetch('/books');
    const books = await bfetch.json();

    // créer la table
    let table = document.createElement('table')
    // créer le header
    const headerRow = table.insertRow();
    const idHeader = headerRow.insertCell();
    idHeader.textContent = 'ID';
    const titleHeader = headerRow.insertCell();
    titleHeader.textContent = 'Titre';
    const summaryHeader = headerRow.insertCell();
    summaryHeader.textContent = 'Résumé';
    const contributorIdHeader = headerRow.insertCell();
    contributorIdHeader.textContent = 'ID contributeur';

    // Parcours des données à afficher dans le tableau
    for (let i = 0; i < books.length; i++) {
    const rowData = books[i];
    console.log(rowData)

    // Ajout d'une ligne pour les données
    const row = table.insertRow();

    // Ajout de la colonne ID
    const idCell = row.insertCell();
    idCell.textContent = rowData.id;

    // Ajout de la colonne Titre
    const titleCell = row.insertCell();
    titleCell.textContent = rowData.title;

    // Ajout de la colonne Résumé
    const summaryCell = row.insertCell();
    summaryCell.textContent = rowData.content;

    // Ajout de la colonne ID contributeur
    const contributorIdCell = row.insertCell();
    contributorIdCell.textContent = rowData.id_user;
    }
    div.appendChild(table)

})


// Ajouter un écouteur d'événements au bouton de recherche d'utilisateur
searchUserBtn.addEventListener('click', async function(e) {
    e.preventDefault();
    div.innerHTML = '';

// Récupérer l'ID entré par l'utilisateur
const userId = userIdInput.value;

// Faire une requête pour récupérer l'utilisateur correspondant à l'ID entré
const ufetch = await fetch(`/users/${userId}`);
const user = await ufetch.json();

// Si l'utilisateur est trouvé, ajouter une nouvelle ligne à la table avec ses informations
if (user) {
    let table = document.createElement('table')
    const row = table.insertRow();
    const idCell = row.insertCell();
    idCell.textContent = user.id;
    const firstnameCell = row.insertCell();
    firstnameCell.textContent = user.first_name;
    const lastnameCell = row.insertCell();
    lastnameCell.textContent = user.last_name;
    const emailCell = row.insertCell();
    emailCell.textContent = user.email;
    div.appendChild(table);
} else {
    // Si l'utilisateur n'est pas trouvé, afficher un message d'erreur
    const error = document.createElement('p');
    error.textContent = 'Utilisateur introuvable';
    div.appendChild(error);
}
});

searchBookBtn.addEventListener('click', async function(e) {
    e.preventDefault();
    div.innerHTML = '';

    // Récupérer l'ID entré par l'utilisateur
    const bookId = bookIdInput.value;

    // Faire une requête pour récupérer l'utilisateur correspondant à l'ID entré
    const bfetch = await fetch(`/books/${bookId}`);
    const book = await bfetch.json();

    // Si l'utilisateur est trouvé, ajouter une nouvelle ligne à la table avec ses informations
    if (book) {
        let table = document.createElement('table')
        const row = table.insertRow();
        const idCell = row.insertCell();
        idCell.textContent = book.id;
        const firstnameCell = row.insertCell();
        firstnameCell.textContent = book.title;
        const lastnameCell = row.insertCell();
        lastnameCell.textContent = book.content;
        const emailCell = row.insertCell();
        emailCell.textContent = book.id_user;
        div.appendChild(table);
    } else {
        // Si aucun livre n'est trouvé, afficher un message d'erreur
        const error = document.createElement('p');
        error.textContent = 'Référence introuvable';
        div.appendChild(error);
    }


})