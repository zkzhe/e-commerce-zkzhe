@extends('admin.admin_master')
@section('admin')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Subscriber List</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <form method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" formaction="{{ route('deleteall') }}">全部刪除</button>
                <h6 class="card-body-title">Subscriber List</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">ID</th>
                                <th class="wd-15p">信箱</th>
                                <th class="wd-15p">Subscribiing Time</th>
                                <th class="wd-20p">行動</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newslaters as $key => $value)
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="{{ $value->id }}">{{ $key + 1 }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->created_at)->diffForhumans() }}</td>
                                <td>
                                    <a href="{{ URL::to('delete/newslater/'.$value->id) }}" class="btn btn-sm btn-danger" id="delete">刪除</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
        </div><!-- card -->
        </form>
    </div><!-- sl-mainpanel -->
</div> <!-- ########## END: MAIN PANEL ########## -->


@endsection