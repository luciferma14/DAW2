# **Chat Anónimo para Denuncias de Acoso**

**Descripción:**
Este proyecto es una **aplicación web de chat anónimo** destinada a la realización de denuncias de acoso en entornos educativos, laborales y digitales. Permite a los usuarios mantener conversaciones seguras y anónimas con un equipo administrador sin temor a represalias. El sistema utiliza tecnologías web full-stack, bases de datos MySQL, Docker, y modelos de inteligencia artificial para analizar el contenido de los mensajes.

---

## **Índice**

1. [Tecnologías utilizadas](#tecnologías-utilizadas)
2. [Requisitos](#requisitos)
3. [Estructura del Proyecto](#estructura-del-proyecto)
4. [Instrucciones de instalación y ejecución](#instrucciones-de-instalación-y-ejecución)
5. [Base de Datos](#base-de-datos)
6. [Funcionamiento](#funcionamiento)
7. [Seguridad](#seguridad)
8. [Documentación](#documentación)
9. [Posibles Mejoras](#posibles-mejoras)

---

## **Tecnologías utilizadas**

* **Frontend:**

  * HTML5
  * CSS3
  * JavaScript (ES6+)
* **Backend:**

  * PHP
* **Base de Datos:**

  * MySQL
* **Inteligencia Artificial:**

  * Python (con bibliotecas de procesamiento de lenguaje natural)
* **Contenerización y despliegue:**

  * Docker y Docker Compose
* **Control de versiones:**

  * Git

---

## **Requisitos**

Para poder ejecutar este proyecto, asegúrate de tener instalados los siguientes programas:

* **Docker**: [Descargar Docker](https://www.docker.com/get-started).
* **Docker Compose**: Viene incluido con Docker Desktop.
* **Git**: [Descargar Git](https://git-scm.com/).

---

## **Estructura del Proyecto**

La estructura del proyecto es la siguiente:

```
/chat-denuncias
│
├─ /frontend
│   ├─ /css
│   │    └─ style.css
│   ├─ /js
│   │    └─ script.js
│   └─ index.html
│
├─ /backend
│   ├─ /config
│   │    └─ database.php
│   ├─ /controllers
│   │    ├─ ChatController.php
│   │    └─ AdminController.php
│   ├─ /models
│   │    ├─ Conversation.php
│   │    ├─ Message.php
│   │    └─ User.php
│   └─ /api
│        ├─ chat_api.php
│        └─ admin_api.php
│
├─ /python-ia
│   ├─ spam_detector.py
│   └─ language_filter.py
│
├─ /sql
│   └─ database.sql
│
├─ /docker
│   ├─ Dockerfile
│   └─ docker-compose.yml
│
└─ README.md
```

---

## **Instrucciones de instalación y ejecución**

1. **Clonar el repositorio** (si es necesario):

   ```bash
   git clone <url_del_repositorio>
   cd chat-denuncias
   ```

2. **Construir y ejecutar el entorno con Docker**:

   En la raíz del proyecto, ejecuta:

   ```bash
   docker-compose up --build
   ```

   Esto descargará e instalará todas las dependencias, configurará la base de datos, y levantará los contenedores necesarios (frontend, backend y MySQL).

3. **Acceder al sistema**:

   Una vez que Docker haya terminado de construir el entorno, abre tu navegador y dirígete a:

   ```
   http://localhost:8080
   ```

   Esto te llevará a la página principal del chat, donde podrás:

   * Crear una nueva conversación anónima.
   * Continuar una conversación existente.

---

## **Base de Datos**

El proyecto utiliza una base de datos MySQL que se gestiona a través de un contenedor de Docker. La estructura de las tablas es la siguiente:

* **conversaciones**: Guarda la información sobre cada conversación (código, contraseña, estado, etc.).
* **mensajes**: Almacena los mensajes enviados en cada conversación.
* **archivos** (opcional): Guarda los archivos adjuntos enviados en las conversaciones.

La base de datos se inicializa al arrancar el proyecto con Docker.

Para más detalles sobre la estructura de las tablas, consulta el archivo `sql/database.sql`.

---

## **Funcionamiento**

### **Usuarios Anónimos:**

1. **Crear una nueva conversación**:
   Los usuarios pueden crear una nueva conversación proporcionando una contraseña. El sistema generará un código único para esa conversación.

2. **Acceder a una conversación existente**:
   Los usuarios pueden continuar una conversación existente proporcionando el código de la conversación y la contraseña asociada.

3. **Enviar mensajes**:
   Los usuarios pueden enviar mensajes de texto y adjuntar archivos (con limitaciones de tamaño y tipo).

### **Administrador:**

El administrador puede acceder a un panel de control desde el backend para gestionar las conversaciones:

* **Ver todas las conversaciones** (activas y cerradas).
* **Leer los mensajes** asociados a cada conversación.
* **Cambiar el estado** de las conversaciones (abierta, en revisión, resuelta, cerrada).

### **Inteligencia Artificial:**

Los mensajes enviados son analizados automáticamente mediante **modelos de IA** para:

* **Detectar spam**.
* **Filtrar lenguaje ofensivo o malsonante**.

---

## **Seguridad**

Este proyecto está diseñado para garantizar el **anonimato total** de los usuarios, siguiendo las mejores prácticas de seguridad:

* **Contraseñas cifradas**: Las contraseñas de los usuarios se almacenan como hashes para evitar filtraciones.
* **Protección contra accesos no autorizados**: El acceso a las conversaciones está restringido mediante códigos y contraseñas.
* **No almacenamiento de información personal sensible**: No se almacenan direcciones IP ni otros datos identificativos de los usuarios.

---

## **Documentación**

En la documentación técnica se incluirán los siguientes apartados:

* Introducción y justificación del proyecto
* Análisis de requisitos y casos de uso
* Diseño de la base de datos
* Arquitectura del sistema
* Integración de IA
* Uso de Git y control de versiones
* Despliegue con Docker
* Manual de usuario y administrador
* Conclusiones y posibles mejoras

---

## **Posibles Mejoras**

Algunas de las posibles mejoras que se pueden implementar en futuras versiones del proyecto son:

1. **Autenticación para administradores**: Agregar un sistema de login para los administradores, para mejorar la seguridad.
2. **Mejoras en el análisis de IA**: Entrenar modelos más avanzados para detectar patrones de lenguaje más complejos.
3. **Optimización en la gestión de archivos**: Mejorar el manejo de archivos adjuntos, incluyendo una gestión más eficiente de su almacenamiento.
