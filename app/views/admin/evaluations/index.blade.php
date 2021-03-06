@extends('layouts.default')

@section('content')
    <h2>Evaluation Schedule Management <a href="/admin/evaluations/create" class="btn btn-primary">Add New</a></h2>
    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
        <tr>
            <th>Start At</th>
            <th>End At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($evaluations as $evaluation)
            <tr>
                <td>{{ date('M d Y', strtotime($evaluation->start_at)) }}</td>
                <td>{{ date('M d Y', strtotime($evaluation->end_at)) }}</td>
                <td>
                    <a href="/admin/evaluations/{{ $evaluation->id }}/edit" class="btn btn-warning">Update</a>
                    <a href="#" class="deleteItem btn btn-danger" data-item="{{ $evaluation->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('page-script')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable();

            $('.deleteItem').on('click', function(e) {
                e.preventDefault();

                if(!confirm('Are you sure to delete this item?')) {
                    return false;
                }
                var id = $(this).attr('data-item');
                var $that = $(this);

                var url = location.href;

                if(url.substr(-1) == '/') {
                    url = url.substr(0, url.length - 1);
                }

                $.ajax({
                    url:  url + '/' + id,
                    type:"post",
                    data: { _method:"DELETE" },
                    success: function(data) {
                        alert('Item successfully deleted');
                        //location.reload();
                        var rowSelected = $that.parent().parent();
                        table.row(rowSelected).remove().draw();
                    }
                });
            });
        });
    </script>
@stop