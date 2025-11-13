// Array de datos del examen (40 PREGUNTAS ACTUALIZADAS CON GENERATORS/ITERATORS Y SIN ASÍNCRONO/DOM)
// Array de preguntas actualizadas (40 nuevas)
const quizData = [
    // --- 1. JS Basics & Variables ---
    {
        q: "¿Qué palabra clave crea una constante cuyo valor no puede ser reasignado?",
        options: ["var", "let", "const", "immutable"],
        correctIndex: 2
    },
    {
        q: "¿Cuál es el tipo de dato que devuelve `typeof null` en JavaScript?",
        options: ["object", "null", "undefined", "boolean"],
        correctIndex: 0
    },
    {
        q: "¿Qué operador compara **solo valores**, ignorando el tipo?",
        options: ["===", "==", "!==", "="],
        correctIndex: 1
    },
    {
        q: "¿Cuál de estos valores se considera **truthy**?",
        options: ["0", "''", "null", "[]"],
        correctIndex: 3
    },
    // --- 2. Strings, Numbers, Dates ---
    {
        q: "¿Qué método de string convierte todas las letras en mayúsculas?",
        options: ["toUpper()", "toUpperCase()", "upperCase()", "capitalize()"],
        correctIndex: 1
    },
    {
        q: "¿Qué método de Math devuelve el número más grande entre los pasados como argumentos?",
        options: ["Math.max()", "Math.min()", "Math.ceil()", "Math.floor()"],
        correctIndex: 0
    },
    {
        q: "¿Cómo se obtiene el **día del mes** de un objeto Date?",
        options: ["getDay()", "getDate()", "getMonth()", "getFullYear()"],
        correctIndex: 1
    },
    {
        q: "¿Qué devuelve la operación `5 + '5'` en JavaScript?",
        options: ["10", "'55'", "NaN", "'5 5'"],
        correctIndex: 1
    },
    // --- 3. Arrays ---
    {
        q: "¿Qué método añade un elemento al **inicio** de un array?",
        options: ["push()", "unshift()", "shift()", "pop()"],
        correctIndex: 1
    },
    {
        q: "¿Cuál de estos métodos **no modifica** el array original?",
        options: ["map()", "push()", "splice()", "pop()"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace `array.filter(func)`?",
        options: ["Crea un array con elementos que cumplen la condición de la función", "Modifica el array original", "Devuelve un solo valor acumulado", "Ordena el array"],
        correctIndex: 0
    },
    {
        q: "¿Qué devuelve `array.includes(value)`?",
        options: ["true si el valor existe", "un array con coincidencias", "el índice del valor", "undefined si no existe"],
        correctIndex: 0
    },
    // --- 4. Objetos y JSON ---
    {
        q: "¿Cómo se accede a una propiedad cuyo nombre se guarda en una variable `prop`?",
        options: ["obj.prop", "obj[prop]", "obj->prop", "obj[prop.name]"],
        correctIndex: 1
    },
    {
        q: "¿Cuál es el resultado de `JSON.parse(JSON.stringify(obj))`?",
        options: ["Copia profunda de obj", "Copia superficial de obj", "Convierte obj en un string plano", "Devuelve undefined"],
        correctIndex: 0
    },
    {
        q: "¿Qué método devuelve un array con los nombres de las propiedades de un objeto?",
        options: ["Object.values()", "Object.keys()", "Object.entries()", "Object.getNames()"],
        correctIndex: 1
    },
    {
        q: "¿Cuál de estas estructuras permite claves de cualquier tipo de dato?",
        options: ["Object", "Map", "Array", "Set"],
        correctIndex: 1
    },
    // --- 5. Funciones y Scope ---
    {
        q: "En una función tradicional, ¿a qué objeto hace referencia `this`?",
        options: ["Al objeto global o undefined en strict mode", "Siempre a la función", "A null", "A un objeto interno de JS"],
        correctIndex: 0
    },
    {
        q: "¿Qué permite un **closure**?",
        options: ["Acceder a variables externas a la función incluso después de ejecutarse", "Crear objetos", "Hacer loops", "Invocar eventos"],
        correctIndex: 0
    },
    {
        q: "Sintaxis correcta de arrow function con un parámetro y retorno implícito:",
        options: ["x => x*2", "(x) => { return x*2; }", "function(x) => x*2", "(x) => x*2;"],
        correctIndex: 0
    },
    {
        q: "¿Qué devuelve una función que no tiene `return` explícito?",
        options: ["null", "undefined", "0", "false"],
        correctIndex: 1
    },
    // --- 6. Clases y OOP ---
    {
        q: "Palabra clave para invocar el constructor de la clase padre:",
        options: ["super()", "parent()", "this()", "base()"],
        correctIndex: 0
    },
    {
        q: "Método de clase que pertenece solo a la clase, no a la instancia:",
        options: ["static method", "private method", "getter", "setter"],
        correctIndex: 0
    },
    {
        q: "Método que se ejecuta al crear una instancia con `new`:",
        options: ["constructor()", "init()", "create()", "new()"],
        correctIndex: 0
    },
    {
        q: "Propósito de un getter en clases:",
        options: ["Obtener el valor de la propiedad", "Cambiar la propiedad", "Eliminar la propiedad", "Añadir propiedades dinámicas"],
        correctIndex: 0
    },
    // --- 7. Iterables y Sets ---
    {
        q: "Bucle para iterar sobre los valores de un array o string:",
        options: ["for...in", "for...of", "while", "do...while"],
        correctIndex: 1
    },
    {
        q: "Propiedad principal de un Set:",
        options: ["Almacena pares clave-valor", "Solo valores únicos", "Ordena automáticamente", "Permite duplicados"],
        correctIndex: 1
    },
    {
        q: "Método de Set para verificar si contiene un valor:",
        options: ["has()", "includes()", "contains()", "get()"],
        correctIndex: 0
    },
    {
        q: "Método que devuelve un iterador de las claves de un Map:",
        options: ["keys()", "values()", "entries()", "allKeys()"],
        correctIndex: 0
    },
    // --- 8. ES6 Features ---
    {
        q: "Sintaxis para desestructurar la propiedad 'edad' de un objeto persona:",
        options: ["const {edad} = persona;", "const edad = persona.edad;", "const [edad] = persona;", "const persona = {edad};"],
        correctIndex: 0
    },
    {
        q: "Operador para expandir elementos de un array u objeto:",
        options: ["`&`", "`...`", "`*`", "`#`"],
        correctIndex: 1
    },
    {
        q: "Operador que agrupa argumentos restantes en un array:",
        options: ["rest operator", "spread operator", "collect operator", "gather operator"],
        correctIndex: 0
    },
    {
        q: "Abreviatura de propiedad de objeto para variable nombre:",
        options: ["{nombre}", "{nombre:nombre}", "{nombre=nombre}", "{'nombre': nombre}"],
        correctIndex: 0
    },
    // --- 9. Control Flow & Errors ---
    {
        q: "Bloque que siempre se ejecuta después de try/catch:",
        options: ["try", "catch", "finally", "throw"],
        correctIndex: 2
    },
    {
        q: "Sentencia para saltar a la siguiente iteración de un bucle:",
        options: ["break", "continue", "return", "skip"],
        correctIndex: 1
    },
    {
        q: "Modo estricto activado con:",
        options: ["'use strict'", "'strict mode'", "'use modern'", "'secure js'"],
        correctIndex: 0
    },
    {
        q: "Sintaxis correcta para comprobar 10 < x < 20:",
        options: ["if (x > 10 && x < 20)", "if (x > 10 || x < 20)", "if (10 < x < 20)", "if (x in 10..20)"],
        correctIndex: 0
    },
    // --- 10. Iterators & Generators ---
    {
        q: "Palabra clave para pausar y devolver valor en un generador:",
        options: ["yield", "pause", "return", "next"],
        correctIndex: 0
    },
    {
        q: "Resultado de next() cuando no hay más valores:",
        options: ["{value: undefined, done: true}", "{value: last, done: true}", "{value: null, done: true}", "{value: undefined, done: false}"],
        correctIndex: 0
    },
    {
        q: "Beneficio principal de un generador:",
        options: ["Pausar/reanudar ejecución y crear iteradores", "Más rápido que funciones normales", "Maneja errores automáticamente", "Evita hoisting"],
        correctIndex: 0
    },
    {
        q: "Método para terminar un generador anticipadamente:",
        options: ["generator.return()", "generator.stop()", "generator.yield()", "generator.end()"],
        correctIndex: 0
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
