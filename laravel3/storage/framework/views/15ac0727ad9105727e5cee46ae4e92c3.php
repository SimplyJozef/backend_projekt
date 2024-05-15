<?php echo $__env->make("parts.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<?php if($stages): ?>
    <h1> Stage </h1>
    <ul>
        <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
            <form action="<?php echo e(route('update-stage', ['id' => $stage->id])); ?>" method="POST">
                <?php echo csrf_field(); ?> <!-- CSRF protection -->
                <?php echo method_field('PUT'); ?> <!-- Use PUT method for update -->
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo e($stage->name); ?>"><br>
                <label for="date">Date:</label><br>
                <input type="date" id="date" name="date" value="<?php echo e($stage->date); ?>"><br><br>


                <button type="submit">Update Stage</button> <br>
            </form>

            <form action="<?php echo e(route('delete-stage', ['id' => $stage->id])); ?>" method="POST">
                <?php echo csrf_field(); ?> <!-- CSRF protection -->
                <?php echo method_field('DELETE'); ?> <!-- Use DELETE method for delete -->
                <button type="submit">Delete Stage</button>
            </form>

            <?php $__currentLoopData = $stageInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($info->stage_id == $stage->id): ?>
                    <form action="<?php echo e(route('update-stageInfo', ['id' => $info->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?> <!-- CSRF protection -->
                        <?php echo method_field('PUT'); ?> <!-- Use PUT method for update -->
                        <label for="Nazov">nazov</label><br>
                        <input type="text" id="nazov" name="nazov" value="<?php echo e($info->nazov); ?>"><br>

                        <label for="timestamp">Cas od : do</label><br>
                        <input type="text" id="cas_od" name="cas_od" value="<?php echo e($info->cas_od); ?>">
                        :
                        <input type="text" id="cas_do" name="cas_do" value="<?php echo e($info->cas_do); ?>"><br>
                        <!-- Include a div for CKEditor -->
                        <div id="editor-container-<?php echo e($info->id); ?>">
                            <textarea name="popis" id="popis-<?php echo e($info->id); ?>"><?php echo e($info->popis); ?></textarea><br>
                        </div>

                        <label for="speaker">Speaker</label><br>
                        <input type="text" id="speaker" name="speaker"  value="<?php echo e($info->speaker); ?>"><br><br>

                        <label for="firma">Firma</label><br>
                        <input type="text" id="firma" name="firma" value="<?php echo e($info->firma); ?>"><br><br>


                        <label for="speaker_image_link">speaker_image_link</label><br>
                        <input type="text" id="speaker_image_link" name="speaker_image_link" value="<?php echo e($info->speaker_image_link); ?>"><br><br>

                        <label for="max_capacity">Max kapacita</label><br>
                        <input type="text" id="max_capacity" name="max_capacity" value="<?php echo e($info->max_capacity); ?>"><br><br>

                        <button type="submit">Update Stage info</button> <br>
                    </form>

                    <!-- Initialize CKEditor -->
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#popis-<?php echo e($info->id); ?>' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
<?php else: ?>
    <b>No stages</b>
<?php endif; ?>
<div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
    <form action="<?php echo e(route('create-stage')); ?>" method="POST">
        <?php echo csrf_field(); ?> <!-- CSRF protection -->
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date"><br><br>
        <button type="submit">Add Stage</button>
    </form>
</div>


<?php if($sponzors): ?>
    <h1> Sponsors </h1>
    <ul>
        <?php $__currentLoopData = $sponzors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
            <form action="<?php echo e(route('update-sponsor', ['id' => $sponsor->id])); ?>" method="POST">
                <?php echo csrf_field(); ?> <!-- CSRF protection -->
                <?php echo method_field('PUT'); ?> <!-- Use PUT method for update -->
                <img src="<?php echo e(url('storage/images/' . $sponsor->imageLink)); ?>" class="img-fluid" style="max-height: 200px;" alt=""><br>
                <label for="imageLink">Image Link:</label><br>
                <input type="text" id="imageLink" name="imageLink" value="<?php echo e($sponsor->imageLink); ?>"><br>
                <label for="link">Link:</label><br>
                <input type="text" id="link" name="link" value="<?php echo e($sponsor->link); ?>"><br><br>
                <button type="submit">Update Sponsor</button>
            </form>

            <form action="<?php echo e(route('delete-sponsor', ['id' => $sponsor->id])); ?>" method="POST">
                <?php echo csrf_field(); ?> <!-- CSRF protection -->
                <?php echo method_field('DELETE'); ?> <!-- Use DELETE method for delete -->
                <button type="submit">Delete Sponsor</button>
            </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <b>No sponsors</b>
<?php endif; ?>
<div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">

<form action="<?php echo e(route('create-sponsor')); ?>" method="POST">
    <?php echo csrf_field(); ?> <!-- CSRF protection -->
    <label for="imageLink">Image Link:</label><br>
    <input type="text" id="imageLink" name="imageLink"><br>
    <label for="link">Link:</label><br>
    <input type="text" id="link" name="link"><br><br>
    <button type="submit">Add Sponsor</button>
</form>
</div>

<?php if($povedaliONasList): ?>
    <h1> Povedali o nás </h1>
    <ul>
        <?php $__currentLoopData = $povedaliONasList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $povedaliONas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
            <form action="<?php echo e(route('update-povedaliONas', ['id' => $povedaliONas->id])); ?>" method="POST">
                <?php echo csrf_field(); ?> <!-- CSRF protection -->
                <?php echo method_field('PUT'); ?> <!-- Use PUT method for update -->
                <img src="<?php echo e(url('storage/images/' . $povedaliONas->imageLink)); ?>" class="img-fluid" style="max-height: 200px;" alt=""><br>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo e($povedaliONas->name); ?>"><br>
                <label for="quote">Quote:</label><br>

                <textarea id="quote" name="quote"><?php echo e($povedaliONas->quote); ?></textarea><br>

                <label for="pozicia">Pozicia:</label><br>
                <input type="text" id="pozicia" name="pozicia" value="<?php echo e($povedaliONas->pozicia); ?>"><br>
                <label for="imageLink">Image Link:</label><br>
                <input type="text" id="imageLink" name="imageLink" value="<?php echo e($povedaliONas->imageLink); ?>"><br><br>
                <button type="submit">Update PovedaliONas</button>
            </form>

            <form action="<?php echo e(route('delete-povedaliONas', ['id' => $povedaliONas->id])); ?>" method="POST">
                <?php echo csrf_field(); ?> <!-- CSRF protection -->
                <?php echo method_field('DELETE'); ?> <!-- Use DELETE method for delete -->
                <button type="submit">Delete PovedaliONas</button>
            </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <b>No PovedaliONas</b>
<?php endif; ?>

<div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
<form action="<?php echo e(route('create-povedaliONas')); ?>" method="POST">
    <?php echo csrf_field(); ?> <!-- CSRF protection -->
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="quote">Quote:</label><br>
    <input type="text" id="quote" name="quote"><br>
    <label for="pozicia">Pozicia:</label><br>
    <input type="text" id="pozicia" name="pozicia"><br>
    <label for="imageLink">Image Link:</label><br>
    <input type="text" id="imageLink" name="imageLink"><br><br>
    <button type="submit">Add PovedaliONas</button>
</form>
</div>

<?php if($speakers): ?>
    <h1> Speakers </h1>
    <ul>
        <?php $__currentLoopData = $speakers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speaker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
            <form action="<?php echo e(route('update-speaker', ['id' => $speaker->id])); ?>" method="POST">
                <?php echo csrf_field(); ?> <!-- CSRF protection -->
                <?php echo method_field('PUT'); ?> <!-- Use PUT method for update -->
                <img src="<?php echo e(url('storage/images/' . $speaker->imageLink)); ?>" class="img-fluid" style="max-height: 200px;" alt=""><br>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo e($speaker->name); ?>"><br>
                <label for="skusenosti">Experience:</label><br>
                <input type="text" id="skusenosti" name="skusenosti" value="<?php echo e($speaker->skusenosti); ?>"><br>
                <label for="firma">Company:</label><br>
                <input type="text" id="firma" name="firma" value="<?php echo e($speaker->firma); ?>"><br>
                <label for="linkedIn">LinkedIn:</label><br>
                <input type="text" id="linkedIn" name="linkedIn" value="<?php echo e($speaker->linkedIn); ?>"><br>
                <label for="imageLink">Image Link:</label><br>
                <input type="text" id="imageLink" name="imageLink" value="<?php echo e($speaker->imageLink); ?>"><br><br>
                <button type="submit">Update Speaker</button>
            </form>

            <form action="<?php echo e(route('delete-speaker', ['id' => $speaker->id])); ?>" method="POST">
                <?php echo csrf_field(); ?> <!-- CSRF protection -->
                <?php echo method_field('DELETE'); ?> <!-- Use DELETE method for delete -->
                <button type="submit">Delete Speaker</button>
            </form>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <b>No speakers</b>
<?php endif; ?>


<div  style="border: 2px solid #1a202c; padding: 10px; margin-bottom: 10px;">
<form action="<?php echo e(route('create-speaker')); ?>" method="POST">
    <?php echo csrf_field(); ?> <!-- CSRF protection -->
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="skusenosti">Experience:</label><br>
    <input type="text" id="skusenosti" name="skusenosti"><br>
    <label for="firma">Company:</label><br>
    <input type="text" id="firma" name="firma"><br>
    <label for="linkedIn">LinkedIn:</label><br>
    <input type="text" id="linkedIn" name="linkedIn"><br>
    <label for="imageLink">Image Link:</label><br>
    <input type="text" id="imageLink" name="imageLink"><br><br>
    <button type="submit">Add Speaker</button>
</form>
</div>


<?php echo $__env->make("parts.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\backend_projekt\resources\views/adminrozhranie.blade.php ENDPATH**/ ?>