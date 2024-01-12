const script3 = document.createElement('script');
script3.src = 'https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js';
let typed; // Déclaration de la variable 'typed' à l'extérieur de onload pour y accéder plus tard

// Créez un gestionnaire d'événements pour l'événement "load" du script externe.
script3.onload = function () {
    // Le script externe est chargé. Vous pouvez maintenant créer l'instance Typed.
    typed = new Typed('.auto-type', {
        strings: ["Pomme", "Riz Basmati", "Cuisse de Poulet"],
        typeSpeed: 130,
        backSpeed: 60,
        cursorChar: '_',
        backDelay: 900,
        showCursor: true,
        loop: true
    });
};

// Ajoutez le script externe au DOM.
document.body.appendChild(script3);

// Ajouter un gestionnaire d'événements 'click' à l'élément input
document.querySelector('.auto-type').addEventListener('click', function() {
    if (typed) {
        typed.stop(); // Arrêter l'animation Typed.js
    }
});
