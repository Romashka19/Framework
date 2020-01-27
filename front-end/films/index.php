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
    <tr data-value="<?=htmlspecialchars(json_encode($list))?>">
        <td data-target="name"><?=$list["name"]?></td>
        <td data-target="director" data-value="<?=$list["director"]?>"><?=$list["director"]?></td>
        <td data-target="budget"><?=$list["budget"]?></td>
        <td data-target="actors"><?=$list["actors"]?></td>
        <td>
            <button type="button" href="#" class="btn btn-success updateBtn" ">Update</button>
            <button type="button" class="btn btn-danger deleteBtn" >Удалить</button></td>
    </tr>
    <?php endforeach; ?>
</table>
<a type="button" class="btn btn-success" href="/">На главную</a>

<!---SCRIPTS------------------------------------------------------------------------------ --->
<script>
    $(document).ready(function () {
        $('.deleteBtn').on('click', function () {
            $('#deleteModal').modal('show');
            $tr = $(this).closest('tr');
            var text = JSON.parse($tr.attr('data-value'));
            console.log(text.id);
            $('#id').val(text.id);

        });
    });

</script>

<script>
    $(document).ready(function () {
        $('.updateBtn').on('click', function () {
            $tr = $(this).closest('tr');
            var text = JSON.parse($tr.attr('data-value'));
            console.log(text);
            $('#name').val(text.name);
            $('#director').val(text.director);
            $('#actors').val(text.actors);
            $('#budget').val(text.budget);
            $('#id').val(text.id);
            $('#updateModal').modal('toggle');
        })

        $('#Submit').click(function () {
            var id = $('#id').val();
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
        <input type="hidden" name="id" id="id">
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
                    <input type="text" name="id" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Director</label>
                    <input type="text" name="director" id="director" class="form-control">
                </div>
                <div class="form-group">
                    <label>Actors</label>
                    <input type="text" name="actors" id="actors" class="form-control">
                </div>
                <div class="form-group">
                    <label>Budget</label>
                    <input type="text" name="budget" id="budget" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <a id="Submit" class="btn btn-primary pull-right" href="/films/">UPDATE</a>
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>