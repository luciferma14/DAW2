const API_URL = "http://localhost/kanban/tasks.php";

class TaskAPI {
    static validateTask(description, status, priority) {
        if (!description || typeof description !== "string") {
            throw new Error("La descripción debe ser texto válido.");
        }

        const validStatus = ["Some day", "To do", "In progress", "Done", "Today", "Tomorrow", "Deleted"];

        if (status && !validStatus.includes(status)) {
            throw new Error(
                `Estado inválido. Valores permitidos: ${validStatus.join(", ")}`
            );
        }

        const validPriority = ["low", "medium", "high", "top"];

        if (priority && !validPriority.includes(priority)) {
            throw new Error(
                `Prioridad inválida. Valores permitidos: ${validPriority.join(", ")}`
            );
        }
    }

    static async handleResponse(response) {
        if (!response.ok) {
            const text = await response.text();
            throw new Error(`Error HTTP ${response.status}: ${text}`);
        }

        return await response.json();
    }

    static async getTasks() {
        const res = await fetch(API_URL);
        return await this.handleResponse(res);
    }

    static async createTask(description, status = "Some day", priority = "medium") {
        this.validateTask(description, status, priority);

        const res = await fetch(API_URL, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ description, status, priority }),
        });

        return await this.handleResponse(res);
    }

    static async updateTask(id, description, status, priority) {
        this.validateTask(description, status, priority);

        const res = await fetch(`${API_URL}?id=${id}`, {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ description, status, priority }),
        });

        return await this.handleResponse(res);
    }

    static async deleteTask(id) {
        const res = await fetch(`${API_URL}?id=${id}`, { method: "DELETE" });
        return await this.handleResponse(res);
    }
}

