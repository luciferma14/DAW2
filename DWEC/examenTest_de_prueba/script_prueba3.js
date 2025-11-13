// Array de datos del examen (40 PREGUNTAS ACTUALIZADAS CON GENERATORS/ITERATORS Y SIN ASÍNCRONO/DOM)
// --- 11. JS Moderno y ES6+ ---
const quizData = [
    {
        q: "¿Qué hace el operador `??` en JavaScript?",
        options: ["Comprueba igualdad estricta", "Devuelve el primer valor no nulo o undefined", "Concatena strings", "Asigna valores por defecto a variables globales"],
        correctIndex: 1
    },
    {
        q: "¿Cuál es la diferencia principal entre `let` y `var`?",
        options: ["`let` tiene scope de bloque, `var` de función", "`let` puede reasignarse, `var` no", "`var` solo existe en Node.js", "`let` no se puede usar en loops"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace la función `Object.entries(obj)`?",
        options: ["Devuelve un array de [clave, valor] del objeto", "Devuelve todas las claves del objeto", "Crea un objeto vacío", "Devuelve un array de valores únicos"],
        correctIndex: 0
    },
    {
        q: "¿Cuál es la salida de `['a','b','c'].map((x,i)=> x+i)`?",
        options: ["['a0','b1','c2']", "['a','b','c']", "['0a','1b','2c']", "['a','b','c','0','1','2']"],
        correctIndex: 0
    },
    // --- 12. Funciones Avanzadas ---
    {
        q: "¿Qué hace un callback en JavaScript?",
        options: ["Una función que se pasa como argumento a otra función", "Una variable global", "Un tipo de objeto", "Un bucle que recorre arrays"],
        correctIndex: 0
    },
    {
        q: "¿Qué devuelve `Array.find(func)`?",
        options: ["El primer elemento que cumple la condición", "Un array filtrado", "Todos los elementos que cumplen la condición", "Un booleano"],
        correctIndex: 0
    },
    {
        q: "¿Qué palabra clave se usa para declarar una función anónima asignada a una variable?",
        options: ["function", "const", "let", "var"],
        correctIndex: 0
    },
    {
        q: "¿Cuál es la diferencia entre function declaration y function expression?",
        options: ["Las declaraciones se pueden llamar antes de definirlas; las expresiones no", "No hay diferencia", "Las expresiones solo funcionan en ES6+", "Las declaraciones son variables"],
        correctIndex: 0
    },
    // --- 13. Arrays y Métodos Avanzados ---
    {
        q: "¿Qué hace `array.reduce((acc, val) => acc + val, 0)`?",
        options: ["Suma todos los valores del array", "Crea un nuevo array", "Filtra elementos falsy", "Devuelve un booleano"],
        correctIndex: 0
    },
    {
        q: "¿Cuál es la diferencia entre `forEach` y `map`?",
        options: ["forEach no devuelve nada, map devuelve un nuevo array", "No hay diferencia", "map modifica el array original, forEach no", "forEach es más rápido que map siempre"],
        correctIndex: 0
    },
    {
        q: "¿Qué método combina dos arrays en uno solo?",
        options: ["concat()", "push()", "merge()", "join()"],
        correctIndex: 0
    },
    {
        q: "¿Qué método elimina el primer elemento de un array?",
        options: ["shift()", "pop()", "unshift()", "splice()"],
        correctIndex: 0
    },
    // --- 14. Objetos y Clases ---
    {
        q: "¿Qué hace `Object.freeze(obj)`?",
        options: ["Hace que el objeto no pueda ser modificado", "Elimina el objeto", "Crea una copia del objeto", "Hace que todas las propiedades sean privadas"],
        correctIndex: 0
    },
    {
        q: "¿Qué devuelve `new Date().toISOString()`?",
        options: ["La fecha y hora en formato ISO 8601", "Solo el año", "Un objeto Date vacío", "La zona horaria local"],
        correctIndex: 0
    },
    {
        q: "¿Qué palabra clave se usa para definir un método privado en una clase ES2020+?",
        options: ["#", "private", "_", "$"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace el método `Object.getPrototypeOf(obj)`?",
        options: ["Devuelve el prototipo del objeto", "Devuelve un array de claves", "Convierte el objeto en string", "Elimina el prototipo"],
        correctIndex: 0
    },
    // --- 15. Generadores e Iteradores Avanzados ---
    {
        q: "¿Qué devuelve un generador la primera vez que se llama `next()`?",
        options: ["El primer valor yield", "undefined", "true", "null"],
        correctIndex: 0
    },
    {
        q: "¿Cuál es la sintaxis correcta para definir un generador?",
        options: ["function* myGen() {}", "function myGen*() {}", "gen function() {}", "generator function() {}"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace el método `generator.throw(error)`?",
        options: ["Lanza un error dentro del generador", "Detiene la ejecución normal", "Devuelve undefined", "Resetea el generador"],
        correctIndex: 0
    },
    {
        q: "¿Qué devuelve `Array.from(new Set([1,2,2,3]))`?",
        options: ["[1,2,3]", "[1,2,2,3]", "[1,3]", "[2,3]"],
        correctIndex: 0
    },
    // --- 16. ES6+ Avanzado y Operadores ---
    {
        q: "¿Qué hace el operador lógico `&&` cuando se usa en una expresión como `expr1 && expr2`?",
        options: ["Devuelve expr2 si expr1 es truthy, sino expr1", "Devuelve true siempre", "Devuelve false siempre", "Concatena valores"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace el operador lógico `||` en `expr1 || expr2`?",
        options: ["Devuelve expr1 si es truthy, sino expr2", "Devuelve false siempre", "Devuelve true siempre", "Convierte valores a boolean"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace la destructuración con valores por defecto?",
        options: ["Asigna un valor si la propiedad es undefined", "Cambia el valor original del objeto", "Elimina propiedades inexistentes", "Crea un array"],
        correctIndex: 0
    },
    {
        q: "¿Qué devuelve `typeof NaN`?",
        options: ["number", "NaN", "undefined", "object"],
        correctIndex: 0
    },
    // --- 17. Funciones, Scope y Closures ---
    {
        q: "¿Cuál es la diferencia entre `call`, `apply` y `bind`?",
        options: ["call y apply invocan la función inmediatamente, bind devuelve una nueva función", "No hay diferencia", "bind invoca la función y call devuelve otra", "apply no existe en ES6+"],
        correctIndex: 0
    },
    {
        q: "¿Qué es el hoisting en JavaScript?",
        options: ["Elevación de declaraciones de variables y funciones al inicio de su scope", "Bucle infinito", "Error en tiempo de ejecución", "Inicialización de objetos"],
        correctIndex: 0
    },
    {
        q: "¿Qué sucede si reasignas una constante que contiene un objeto?",
        options: ["No puedes reasignar la referencia, pero sí modificar propiedades", "Se lanza error y nada se modifica", "Se convierte en undefined", "Se puede reasignar libremente"],
        correctIndex: 0
    },
    {
        q: "¿Qué devuelve una función IIFE (Immediately Invoked Function Expression)?",
        options: ["El valor que retorna la función", "Siempre undefined", "Un objeto global", "Una promesa"],
        correctIndex: 0
    },
    // --- 18. Arrays Avanzados ---
    {
        q: "¿Qué hace `array.flat()`?",
        options: ["Aplana un array de arrays en un solo nivel", "Combina arrays en un array de arrays", "Elimina duplicados", "Devuelve un iterador"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace `array.flatMap(func)`?",
        options: ["Aplica la función y aplana el resultado en un solo array", "Crea un nuevo array sin modificar el original", "Filtra elementos falsy", "Convierte array en string"],
        correctIndex: 0
    },
    {
        q: "¿Cuál es la diferencia entre `slice` y `splice`?",
        options: ["slice no modifica el array original, splice sí", "slice borra, splice copia", "slice concatena, splice filtra", "No hay diferencia"],
        correctIndex: 0
    },
    {
        q: "¿Qué devuelve `array.findIndex(func)`?",
        options: ["El índice del primer elemento que cumple la condición", "El primer valor que cumple la condición", "Todos los índices coincidentes", "Un booleano"],
        correctIndex: 0
    },
    // --- 19. Objetos y Clases Avanzadas ---
    {
        q: "¿Qué hace `Object.seal(obj)`?",
        options: ["Evita añadir/eliminar propiedades pero permite modificar existentes", "Hace el objeto inmutable", "Convierte el objeto en string", "Elimina todas las propiedades"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace `Object.hasOwn(obj, prop)`?",
        options: ["Comprueba si obj tiene la propiedad prop directamente, no en el prototipo", "Devuelve todas las propiedades", "Elimina prop del objeto", "Convierte prop en enumerable"],
        correctIndex: 0
    },
    {
        q: "¿Qué devuelve `instanceof`?",
        options: ["true si un objeto es instancia de un constructor dado", "El prototipo del objeto", "Un array de propiedades", "true siempre para objetos literales"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace el método estático en clases?",
        options: ["Pertenece a la clase y no a instancias", "Se hereda automáticamente a subclases", "Modifica la instancia", "Crea propiedades privadas"],
        correctIndex: 0
    },
    // --- 20. Generadores e Iteradores ---
    {
        q: "¿Cuál es la forma correcta de iterar manualmente un generador?",
        options: ["Usando next() hasta done=true", "Usando forEach()", "Usando map()", "Usando while(generator.done)"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace `yield* iterable` dentro de un generador?",
        options: ["Delegar la iteración a otro iterable", "Detiene el generador", "Devuelve undefined", "Convierte el iterable en string"],
        correctIndex: 0
    },
    {
        q: "¿Qué devuelve `Array.from(generator)` si generator es un generador?",
        options: ["Un array con todos los valores yield del generador", "Un objeto iterador", "Un string con los valores", "undefined"],
        correctIndex: 0
    },
    {
        q: "¿Qué hace `generator.return(value)`?",
        options: ["Termina el generador y devuelve value como último resultado", "Inicia el generador", "Cambia el valor de yield actual", "Lanza un error dentro del generador"],
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
