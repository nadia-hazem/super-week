// Path: src\Controller\public\js\home.js

const div = document.querySelector('#result')
const usersbtn = document.querySelector('#users')
const booksbtn = document.querySelector('#books')

const userIdInput = document.querySelector('#userIdInput');
const searchUserBtn = document.querySelector('#searchUserBtn');

const bookIdInput = document.querySelector('#bookIdInput');
const searchBookBtn = document.querySelector('#searchBookBtn');

// Add event listener on users button
usersbtn.addEventListener('click', async function(e) {
    e.preventDefault()
    div.innerHTML = ''
    const ufetch = await fetch('/users');
    const users = await ufetch.json();

    // create table
    let table = document.createElement('table')
    table.classList.add('table', 'table-striped', 'table-hover');
    // create header
    const headerRow = table.insertRow();
    const idHeader = headerRow.insertCell();
    idHeader.textContent = 'ID';
    const nameHeader = headerRow.insertCell();
    nameHeader.textContent = 'firstname';   
    const lastnameHeader = headerRow.insertCell();
    lastnameHeader.textContent = 'lastname';
    const emailHeader = headerRow.insertCell();
    emailHeader.textContent = 'Email';

    // read data to display in the table
    for (let i = 0; i < users.length; i++) {
        const rowData = users[i];
        console.log(rowData)

        // add a row for the data
        const row = table.insertRow();

        // add a column for the ID
        const idCell = row.insertCell();
        idCell.textContent = rowData.id;

        // add a column for the firstname
        const firstnameCell = row.insertCell();
        firstnameCell.textContent = rowData.first_name;

        // add a column for the lastname
        const lastnameCell = row.insertCell();
        lastnameCell.textContent = rowData.last_name;

        // add a column for the email
        const emailCell = row.insertCell();
        emailCell.textContent = rowData.email;
    }
    div.appendChild(table)
})

// Add event listener on books button
booksbtn.addEventListener('click', async function(e) {
    e.preventDefault()
    div.innerHTML = ''
    const bfetch = await fetch('/books');
    const books = await bfetch.json();

    // create table
    let table = document.createElement('table')
    table.classList.add('table', 'table-striped', 'table-hover');
    // create header
    const headerRow = table.insertRow();
    const idHeader = headerRow.insertCell();
    idHeader.classList.add('width-5');
    idHeader.textContent = 'ID';
    const titleHeader = headerRow.insertCell();
    idHeader.classList.add('width-30');
    titleHeader.textContent = 'Titre';
    const summaryHeader = headerRow.insertCell();
    idHeader.classList.add('width-60');
    summaryHeader.textContent = 'Résumé';
    const contributorIdHeader = headerRow.insertCell();
    idHeader.classList.add('width-5');
    contributorIdHeader.textContent = 'ID Auteur';

    // read data to display in the table
    for (let i = 0; i < books.length; i++) {
    const rowData = books[i];
    console.log(rowData)

    // add a row for the data
    const row = table.insertRow();

    // add a column for the ID
    const idCell = row.insertCell();
    idCell.textContent = rowData.id;

    // add a column for the title
    const titleCell = row.insertCell();
    titleCell.textContent = rowData.title;

    // add a column for the summary
    const summaryCell = row.insertCell();
    summaryCell.textContent = rowData.content;

    // add a column for the contributor ID
    const contributorIdCell = row.insertCell();
    contributorIdCell.textContent = rowData.id_user;
    }
    div.appendChild(table)
})

// Add event listener on search user button
searchUserBtn.addEventListener('click', async function(e) {
    e.preventDefault();
    div.innerHTML = '';

// get id from input
const userId = userIdInput.value;

//fetch user
const ufetch = await fetch(`/users/${userId}`);
const user = await ufetch.json();

// if user found, add a new row to the table with its informations
if (user) {
    let table = document.createElement('table')
    table.classList.add('table', 'table-striped', 'table-hover');
    // create header
    const headerRow = table.insertRow();
    const idHeader = headerRow.insertCell();
    idHeader.textContent = 'ID';
    const nameHeader = headerRow.insertCell();
    nameHeader.textContent = 'firstname';   
    const lastnameHeader = headerRow.insertCell();
    lastnameHeader.textContent = 'lastname';
    const emailHeader = headerRow.insertCell();
    emailHeader.textContent = 'Email';

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
    // if user not found, display an error message
    const error = document.createElement('p');
    error.textContent = 'Utilisateur introuvable';
    div.appendChild(error);
}
});

// Add event listener on search book button
searchBookBtn.addEventListener('click', async function(e) {
    e.preventDefault();
    div.innerHTML = '';

    // Get id from input
    const bookId = bookIdInput.value;

    // Fetch asked book
    const bfetch = await fetch(`/books/${bookId}`);
    const book = await bfetch.json();

    // if book found, add a new row to the table with its informations
    if (book) {
        let table = document.createElement('table')
        table.classList.add('table', 'table-striped', 'table-hover');
        // create header
        const headerRow = table.insertRow();
        const idHeader = headerRow.insertCell();
        idHeader.textContent = 'ID';
        const nameHeader = headerRow.insertCell();
        nameHeader.textContent = 'Titre';   
        const lastnameHeader = headerRow.insertCell();
        lastnameHeader.textContent = 'Résumé';
        const emailHeader = headerRow.insertCell();
        emailHeader.textContent = 'Id Auteur';

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
        // if book not found, display an error message
        const error = document.createElement('p');
        error.textContent = 'Référence introuvable';
        div.appendChild(error);
    }


})