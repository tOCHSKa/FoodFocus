// Initialisation de SortableJS sur le conteneur de cartes
var el = document.querySelector('.aliment-card-collection');
var sortable = Sortable.create(el, {
    animation: 150, // durée de l'animation du déplacement
    onEnd: function (/**Event*/evt) {
        var itemEl = evt.item; // l'élément déplacé
        // Vous pourriez vouloir enregistrer l'état ici ou dans `onUpdate`
        saveOrder();
    },
});

// Fonction pour enregistrer l'ordre des cartes dans le stockage local
function saveOrder() {
    var order = [];
    document.querySelectorAll('.aliment-card-collection .aliment-card').forEach(function (card, index) {
        order.push({
            id: card.getAttribute('data-id'), // Assurez-vous que chaque carte a un attribut `data-id` unique
            position: index + 1
        });
    });
    localStorage.setItem('cardOrder', JSON.stringify(order));
}

// Fonction pour restaurer l'ordre des cartes à partir du stockage local
function restoreOrder() {
    var order = JSON.parse(localStorage.getItem('cardOrder'));
    if (order) {
        order.forEach(function (obj) {
            var card = document.querySelector('.aliment-card[data-id="' + obj.id + '"]');
            el.appendChild(card); // Déplace la carte dans la nouvelle position
        });
    }
}

// Appelez `restoreOrder` au chargement de la page pour rétablir l'ordre des cartes
window.addEventListener('load', restoreOrder);
