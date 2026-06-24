@props(['msg', 'type'])
<script>    
    Toastify({
        text: "Statut de " + $type + " changé à " + (data.status ? "Activé" : "Désactivé"),
        duration: 3000,
        gravity: "top", // top ou bottom
        position: "right", // left, center, right
        backgroundColor: data.status ? "green" : "red",
        stopOnFocus: true
    }).showToast();
</script>