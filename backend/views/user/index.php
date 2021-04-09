
<?php

    use kartik\select2\Select2;

    $this->title ="Users";
    $this->params['breadcrumbs'][] = $this->title;

    $js = <<< JS
        $('.role').change(function () {
            var id = $(this).attr('name'); 
            var role = $(this).val();
            alert(id + '-' + role);
            $.ajax({
                type: 'post',
                url: 'change-role',
                data: {'id' : id, 
                        'role' : role
                    },
                success: function() {
                    alert('Role is changed');
                }
            })
        });

        $('.delete').click(function(){
            let id = $(this).attr('value');
            $.ajax({
                type: 'post',
                url: 'delete-user',
                data: {'id' : id, 
                    },
                success: function() {
                    $('.user-' + id).remove(); //jQuery
                    alert('User has been delete');
                }
            })
        });
    JS;
    $this->registerJS($js)
?>

<table class="table table-striped">
    <thead>
        <th>#</th>
        <th class="text-center">Nick name</th>
        <th>Email address</th>
        <th class="text-center">Role</th>
        <th></th>
    </thead>
    <tbody>
        <?php
            $count = 1;
            foreach ($users as $user) {
        ?>
        <tr scope="row" class="user-<?=$user['id']?>">
            <td><?=$count++?></td>
            <td class="text-center"><?=$user['username']?></td>
            <td><?=$user['email']?></td>
            <td>
                <div class="col-md-12">
                    <?= Select2::widget ([
                        'name' => $user['id'],
                        'id' => $user['id'],
                        'data' => $role_array,
                        'value'=>$user['role'],
                        'options' => [
                            'class' => 'role',
                            'placeholder' => 'Select..',
                            'multiple' => false
                        ],
                    ]);?>
                </div>
            </td>
            <td>
                <div class="text-center">
                    <a href="#" class="btn btn-danger btn-sm delete" role="button" aria-pressed="true" value ="<?=$user['id']?>" >Delete</a>
                </div>
            </td>
        </tr>

        <?php
            }
        ?>
    </tbody>
</table>