function showNewConversation() {
    document.getElementById("new-conversation").style.display = "block";
    document.getElementById("existing-conversation").style.display = "none";
    document.getElementById("chat").style.display = "none";
}

function showExistingConversation() {
    document.getElementById("existing-conversation").style.display = "block";
    document.getElementById("new-conversation").style.display = "none";
    document.getElementById("chat").style.display = "none";
}

function createConversation() {
    const password = document.getElementById("new-password").value;
    fetch('../backend/api/chat_api.php', {
        method: 'POST',
        body: JSON.stringify({ action: 'create', password }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("new-code").innerText = "Código: " + data.code;
    });
}

function accessConversation() {
    const code = document.getElementById("existing-code").value;
    const password = document.getElementById("existing-password").value;
    fetch('../backend/api/chat_api.php', {
        method: 'POST',
        body: JSON.stringify({ action: 'access', code, password }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            document.getElementById("chat").style.display = "block";
            loadMessages(code);
        } else alert("Código o contraseña incorrectos");
    });
}

function sendMessage() {
    const code = document.getElementById("existing-code").value;
    const message = document.getElementById("message-input").value;
    const file = document.getElementById("file-input").files[0];
    const formData = new FormData();
    formData.append("action", "send");
    formData.append("code", code);
    formData.append("message", message);
    if(file) formData.append("file", file);

    fetch('../backend/api/chat_api.php', {
        method: 'POST',
        body: formData
    }).then(() => {
        document.getElementById("message-input").value = "";
        loadMessages(code);
    });
}

function loadMessages(code) {
    fetch(`../backend/api/chat_api.php`, {
        method: 'POST',
        body: JSON.stringify({ action: 'get', code }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(res => res.json())
    .then(data => {
        const messagesDiv = document.getElementById("messages");
        messagesDiv.innerHTML = "";
        data.messages.forEach(m => {
            const p = document.createElement("p");
            p.textContent = `[${m.created_at}] ${m.content}`;
            messagesDiv.appendChild(p);
        });
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    });
}
