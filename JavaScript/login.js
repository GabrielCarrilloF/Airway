document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        var modal = document.getElementById("modal-765830");
        if (modal) {
            // Simulamos el clic en el elemento para activar el modal
            modal.click();
        } else {
            console.error("No se encontró el modal con el ID modal-765830.");
        }
    }, 1000000000000); // Espera 5 segundos (5000 milisegundos)
});

/*----------------------------------*/ 
function toggleChat() {
    var chatContainer = document.getElementById("chat-container");
    chatContainer.classList.toggle("chat-visible");
  }
  
  function sendMessage() {
    var userInput = document.getElementById("user-input").value;
    if (userInput.trim() !== "") {
      addMessage("sent", userInput);
      setTimeout(autoResponse, 1000); // Simulando una respuesta después de 1 segundo
      document.getElementById("user-input").value = "";
    }
  }
  
  function autoResponse() {
    addMessage("received", "Lo siento, soy un bot. No puedo responder preguntas complejas.");
  }
  
  function addMessage(type, message) {
    var chatBox = document.getElementById("chat-box");
    var newMessage = document.createElement("div");
    newMessage.classList.add("message", type);
    newMessage.textContent = message;
    chatBox.appendChild(newMessage);
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  
