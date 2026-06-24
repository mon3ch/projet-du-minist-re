@props(['type'])
<!-- Modal de confirmation pour changer le statut -->
<div class="modal fade" id="toggleStatusModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        @if(App::getLocale() === 'ar')
            <h5 class="modal-title text-warning">تغيير الحالة</h5>
        @elseif(App::getLocale() === 'fr')
            <h5 class="modal-title ">Changer le statut</h5>
        @else
            <h5 class="modal-title text-warning">Change Status</h5>
        @endif
      </div>

      <div class="modal-body">
        @if(App::getLocale() === 'ar')
            <p>هل أنت متأكد من رغبتك في تغيير حالة <strong id="userName"></strong> ؟</p>
            <p><b> في حالة تفعيل حساب </b></p>
            <p style="color: red">قبل تفعيل حساب المستخدم، يرجى التأكد من صحة الولاية المسجلة له.</p>
        @elseif(App::getLocale() === 'fr')
            <p>Êtes-vous sûr de vouloir changer le statut de <strong id="userName"></strong> ?</p>
            <p><b>Lors de l'activation du compte</b></p>
            <p style="color: red">Avant d'activer le compte de l'utilisateur, veuillez vérifier que la gouvernorat enregistrée est correcte.</p>
        @else
            <p style="color: red">Before activating the user's account, please verify that the registered governorate is correct.</p>
            <p><b>When activating the account</b></p>
            <p>Are you sure you want to change the status of <strong id="userName"></strong>?</p>
        @endif
      </div>

      <div class="modal-footer justify-content-center">
        @if(App::getLocale() === 'ar')
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
            <button type="button" class="btn btn-warning" id="confirmToggle">نعم، غيّر</button>
        @elseif(App::getLocale() === 'fr')
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-warning" id="confirmToggle">Oui, changer</button>
        @else
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning" id="confirmToggle">Yes, change</button>
        @endif
      </div>
    </div>
  </div>
</div>


  <script>
let selectedUserId = null;

document.querySelectorAll('.toggle-status-btn').forEach(button => {
    button.addEventListener('click', function() {
        selectedUserId = this.dataset.id;
        document.getElementById('userName').innerText = this.dataset.name;

        var myModal = new bootstrap.Modal(document.getElementById('toggleStatusModal'));
        myModal.show();
    });
});

document.getElementById('confirmToggle').addEventListener('click', function() {
    if(selectedUserId){
        fetch("{{ route('profile.toggleStatus') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({id: selectedUserId})
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                location.reload(); 
            } else {
                alert('Erreur lors du changement!');
            }
        });
    }
});
</script>
