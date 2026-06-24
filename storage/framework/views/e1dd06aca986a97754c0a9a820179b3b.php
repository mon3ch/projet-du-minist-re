
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h5 class="m-0"><i class="fa-solid fa-folder-open"></i> <?php echo e(__('messages.projects_list')); ?> (<?php echo e($projets->count()); ?>)</h5>
      <span class="text-muted small">      
          <button class="btn btn-success quick-btn">
            <a href="<?php echo e(url('/projects/export')); ?>"  class="nav-link">
                <i class="fa-solid fa-file-excel"></i> <?php echo e(__('messages.download_Excel')); ?>

            </a>
        </button>
        <button class="btn btn-primary quick-btn">
                <a class="nav-link" href="<?php echo e(route('projet.create')); ?>"> <i class="fa-solid fa-plus me-1"></i> <?php echo e(__('messages.add_project')); ?> </a>
        </button>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<div id="preview"></div>

<script>
function excelDateToJSDate(serial) {
    const utc_days  = Math.floor(serial - 25569);
    const utc_value = utc_days * 86400;
    const date_info = new Date(utc_value * 1000);

    const fractional_day = serial - Math.floor(serial);
    const total_seconds = Math.floor(86400 * fractional_day);

    const seconds = total_seconds % 60;
    const hours = Math.floor(total_seconds / 3600);
    const minutes = Math.floor(total_seconds / 60) % 60;

    date_info.setHours(hours);
    date_info.setMinutes(minutes);
    date_info.setSeconds(seconds);

    return date_info.toISOString().split('T')[0]; // YYYY-MM-DD
}

function readExcel() {
    let file = document.getElementById('excel_file').files[0];
    if (!file) {
        alert("اختر ملف Excel!");
        return;
    }

    let reader = new FileReader();
    reader.onload = function(e) {
        let data = e.target.result;
        let workbook = XLSX.read(data, { type: 'binary' });
        let sheet = workbook.Sheets[workbook.SheetNames[0]];
        let rows = XLSX.utils.sheet_to_json(sheet, { defval: null }); // defval لتجنب undefined

        const dateFields = [
            'تاريخ القبول النهائي',
            'تاريخ القبول الوقتي',
            'تاريخ انتهاء الأشغال',
            'تاريخ بداية الأشغال'
        ];

        rows = rows.map(row => {
            dateFields.forEach(field => {
                if(row[field] && !isNaN(row[field])){
                    row[field] = excelDateToJSDate(row[field]);
                }
            });

            if(row['نوع المشروع_1']){
                row['نوع المشروع'] = row['نوع المشروع_1'];
                delete row['نوع المشروع_1'];
            }

            return row;
        });

        console.log("البيانات المقروءة من Excel:");
        console.table(rows);

        let preview = document.getElementById('preview');
        preview.innerHTML = "<pre>" + JSON.stringify(rows, null, 2) + "</pre>";

        sendDataToServer(rows);
    };
    reader.readAsBinaryString(file);
}

function sendDataToServer(rows) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/import-json', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ data: rows })
    })
    .then(response => {
        if (!response.ok) throw new Error('HTTP error ' + response.status);
        return response.json();
    })
    .then(result => {
        if(result.success){
            alert("تم استيراد البيانات بنجاح!");
        } else {
            alert("حدث خطأ أثناء الاستيراد!");
            console.log(result);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("حدث خطأ أثناء الاتصال بالخادم: " + error.message);
    });
}
</script>


        
        </span>

        </div>
        
         <form method="GET" action="<?php echo e(route('projet.index')); ?>" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                      placeholder="<?php echo e(__('messages.search_placeholder')); ?>"
                      value="<?php echo e(request('search')); ?>">
                <button class="btn btn-primary" type="submit">
                    <i class="fa-solid fa-search"></i> <?php echo e(__('messages.search')); ?>

                </button>
            </div>
        </form>

   <div class="soft-card p-3 mb-4" data-aos="fade-up">


              <div class=" p-0">
                <div class="table-responsive">
                  <table class="align-middle mb-0 table-hover" style="width: 100%;">
                    <thead class="table-light">
                      <tr>
                        <th scope="col" style="padding-left: 15px;"><?php echo e(__('messages.responsable')); ?></th>
                        <th scope="col" style="padding-left: 15px;"><?php echo e(__('messages.gouvernorat')); ?></th>
                        
                        <th scope="col" style="padding-left: 15px;"><?php echo e(__('messages.programme')); ?></th>
                        <th scope="col" style="padding-left: 15px;"><?php echo e(__('messages.name_etablissement')); ?></th>
                        <th scope="col" style="padding-left: 15px;"><?php echo e(__('messages.description')); ?></th>
                        

                        <th scope="col" class="text-center"><?php echo e(__('messages.actions')); ?></th>
                      </tr>
                    </thead>
                    <tbody class="table-modern">
                      <?php $__currentLoopData = $projets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $projet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="text-center" style="padding-left: 15px;">
                            <img 
                                src="<?php echo e(asset('storage/' . ($projet->profile->image ?? 'default.png'))); ?>" 
                                alt="User Image" 
                                class="rounded-circle" 
                                width="30" height="30"
                                data-bs-toggle="popover"
                                data-bs-trigger="hover focus"
                                data-bs-html="true"
                                title="<?php echo e($projet->profile->first_name); ?> <?php echo e($projet->profile->last_name); ?>"
                                data-bs-content="
                                    <strong><?php echo e(__('messages.email')); ?> : </strong> <?php echo e($projet->profile->email ?? 'N/A'); ?><br>
                                    <strong><?php echo e(__('messages.active')); ?> :</strong> <?php echo e($projet->profile->is_active ? '✅' : '❌'); ?>  
                                    <strong><?php echo e(__('messages.admin')); ?> :</strong> <?php echo e($projet->profile->is_admin ? '✅' : '❌'); ?>"
                            >
                        </td>

                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            data-tippy-content="<?php echo e($projet->gouvernorat->name); ?>">
                            <?php echo e($projet->gouvernorat->name); ?>

                        </td>
<!--
                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            data-tippy-content="<?php echo e($projet->delegation->name); ?>">
                            <?php echo e($projet->delegation->name); ?>

                        </td>
                    -->
                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            data-tippy-content="<?php echo e($projet->programme?->name); ?>">
                            <?php echo e($projet->programme?->name); ?>

                        </td>                    
                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <?php echo e($projet->name_etablissement?->name); ?>

                        </td>
                      


                        <td style="padding-left: 15px; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                            data-tippy-content="<?php echo e($projet->description); ?>">
                            <?php echo e($projet->description); ?>

                        </td>

                        
                      <td class="text-center" style="padding-left: 15px;"> 
                            
                          <form action="<?php echo e(route('projet.edit', $projet->id)); ?>" method="GET" class="d-inline">
                              <?php echo csrf_field(); ?>
                              <button type="submit" class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editUserModal">
                              <i class="fa-solid fa-pen"></i>
                            </button>
                          </form>

                          
                          <?php if(Auth::user()->is_admin): ?>

                          <form action="<?php echo e(route('projet.destroy', $projet->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('<?php echo e(__('messages.delete_question')); ?>')">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('DELETE'); ?>
                          <button  type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                              <i class="fa-solid fa-trash"></i>
                            </button>
                          </form>
                            <?php endif; ?>
                        </td>
                      </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    });
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
<?php endif; ?><?php /**PATH D:\5edma\hatha howa s7i7!!!!!!\suivi-projet-devlope (1)\suivi-projet-devlope\resources\views/components/projet-table.blade.php ENDPATH**/ ?>