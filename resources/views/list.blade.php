<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Ajax Todo list project</title>
</head>
<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ajax Todo List <a href="" class="pull-right" id="addNew" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></h3>
                    </div>
                    <div class="panel-body">

                        <ul class="list-group">
                            
                        </ul>
                        <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Vestibulum at eros</li>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="title">Add new item</h4>
                                </div>
                                <div class="modal-body">
                                    <p><input type="text" placeholder="Input your text here" id="addItem" class="form-control"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="delete" style="display : none">Delete</button>
                                    <button type="button" class="btn btn-primary" id="saveChanges" style="display : none">Save changes</button>
                                    <button type="button" class="btn btn-primary" id="addButton">Add item</button>
                                </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>
{{csrf_field()}}
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
</script>

<script>
    $(document).ready(function(){
        $('.ourItem').each(function(){
            $(this).click(function(event){
                var text = $(this).text();
                $('#title').text('Edit Item');
                $('#addItem').val(text);
                $('#delete').show(400);
                $('#saveChanges').show(400);
                $('#addButton').hide(400);
                console.log(text);
            });
        });

        $('#addNew').click(function(event){
            $('#title').text('Add New Item');
            $('#addItem').val("");
            $('#delete').hide(400);
            $('#saveChanges').hide(400);
            $('#addButton').show(400);
        });

        $('#addButton').click(function(event){
            var text = $('#addItem').val();
            $.post('list', {'text': text, '_token' : $('input[name=_token]').val()}, function(data){
                console.log(data);
            });
        });

    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>