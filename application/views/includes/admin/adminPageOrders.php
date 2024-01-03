<div class="row">

    <div class="col-12">
    <?php if(!empty($orders)):?>
    
    <table class="table table-striped table-hover">
        <thead>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Date</th>
            <th>Total</th>
            <th>Status</th>
            <th>Options</th>
        </thead>
        <tbody>
            <?php foreach($orders as $o):?>
                <tr>
                    <td><?= $o->order_id?></td>
                    <td><?= $o->user_id?></td>
                    <td><?= $o->order_date?></td>
                    <td><?= $o->order_sum?></td>
                    <td><?php echo ($o->isCompleted == 0) ? 'in Progress' : 'Completed'?></td>
                    <td>
                        <a href="<?= base_url('completeOrder/').$o->order_id?>" class="btn btn-sm  <?php echo ($o->isCompleted == 0) ? 'btn-primary' : 'btn-success'?>">
                            <?php echo ($o->isCompleted == 0) ? 'Complete' : 'Completed'?>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php endif;?>

    </div>
</div>

