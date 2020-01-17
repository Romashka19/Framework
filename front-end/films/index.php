<p>Main film page</p>
<a type="button" class="btn btn-primary" href="create">Cоздать</a>
<table>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Автор</th>
        <th>Бюджет</th>
        <th>Актеры</th>
        <th></th>
    </tr>
    <?php foreach ($data as $list): ?>
    <?php //$list = ((object)$list); ?>
    <tr>
        <td><?=$list["id"]?></td>
        <td><?=$list["name"]?></td>
        <td><?=$list["director"]?></td>
        <td><?=$list["budget"]?></td>
        <td><?=$list["actors"]?></td>
        <td>
            <button type="button" class="btn btn-primary" >Обновить</button>
            <button type="button" class="btn btn-danger deleteBtn" >Удалить</button></td>
    </tr>
    <?php endforeach; ?>
</table>
<a type="button" class="btn btn-success" href="/">На главную</a>


<script>

    $(document).ready(function () {
        $('.deleteBtn').on('click', function () {
            $('#deleteModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

        });
    });

</script>
<!--- MODAL DELETE------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="delete" method="post">

      <div class="modal-body">
        <input type="hidden" name="delete_id" id="delete_id">
        <h4>Удалить информацию</h4>
      </div>
      <div class="modal-footer">
        <button type="submit" name="deleteData" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>
  </div>
</div>