<div class="panel-group" id="accordion">
    <?php $count = 0; ?>
    <?php foreach ($module['item'] as $item ) : $count++;?>
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $count; ?>">
                    <?php echo $item['heading']; ?>
                </a>
            </h4>
        </div>
        <div id="collapse<?php echo $count; ?>" class="panel-collapse collapse <?php echo ($count === 1) ? 'in' : ''; ?>">
            <div class="panel-body">
                <?php echo $item['text']; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>