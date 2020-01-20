<p>Main film page</p>
<a type="button" class="btn btn-primary" href="create">Cоздать</a>
<table>
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Бюджет</th>
        <th>Актеры</th>
        <th></th>
    </tr>
    <?php foreach ($data as $list): ?>
    <?php //$list = ((object)$list); ?>
    <tr id="<?=$list["id"] ?>" >
        <td data-target="name"><?=$list["name"]?></td>
        <td data-target="director"><?=$list["director"]?></td>
        <td data-target="budget"><?=$list["budget"]?></td>
        <td data-target="actors"><?=$list["actors"]?></td>
        <td>
            <a href="#" class="btn btn-success updateData" data-role="update" data-id="<?php echo $list['id']; ?>">Update</a>
            <button type="button" class="btn btn-danger deleteBtn" >Удалить</button></td>
    </tr>
    <?php endforeach; ?>
</table>
<a type="button" class="btn btn-success" href="/">На главную</a>

<!---SCRIPTS------------------------------------------------------------------------------ --->

<script>
    $(document).ready(function () {

        $(document).on('click', 'a[data-role=update]', function () {
            var id = $(this).data('id');
            var name = $('#'+id).children('td[data-target=name]').text();
            var director = $('#'+id).children('td[data-target=director]').text();
            var actors = $('#'+id).children('td[data-target=actors]').text();
            var budget = $('#'+id).children('td[data-target=budget]').text();

            $('#name').val(name);
            $('#director').val(director);
            $('#actors').val(actors);
            $('#budget').val(budget);
            $('#filmID').val(id);

            $('#updateModal').modal('toggle');
        })

        $('#Submit').click(function () {
            var id = $('#filmID').val();
            var name = $('#name').val();
            var director = $('#director').val();
            var actors = $('#actors').val();
            var budget = $('#budget').val();

            $.ajax({
                url : '/films/update',
                method : "POST",
                dataType: "json",
                data : {
                    id : id, name : name, director : director,
                    actors : actors, budget : budget},
                success : function (response) {
                    $('#'+id).children('td[data-target=name]').text(name);
                    $('#'+id).children('td[data-target=director]').text(director);
                    $('#'+id).children('td[data-target=actors]').text(actors);
                    $('#'+id).children('td[data-target=budget]').text(budget);
                    $('#updateModal').modal('toggle');
                }
            })

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
        <button type="submit" name="deleteData" class="btn btn-danger" href="/front-end/films/">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!--- MODAL UPDATE------------------------------------------------------------------------------------------ -->
<div class="modal" id="updateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">UPDATE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="update" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Director</label>
                    <input type="text" id="director" class="form-control">
                </div>
                <div class="form-group">
                    <label>Actors</label>
                    <input type="text" id="actors" class="form-control">
                </div>
                <div class="form-group">
                    <label>Budget</label>
                    <input type="text" id="budget" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" id="filmID" class="form-control">
                </div>

            </div>
            <div class="modal-footer">
                <a href="#" id="Submit" name="Submit" class="btn btn-primary pull-right">UPDATE</a>
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>