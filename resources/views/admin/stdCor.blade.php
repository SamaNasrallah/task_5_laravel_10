@extends('layouts.main')
@section('MainContent')
<br>
@if(session('error'))
    <div class="alert alert-danger" style=" position: fixed;   top: 0;
              left: 50%;
              transform: translateX(-50%);
              z-index: 1000;
              width:600px;
              text-align: center;">
        {{ session('error') }}
    </div>

@endif


    <a href="{{ url('reg/create/'.$course_id) }}" class="btn btn-success" style="font-size: 18px">Register_Student</a>
<table id="myTable" class="table table-success table-striped" >

    <thead>
    <tr style="text-align: center;">
        <th>ID</th>
        <th>name_english</th>
        <th>is_paid</th>
        <th>amount_paid</th>
        <th>remaining_amount</th>
        <th>start_date</th>
        <th>end_date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    @foreach ($courseStd as $corr)
     <tr>
        <td>{{ $corr->id }}</td>
        <td>{{ $corr->student->name_english }}</td> 
        <td>
            @if($corr->is_paid == 0)
            @if($corr->amount_paid == 0)
                Payment is not made
            @elseif($corr->amount_paid < $corr->course->course_price)
                Partial payment made
            @else
                Payment was made
            @endif
              @else
              payment was made

        @endif
        </td>
        <td>{{ $corr->amount_paid }}</td>
        <td>{{ $corr->remaining_amount }}</td>
        <td>{{ $corr->start_date }}</td>
        <td>{{ $corr->end_date }}</td>
        <td>
            <a class="btn btn-primary" href="{{route('course-students.edit',$corr->id) }}">
                Edit
            </a>
        </td>
        <td>
            <form action="{{ route('course-students.destroy', $corr->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" id="btn-delete-co">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    
    @endforeach
    <script>
        $(document).ready(function() {
           $("#btn-delete-co").click(function() {
              alert("Register Deleted successfully");
          });
        });
     </script>
</tbody>
<script>
    $(document).ready(function () {
  $('#myTable').DataTable({
    "paging": true,
    "ordering": true,
    "searching": true,
    "initComplete": function () {
        $('#myTable').css('width', '80%');
        $('#myTable_wrapper').css('margin-left', '100px');
    }
  });
});
</script>


</table>

@stop
