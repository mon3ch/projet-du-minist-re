<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['etablissement_rhs', 'action_charter']));

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

foreach (array_filter((['etablissement_rhs', 'action_charter']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="row">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="m-0">
            <i class="fa-solid fa-users-gear me-2"></i>
            توزيع الموارد البشرية بالمؤسسات تحت الإشراف
        </h5>
        <span class="text-muted small">
            <button class="btn btn-primary quick-btn">
                <a href="<?php echo e(route('etablissement_rh.createByCharter', $action_charter)); ?>" class="text-white text-decoration-none">
                    <i class="fa-solid fa-plus me-2"></i>
                    إضافة مؤسسة تحت الإشراف
                </a>
            </button>

            <select id="filter-select" class="btn btn-success quick-btn ms-2" style="color:#000; background-color: transparent;">
                <option value="public" selected>مؤسسة عمومية</option>
                <option value="private">مؤسسة خاصة</option>
                <option value="all">كل المؤسسات</option>
            </select>
        </span>
    </div>

    <div class="soft-card p-3 mb-4" data-aos="fade-up">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle" style="direction: rtl;">
                <thead class="table-light">
                    <tr>
                        <th rowspan="2">نوع المؤسسة</th>
                        <th rowspan="2">اسم المؤسسة</th>
                        <th rowspan="2">
                                <span class="grade-title">الرتبة</span>

                        </th>
                        <th colspan="3">توزيع الأعوان حسب  توزيع الأعوان حسب <span class="grade-title">الرتبة</span></th>
                        <th rowspan="2">إجراءات</th>
                    </tr>
                    <tr>
                        <th>ذكور</th>
                        <th>إناث</th>
                        <th>المجموع</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $total_males = 0;
                        $total_females = 0;
                        $total_all = 0;
                    ?>

                    <?php $__currentLoopData = $etablissement_rhs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etablissement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $males = $etablissement->number_male ?? 0;
                            $females = $etablissement->number_female ?? 0;
                            $sum = $males + $females;

                            $total_males += $males;
                            $total_females += $females;
                            $total_all += $sum;
                        ?>

                        <tr data-is-public="<?php echo e($etablissement->is_public ? 'public' : 'private'); ?>">
                            <td><?php echo e($etablissement->is_public ? 'عمومية' : 'خاصة'); ?></td>
                            <td><?php echo e($etablissement->name_etablissement->name ?? '—'); ?></td>
                            <td><?php echo e($etablissement->is_public ? $etablissement->grade : $etablissement->specialisation); ?></td>
                            <td><?php echo e($males); ?></td>
                            <td><?php echo e($females); ?></td>
                            <td><strong><?php echo e($sum); ?></strong></td>
                            <td>
                                <a href="<?php echo e(route('etablissement_rh.edit', $etablissement->id)); ?>" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="<?php echo e(route('etablissement_rh.destroy', $etablissement->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <tr class="table-success fw-bold" id="total-row">
                        <td colspan="3">المجموع العام</td>
                        <td><?php echo e($total_males); ?></td>
                        <td><?php echo e($total_females); ?></td>
                        <td><?php echo e($total_all); ?></td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
function filterTable() {
    const filter = document.getElementById('filter-select').value; 
    const rows = document.querySelectorAll('tbody tr[data-is-public]');

    let total_males = 0;
    let total_females = 0;
    let total_all = 0;

    rows.forEach(row => {
        const type = row.getAttribute('data-is-public');

        const males = parseInt(row.cells[3].textContent) || 0;
        const females = parseInt(row.cells[4].textContent) || 0;

        if (filter === 'all' || type === filter) {
            row.style.display = ''; 

            total_males += males;
            total_females += females;
            total_all += (males + females);
        } else {
            row.style.display = 'none'; 
        }
    });

    const totalRow = document.getElementById('total-row');

    totalRow.cells[1].textContent = total_males;
    totalRow.cells[2].textContent = total_females;
    totalRow.cells[3].textContent = total_all;
   
    
    totalRow.style.display = ''; 
}

document.getElementById('filter-select').addEventListener('change', filterTable);

document.addEventListener('DOMContentLoaded', filterTable);
</script>
<script>
    function updateTitle() {
        const filter = document.getElementById('filter-select').value;
        const titles = document.querySelectorAll('.grade-title');

        let text = 'الرتبة';

        if (filter === 'private') {
            text = 'الاختصاص';
        } else if (filter === 'all') {
            text = 'الرتبة / الاختصاص';
        }

        titles.forEach(el => el.textContent = text);
    }

    document.addEventListener('DOMContentLoaded', updateTitle);
    document.getElementById('filter-select').addEventListener('change', updateTitle);
</script>

<?php if (isset($component)) { $__componentOriginal054c9937b46084c5ec6899bca96c68a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal054c9937b46084c5ec6899bca96c68a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal054c9937b46084c5ec6899bca96c68a1)): ?>
<?php $attributes = $__attributesOriginal054c9937b46084c5ec6899bca96c68a1; ?>
<?php unset($__attributesOriginal054c9937b46084c5ec6899bca96c68a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal054c9937b46084c5ec6899bca96c68a1)): ?>
<?php $component = $__componentOriginal054c9937b46084c5ec6899bca96c68a1; ?>
<?php unset($__componentOriginal054c9937b46084c5ec6899bca96c68a1); ?>
<?php endif; ?>
<?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/components/etablissement-rh-table.blade.php ENDPATH**/ ?>