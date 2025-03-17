<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">User Management</h1>
        <div class="form-group">
            <input type="text" id="userName" class="form-control" placeholder="Add User">
            <button class="btn btn-primary mt-2" onclick="addUser()">Add User</button>
        </div>
        <ul id="userList" class="list-group"></ul>
    </div>

    <script>
        const apiUrl = 'https://67d786a99d5e3a10152b079e.mockapi.io/api/v1/users';

        async function fetchUsers() {
            const response = await fetch(apiUrl);
            const users = await response.json();
            const userList = document.getElementById('userList');
            userList.innerHTML = '';
            users.forEach(user => {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                li.innerHTML = `
                    <span>${user.name}</span>
                    <div>
                        <input type="text" class="form-control d-inline w-50" value="${user.name}" id="edit-${user.id}">
                        <button class="btn btn-sm btn-warning" onclick="editUser(${user.id})">Edit</button>
                        <button class="btn btn-sm btn-danger ml-2" onclick="deleteUser(${user.id})">Delete</button>
                    </div>
                `;
                userList.appendChild(li);
            });
        }

        async function addUser() {
            const name = document.getElementById('userName').value;
            if (!name) return alert('Please enter a name.');

            await fetch(apiUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ name })
            });

            document.getElementById('userName').value = '';
            fetchUsers();
        }

        async function editUser(id) {
            const newName = document.getElementById(`edit-${id}`).value;

            await fetch(`${apiUrl}/${id}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ name: newName })
            });

            fetchUsers();
        }

        async function deleteUser(id) {
            await fetch(`${apiUrl}/${id}`, {
                method: 'DELETE'
            });

            fetchUsers();
        }

        document.addEventListener('DOMContentLoaded', fetchUsers);
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
