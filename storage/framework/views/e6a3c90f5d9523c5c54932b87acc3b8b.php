<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['type']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<!-- Modal de confirmation pour changer le statut -->
<div class="modal fade" id="toggleStatusModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <?php if(App::getLocale() === 'ar'): ?>
            <h5 class="modal-title text-warning">تغيير الحالة</h5>
        <?php elseif(App::getLocale() === 'fr'): ?>
            <h5 class="modal-title ">Changer le statut</h5>
        <?php else: ?>
            <h5 class="modal-title text-warning">Change Status</h5>
        <?php endif; ?>
      </div>

      <div class="modal-body">
        <?php if(App::getLocale() === 'ar'): ?>
            <p>هل أنت متأكد من رغبتك في تغيير حالة <strong id="userName"></strong> ؟</p>
            <p><b> في حالة تفعيل حساب </b></p>
            <p style="color: red">قبل تفعيل حساب المستخدم، يرجى التأكد من صحة الولاية المسجلة له.</p>
        <?php elseif(App::getLocale() === 'fr'): ?>
            <p>Êtes-vous sûr de vouloir changer le statut de <strong id="userName"></strong> ?</p>
            <p><b>Lors de l'activation du compte</b></p>
            <p style="color: red">Avant d'activer le compte de l'utilisateur, veuillez vérifier que la gouvernorat enregistrée est correcte.</p>
        <?php else: ?>
            <p style="color: red">Before activating the user's account, please verify that the registered governorate is correct.</p>
            <p><b>When activating the account</b></p>
            <p>Are you sure you want to change the status of <strong id="userName"></strong>?</p>
        <?php endif; ?>
      </div>

      <div class="modal-footer justify-content-center">
        <?php if(App::getLocale() === 'ar'): ?>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
            <button type="button" class="btn btn-warning" id="confirmToggle">نعم، غيّر</button>
        <?php elseif(App::getLocale() === 'fr'): ?>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-warning" id="confirmToggle">Oui, changer</button>
        <?php else: ?>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning" id="confirmToggle">Yes, change</button>
        <?php endif; ?>
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
        fetch("<?php echo e(route('profile.toggleStatus')); ?>", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
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
<?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/components/delete.blade.php ENDPATH**/ ?>