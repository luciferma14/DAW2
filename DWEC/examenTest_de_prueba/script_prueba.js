// Array de datos del examen (40 PREGUNTAS ACTUALIZADAS CON GENERATORS/ITERATORS Y SIN ASÍNCRONO/DOM)
const quizData = [
    // --- 1. JS Basics & Variables (var, let, const) ---
    {
        q: "¿Qué palabra clave de declaración de variable tiene alcance de **bloque** (block scope) y permite que su valor sea reasignado?",
        options: ["var", "const", "let", "local"],
        correctIndex: 2
    },
    {
        q: "¿Cuál es el resultado del operador `typeof` aplicado a un array en JavaScript (ej: `typeof [1, 2, 3]`)?",
        options: ["\"array\"", "\"object\"", "\"list\"", "\"undefined\""],
        correctIndex: 1
    },
    {
        q: "¿Qué operador realiza una comparación de **igualdad estricta** (compara valor y tipo sin coerción)?",
        options: ["==", "!==", "===", "="],
        correctIndex: 2
    },
    {
        q: "¿Qué se considera un valor **falsy** en JavaScript?",
        options: ["\"0\"", "\"false\"", "1", "null"],
        correctIndex: 3
    },
    // --- 2. Strings, Numbers, Dates y Type Coercion ---
    {
        q: "¿Qué método se utiliza para obtener la **longitud** de una cadena de texto?",
        options: ["getLength()", "size", "length", "count()"],
        correctIndex: 2
    },
    {
        q: "¿Cuál es la forma correcta de **redondear** un número al entero más cercano?",
        options: ["Math.ceil(x)", "Math.floor(x)", "Math.round(x)", "Math.random(x)"],
        correctIndex: 2
    },
    {
        q: "¿Cuál de estos métodos del objeto `Date` devuelve el **año completo** de cuatro dígitos?",
        options: ["getYear()", "getFullYear()", "getDate()", "getUTCFullYear()"],
        correctIndex: 1
    },
    {
        q: "¿Qué valor devuelve la expresión `\"10\" + 5` en JavaScript (coerción de tipos)?",
        options: ["15", "105", "NaN", "Error"],
        correctIndex: 1
    },
    // --- 3. Arrays y Métodos Fundamentales ---
    {
        q: "¿Qué método de array se utiliza para **eliminar el último elemento** y devuelve ese elemento eliminado?",
        options: ["shift()", "unshift()", "pop()", "push()"],
        correctIndex: 2
    },
    {
        q: "¿Qué método de array crea un **nuevo array** con los resultados de llamar a una función para cada elemento?",
        options: ["filter()", "forEach()", "map()", "reduce()"],
        correctIndex: 2
    },
    {
        q: "¿Cuál es el propósito del método `Array.splice(start, deleteCount, item1, ...)`?",
        options: ["Ordena el array.", "Agrega elementos al final.", "Crea un nuevo array a partir de un fragmento del original.", "Agrega/elimina elementos en cualquier posición, modificando el array original."],
        correctIndex: 3
    },
    {
        q: "¿Qué método devuelve `true` si **todos** los elementos de un array pasan una prueba implementada por una función?",
        options: ["some()", "every()", "find()", "includes()"],
        correctIndex: 1
    },
    // --- 4. Objetos y JSON ---
    {
        q: "¿Para acceder a una propiedad de objeto cuyo nombre se almacena en una variable `propiedad` (ej: `propiedad = \"nombre\"`), ¿qué notación se debe usar?",
        options: ["objeto.propiedad", "objeto(\"propiedad\")", "objeto[propiedad]", "objeto::propiedad"],
        correctIndex: 2
    },
    {
        q: "¿Cuál es el propósito del método `JSON.stringify(objeto)`?",
        options: ["Convertir un objeto JSON a un objeto JavaScript.", "Convertir un objeto JavaScript a una cadena de texto JSON.", "Eliminar propiedades de un objeto.", "Añadir un objeto a un array."],
        correctIndex: 1
    },
    {
        q: "¿Cuál es la principal diferencia entre un objeto literal (`{}`) y un objeto `Map`?",
        options: ["Los objetos literales son más lentos.", "Solo los `Map` pueden tener claves de cualquier tipo de dato (objetos, números, etc.).", "Los objetos literales mantienen el orden de inserción.", "Los `Map` solo pueden almacenar tipos primitivos."],
        correctIndex: 1
    },
    {
        q: "¿Qué método se utiliza para crear una copia **superficial** (shallow copy) de un objeto literal?",
        options: ["Object.assign({}, original)", "original.copy()", "JSON.parse(JSON.stringify(original))", "Object.duplicate(original)"],
        correctIndex: 0
    },
    // --- 5. Funciones (Declarations, Expressions, Arrow) y Scope ---
    {
        q: "¿En una función de flecha (`=>`), ¿cómo se vincula el valor de la palabra clave `this`?",
        options: ["Se determina en el momento de la llamada.", "Siempre se vincula al objeto global (`window`).", "Se hereda léxicamente del ámbito circundante.", "Siempre es `undefined`."],
        correctIndex: 2
    },
    {
        q: "¿Cuál es el concepto que permite a una función interna (anidada) acceder a las variables del ámbito de su función externa, incluso después de que la función externa haya finalizado?",
        options: ["Hoisting", "Callback", "Closure (Cierre)", "Prototype"],
        correctIndex: 2
    },
    {
        q: "¿Cuál es la sintaxis correcta de una función de flecha con un solo parámetro y una única sentencia de retorno implícito?",
        options: ["const func = param => { return param * 2; };", "const func = (param) => param * 2;", "const func = param -> param * 2;", "const func = (param) => { param * 2; };"],
        correctIndex: 1
    },
    {
        q: "¿Qué valor devuelve una función si no tiene una sentencia `return` explícita?",
        options: ["null", "0", "undefined", "El valor de la última expresión"],
        correctIndex: 2
    },
    // --- 6. Clases (OOP) y Prototipos (ES6) ---
    {
        q: "¿Qué palabra clave se usa en una clase hija para llamar al `constructor` de la clase padre?",
        options: ["base()", "parent()", "this.constructor()", "super()"],
        correctIndex: 3
    },
    {
        q: "¿Cómo se define un **método estático** en una clase de JavaScript (un método que pertenece a la clase y no a la instancia)?",
        options: ["Usando `private`.", "Anteponiendo `static` al nombre del método.", "Usando `const`.", "Definir fuera de la clase."],
        correctIndex: 1
    },
    {
        q: "¿Cuál es el método que se ejecuta automáticamente al crear una nueva instancia de una clase con la palabra clave `new`?",
        options: ["init()", "new()", "constructor()", "create()"],
        correctIndex: 2
    },
    {
        q: "¿Cuál es el principal objetivo de un método accesor (`getter`) al acceder a una propiedad de una clase o un objeto en JavaScript?",
        options: ["Simplificar la asignación de un valor a la propiedad.", "Validar el valor antes de modificar la propiedad.", "Definir si la propiedad es enumerable o no.", "Recuperar el valor de la propiedad del objeto."],
        correctIndex: 3
    },
    // --- 7. Iterables (for...of) y Sets ---
    {
        q: "¿Qué bucle se utiliza para iterar sobre los **valores** de colecciones iterables como Arrays, Strings, Maps y Sets?",
        options: ["for...in", "while", "do...while", "for...of"],
        correctIndex: 3
    },
    {
        q: "¿Cuál es la característica principal de un objeto `Set` en JavaScript?",
        options: ["Almacena datos en pares clave-valor.", "Permite ordenar elementos automáticamente.", "Solo almacena valores únicos.", "Solo almacena tipos primitivos."],
        correctIndex: 2
    },
    {
        q: "¿Qué método de `Set` se utiliza para comprobar si un elemento existe en la colección?",
        options: ["includes()", "contains()", "get()", "has()"],
        correctIndex: 3
    },
    {
        q: "¿Qué devuelve el método `Map.keys()`?",
        options: ["Un Array de las claves.", "Un String de todas las claves.", "Un iterador de las claves del Map.", "El número de claves."],
        correctIndex: 2
    },
    // --- 8. ES6 Features (Destructuring, Spread, Rest) ---
    {
        q: "Si tienes un objeto `const persona = { nombre: 'Ana', edad: 25 };`, ¿cuál es la sintaxis correcta para la **desestructuración** de la propiedad `nombre`?",
        options: ["let { nombre } = persona;", "const nombre = persona.nombre;", "let [ nombre ] = persona;", "let persona = { nombre };"],
        correctIndex: 0
    },
    {
        q: "¿Qué operador se utiliza para **expandir** los elementos de un array o las propiedades de un objeto dentro de otro array u objeto?",
        options: ["`&` (Address operator)", "`...` (Spread operator)", "`*` (Wildcard)", "`#` (Private field)"],
        correctIndex: 1
    },
    {
        q: "¿Qué operador de función recopila todos los argumentos restantes en un único array (ej: `function miFunc(a, b, ...rest)`)?",
        options: ["Spread operator", "Gather operator", "Rest operator", "Collect operator"],
        correctIndex: 2
    },
    {
        q: "Si tienes una variable `nombre = 'Ana';`, ¿cuál es la sintaxis de **Abreviatura de Propiedad de Objeto** (Shorthand) para crear un objeto donde la clave y el valor sean `nombre`?",
        options: ["{ clave: nombre }", "{ nombre = 'Ana' }", "{ nombre }", "{ 'nombre': nombre.value }"],
        correctIndex: 2
    },
    // --- 9. Control Flow & Error Handling (Reemplazo de Asincronía) ---
    {
        q: "¿Qué bloque de código en una estructura `try...catch...finally` se ejecuta **siempre**, independientemente de si ocurrió un error o no?",
        options: ["catch", "try", "finally", "throw"],
        correctIndex: 2
    },
    {
        q: "¿Qué sentencia se usa para **saltar la iteración actual** de un bucle y pasar a la siguiente?",
        options: ["break", "return", "continue", "skip"],
        correctIndex: 2
    },
    {
        q: "¿Qué línea debe colocarse al inicio de un script o función para activar el **modo estricto** de JavaScript?",
        options: ["\"use modern\"", "\"strict mode\"", "\"secure js\"", "\"use strict\""],
        correctIndex: 3
    },
    {
        q: "¿Cuál es la sintaxis correcta para que una sentencia `if` compruebe si una variable `x` es **mayor que 10 Y menor que 20**?",
        options: ["if (x > 10 || x < 20)", "if (x > 10 && x < 20)", "if (x: 10 to 20)", "if (x >= 10 and x <= 20)"],
        correctIndex: 1
    },
    // --- 10. Advanced JS: Iterators and Generators ---
    {
        q: "¿Qué palabra clave se utiliza dentro de una función generadora (`function*`) para pausar la ejecución y devolver un valor al llamador?",
        options: ["pause", "return", "yield", "next"],
        correctIndex: 2
    },
    {
        q: "¿Cuál es la salida de la llamada al método `next()` de un generador cuando ya no quedan valores por 'yieldear'?",
        options: ["{ value: undefined, done: false }", "{ value: last_value, done: true }", "{ value: null, done: true }", "{ value: undefined, done: true }"],
        correctIndex: 3
    },
    {
        q: "¿Cuál es el principal beneficio de usar funciones generadoras?",
        options: ["Son más rápidas que las funciones regulares.", "Permiten la pausa y reanudación de la ejecución, facilitando la creación de iteradores.", "Automáticamente manejan errores.", "Permiten el `hoisting` completo."],
        correctIndex: 1
    },
    {
        q: "¿Qué método se utiliza para forzar a un generador a terminar su ejecución de forma anticipada?",
        options: ["generator.stop()", "generator.yield()", "generator.return()", "generator.throw()"],
        correctIndex: 2
    }
];

// Variables y elementos del DOM (Necesarios para el funcionamiento del quiz en HTML)
let currentQuestionIndex = 0;
let score = 0;
let userAnswers = {}; 

const questionText = document.getElementById('question-text');
const optionsContainer = document.getElementById('options-container');
const scoreDisplay = document.getElementById('score-display');
const questionCounter = document.getElementById('question-counter');
const feedbackArea = document.getElementById('feedback-area');
const prevBtn = document.getElementById('prev-btn');
const checkBtn = document.getElementById('check-btn');
const nextBtn = document.getElementById('next-btn');
const finalResultsDiv = document.getElementById('final-results');
const finalScoreText = document.getElementById('final-score-text');

// --- Funciones del Quiz ---

/**
 * Función para barajar un array (Algoritmo Fisher-Yates).
 */
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

/**
 * Función que genera el código de certificación ofuscado con Base64.
 */
function generateCertificateCode(name, currentScore, total) {
    const timestamp = new Date().toISOString();
    // Los datos se separan por '|' para facilitar la decodificación
    const rawData = `${name}|${currentScore}|${total}|${timestamp}`;
    
    // Codificación Base64
    const encoded = btoa(rawData); 
    
    return `CERT-${encoded.toUpperCase()}`;
}

/**
 * Función para copiar el código al portapapeles del alumno.
 */
function copyCertificateCode() {
    const codeElement = document.getElementById('certificate-output');
    
    if (navigator.clipboard && codeElement.textContent) {
        navigator.clipboard.writeText(codeElement.textContent).then(() => {
            alert("Código de certificación copiado al portapapeles. ¡Pégalo en el documento de entrega!");
        });
    } else {
        // Fallback para navegadores antiguos
        const text = codeElement.textContent;
        const textArea = document.createElement("textarea");
        textArea.value = text;
        textArea.style.position = "fixed"; 
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.opacity = "0";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert("Código de certificación copiado al portapapeles. ¡Pégalo en el documento de entrega!");
    }
}

/**
 * Muestra los resultados finales del examen y el código de certificación.
 */
function showFinalResults() {
    const totalQuestions = quizData.length;
    const percentage = ((score / totalQuestions) * 100).toFixed(1);
    
    // *** 1. OBTENER EL NOMBRE ***
    // El .trim() elimina espacios innecesarios
    // Nota: 'studentName' se obtiene de un elemento input que debe estar en el HTML.
    const studentName = document.getElementById('studentName').value.trim() || 'Alumno/a Desconocido'; 

    // 2. Ocultar interfaz del quiz
    document.getElementById('question-area').style.display = 'none';
    document.getElementById('score-display').style.display = 'none';
    document.getElementById('question-counter').style.display = 'none';
    document.querySelector('.navigation').style.display = 'none';
    feedbackArea.style.display = 'none';
    document.getElementById('student-info').style.display = 'none'; 

    // 3. Generar el código de certificación
    const certificateCode = generateCertificateCode(studentName, score, totalQuestions);

    // 4. Mostrar resultados y certificado
    finalResultsDiv.style.display = 'block';
    finalResultsDiv.style.backgroundColor = '#e6ffec'; 
    finalResultsDiv.style.border = '2px solid #28a745';
    
    // *** OJO AQUÍ: SE USA LA VARIABLE certificateCode ***
    finalResultsDiv.innerHTML = `
        <h3>¡Examen Completado!</h3>
        <p>Alumno/a: <strong>${studentName}</strong></p>
        <p>Puntuación Final: <span class="final-score">${score} de ${totalQuestions}</span> (${percentage}%)</p>
        
        <hr style="margin: 20px 0;">
        
        <h4>CÓDIGO DE CERTIFICACIÓN OBLIGATORIO</h4>
        <p style="font-size: 0.9em; color: #555;">
            Debe copiar este código y entregárselo a su profesor para registrar la nota.
        </p>
        
        <div style="background-color: #f0f0f0; padding: 15px; border: 1px dashed #333; margin: 15px auto; word-break: break-all;">
            <strong id="certificate-output">${certificateCode}</strong>
        </div>
        
        <button onclick="copyCertificateCode()" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Copiar Código
        </button>
    `;
}

// RESTO DE FUNCIONES (renderQuestion, checkAnswer, etc.)
function renderQuestion(index) {
    if (index >= quizData.length) {
        showFinalResults();
        return;
    }
    currentQuestionIndex = index;
    const data = quizData[index];
    optionsContainer.innerHTML = '';
    feedbackArea.style.display = 'none';
    feedbackArea.className = '';
    questionText.textContent = data.q;
    questionCounter.textContent = `Pregunta ${index + 1} de ${quizData.length}`;
    data.options.forEach((option, optIndex) => {
        const label = document.createElement('label');
        label.className = 'option-label';
        const radio = document.createElement('input');
        radio.type = 'radio';
        radio.name = 'current_question_options';
        radio.value = optIndex;
        label.appendChild(radio);
        label.appendChild(document.createTextNode(option));
        optionsContainer.appendChild(label);
    });
    updateNavigationState();
    loadUserAnswer();
}
function checkAnswer() {
    const selected = document.querySelector('input[name="current_question_options"]:checked');
    if (!selected) {
        feedbackArea.textContent = 'Por favor, selecciona una respuesta.';
        feedbackArea.className = 'feedback-incorrect';
        feedbackArea.style.display = 'block';
        return;
    }
    const userAnswer = parseInt(selected.value);
    const correctIndex = quizData[currentQuestionIndex].correctIndex;
    const isCorrect = (userAnswer === correctIndex);
    const wasCheckedBefore = userAnswers[currentQuestionIndex] && userAnswers[currentQuestionIndex].checked;
    if (!wasCheckedBefore) {
        if (isCorrect) {
            score++;
        }
    }
    userAnswers[currentQuestionIndex] = { selected: userAnswer, correct: isCorrect, checked: true };
    feedbackArea.style.display = 'block';
    if (isCorrect) {
        feedbackArea.textContent = '¡Correcto! ✅';
        feedbackArea.className = 'feedback-correct';
    } else {
        const correctOptionText = quizData[currentQuestionIndex].options[correctIndex];
        feedbackArea.textContent = `Incorrecto. ❌ La respuesta correcta era: ${correctOptionText}.`;
        feedbackArea.className = 'feedback-incorrect';
    }
    updateScoreDisplay();
    disableOptionsAndCheck();
    updateNavigationState();
}
function showNextQuestion() {
    if (currentQuestionIndex === quizData.length - 1) {
        showFinalResults();
        return;
    }
    renderQuestion(currentQuestionIndex + 1);
}
function showPreviousQuestion() {
    if (currentQuestionIndex > 0) {
        renderQuestion(currentQuestionIndex - 1);
    }
}
function updateScoreDisplay() {
    scoreDisplay.textContent = `Puntuación: ${score} / ${quizData.length}`;
}
function updateNavigationState() {
    prevBtn.disabled = currentQuestionIndex === 0;
    const hasBeenChecked = userAnswers[currentQuestionIndex] && userAnswers[currentQuestionIndex].checked;
    const nextBtnIsDisabled = !hasBeenChecked && currentQuestionIndex < quizData.length - 1;
    if (currentQuestionIndex < quizData.length - 1) {
        nextBtn.textContent = 'Siguiente →';
        nextBtn.disabled = nextBtnIsDisabled; 
    } else {
        nextBtn.textContent = 'Ver Resultados';
        nextBtn.disabled = !hasBeenChecked; 
    }
    checkBtn.disabled = hasBeenChecked;
}
function loadUserAnswer() {
    const answer = userAnswers[currentQuestionIndex];
    if (answer && answer.checked) {
        const radio = document.querySelector(`input[value="${answer.selected}"]`);
        if (radio) {
            radio.checked = true;
        }
        feedbackArea.style.display = 'block';
        if (answer.correct) {
            feedbackArea.textContent = '¡Correcto! ✅ (Ya respondida)';
            feedbackArea.className = 'feedback-correct';
        } else {
            const correctIndex = quizData[currentQuestionIndex].correctIndex;
            const correctOptionText = quizData[currentQuestionIndex].options[correctIndex];
            feedbackArea.textContent = `Incorrecto. ❌ La respuesta correcta era: ${correctOptionText}. (Ya respondida)`;
            feedbackArea.className = 'feedback-incorrect';
        }
        disableOptionsAndCheck();
    } else {
        enableOptionsAndCheck();
    }
}
function disableOptionsAndCheck() {
    document.querySelectorAll('input[name="current_question_options"]').forEach(radio => {
        radio.disabled = true;
    });
    checkBtn.disabled = true;
}
function enableOptionsAndCheck() {
    document.querySelectorAll('input[name="current_question_options"]').forEach(radio => {
        radio.disabled = false;
    });
}


// --- Listeners de Eventos ---
window.onload = () => {
    shuffleArray(quizData);
    renderQuestion(0);
    updateScoreDisplay();
};

prevBtn.addEventListener('click', showPreviousQuestion);
nextBtn.addEventListener('click', showNextQuestion);
checkBtn.addEventListener('click', checkAnswer);
// Previene el menú contextual que podría usarse para "inspeccionar elemento" y hacer trampa
document.addEventListener("contextmenu", (e) => e.preventDefault());
