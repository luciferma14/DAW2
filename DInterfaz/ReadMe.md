# Preguntas examen

- cual es la diferencia entre grid layout y flexbox, menciona al menos alguna similitud
- crea la plantilla para el diseño mostrado usando grid template-rows y grid template-colums. Escribelo de nuevo esta vez usando la propiedad abreviada de grid
- tipo test 
- escribe una regla de estilo que agrege 1em de espacio entre las columnas de un contedor de grid llamado #gallery 
- relaciona las tareas con las declaciones
    - justify-self??
    - aling items??
    - justify items-center??

# Respuestas 

## 1️⃣ Diferencia entre **Grid Layout** y **Flexbox** (y una similitud)

**Diferencia principal:**

* **Flexbox** es un sistema de diseño **unidimensional**: trabaja **en una sola dirección** a la vez
  → fila **o** columna.
* **Grid Layout** es un sistema **bidimensional**: trabaja **en filas y columnas al mismo tiempo**.

👉 En resumen:

* Flexbox: ideal para **alinear elementos en línea** (menús, botones, cards en fila).
* Grid: ideal para **estructuras completas de página** (header, sidebar, main, footer).

**Similitud:**

* Ambos sirven para **crear layouts responsive**.
* Ambos permiten **alinear y distribuir elementos fácilmente** (justify, align, gap…).
* Ambos funcionan con contenedores y elementos hijos.

---

## 2️⃣ Plantilla usando `grid-template-rows` y `grid-template-columns`

👉 Como no has pasado el dibujo exacto, te pongo **el ejemplo típico de examen**
(header, sidebar, main y footer):

### Versión normal

```css
.container {
  display: grid;
  grid-template-columns: 200px 1fr;
  grid-template-rows: 100px 1fr 80px;
}
```

---

### Misma plantilla usando la propiedad abreviada `grid`

```css
.container {
  display: grid;
  grid: 100px 1fr 80px / 200px 1fr;
}
```

📌 **Orden importante** en `grid`:

```
grid: filas / columnas
```

---

## 3️⃣ Tipo test (probables preguntas y respuestas)

Como no te dio tiempo a copiarlo, estas son **las más típicas que caen siempre** 👀

✔️ **¿Cuál de estas propiedades convierte un contenedor en grid?**

* ❌ `display: flex`
* ✅ `display: grid`
* ❌ `position: grid`

✔️ **¿Qué propiedad define el espacio entre filas y columnas en grid?**

* ❌ `margin`
* ❌ `padding`
* ✅ `gap`

✔️ **¿Flexbox trabaja en cuántas dimensiones?**

* ❌ Dos
* ✅ Una

✔️ **¿Qué unidad se usa mucho en grid para repartir espacio?**

* ❌ `px`
* ❌ `%`
* ✅ `fr`

---

## 4️⃣ Regla de estilo: 1em entre columnas en `#gallery`

```css
#gallery {
  column-gap: 1em;
}
```

💡 También sería válido:

```css
#gallery {
  gap: 1em;
}
```

(si no te especifican solo columnas)

---

## 5️⃣ Relaciona las tareas con las declaraciones

Vamos una por una 👇

### 🔹 `justify-self`

👉 **Alinea un elemento individual** en el eje horizontal **dentro de su celda**

Ejemplo:

```css
.item {
  justify-self: center;
}
```

---

### 🔹 `align-items`

👉 **Alinea TODOS los elementos hijos** en el eje vertical **del contenedor**

Ejemplo:

```css
.container {
  align-items: center;
}
```

---

### 🔹 `justify-content: center`

👉 **Alinea el conjunto de elementos** dentro del contenedor en el eje horizontal

Ejemplo:

```css
.container {
  justify-content: center;
}
```

📌 OJO:

* `justify-items` → elementos
* `justify-content` → el grupo entero

---

## 🧠 Resumen rápido para memorizar

* **Grid = 2D**, **Flex = 1D**
* `gap` → espacio
* `fr` → repartir espacio
* `justify-self` → un elemento
* `align-items` → todos los hijos
* `justify-content` → el conjunto

Si quieres, dime:
👉 **si el profe suele ser muy tiquismiquis**
👉 **o si quieres un chuletario ultra corto para repasar justo antes del examen** 😄
