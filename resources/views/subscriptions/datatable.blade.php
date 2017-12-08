    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Subscriber</th>
                <th>Modules</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>

            <?php foreach ($data as $key => $value):?>
                <tr id="<?=$value->id?>">
                    <!-- <td><input type="checkbox" class="chk-list"></td> -->
                    <td><?=ucwords($value->company_name) ?></td>
                    <td><?=ucwords($value->module_name) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <span><button class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> &nbsp;Remove</button></span> -->
    <span> {!! $data->render() !!}</span>