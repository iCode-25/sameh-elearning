<div class="filter-bar mb-48">
    <form method="GET" action=""
        class="filter-form row g-2 align-items-center justify-content-center justify-content-lg-start">

        <div class="col-3">
            <input type="text" name="name" class="form-control filter-input" placeholder="Lesson Name"
                value="<?php echo e(request('name')); ?>">
        </div>

        <div class="col-auto">
            <div class="level-buttons d-flex gap-2 flex-wrap">
                <input type="hidden" name="level_id" id="level_id" value="<?php echo e(request('level_id')); ?>">

                <div class="level-btn <?php echo e(request('level_id') == '' ? 'active' : ''); ?>" data-id="">
                    <?php echo e(\App\Helpers\TranslationHelper::translate('All Levels')); ?>

                </div>

                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="level-btn <?php echo e(request('level_id') == $level->id ? 'active' : ''); ?>"
                        data-id="<?php echo e($level->id); ?>">
                        <?php echo e($level->name); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary filter-btn">
                <i class="fas fa-filter me-1"></i> <?php echo e(\App\Helpers\TranslationHelper::translate('Filter')); ?>

            </button>
        </div>

    </form>
</div>

<?php $__env->startPush('css'); ?>
    <style>
        .level-btn {
            padding: 8px 16px;
            border: 1px solid #ccc;
            border-radius: 20px;
            cursor: pointer;
            background-color: #f8f9fa;
            transition: all 0.2s ease-in-out;
            user-select: none;
        }

        .level-btn:hover {
            background-color: #e2e6ea;
        }

        .level-btn.active {
            background-color: var(--primary-color);
            color: #fff;
            border-color: var(--primary-color);
        }

        .filter-bar {
            background: #fff;
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            white-space: nowrap;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            padding: 24px 18px 12px 18px;
            margin-bottom: 32px;
            -webkit-overflow-scrolling: touch;
        }

        /* أهم تعديل */
        .filter-form {
            display: flex;
            flex-wrap: nowrap;
            /* يمنع النزول لسطر تاني */
            gap: 8px;
            align-items: center;
        }

        /* علشان الأعمدة ما تتمددش وتبوظ التوزيع */
        .filter-form .col-3,
        .filter-form .col-auto {
            flex: 0 0 auto;
        }

        .filter-form .filter-input,
        .filter-form .filter-select {
            min-width: 180px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            box-shadow: none;
            transition: border-color 0.2s;
            padding: 12px;
        }

        .filter-form .filter-input:focus,
        .filter-form .filter-select:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .filter-form .filter-btn {
            border-radius: 8px;
            background: var(--primary-color);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 8px 24px;
            transition: background 0.2s;
        }

        .filter-form .filter-btn:hover {
            background: var(--secondary-color);
        }

        @media (max-width: 568px) {
            .filter-bar {
                padding: 12px 6px 6px 6px;
            }

            .filter-form .filter-input,
            .filter-form .filter-select {
                min-width: 120px;
            }
        }

        .filter-bar>* {
            flex: 1 0 auto;
            white-space: nowrap;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        document.querySelectorAll('.level-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // إزالة الكلاس active من الكل
                document.querySelectorAll('.level-btn').forEach(b => b.classList.remove('active'));

                // إضافة active للعنصر الحالي
                this.classList.add('active');

                // تحديث قيمة الـ input المخفي
                document.getElementById('level_id').value = this.getAttribute('data-id');
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\Qurtum\resources\views/front/components/filter.blade.php ENDPATH**/ ?>