@extends('layouts.main')
@section('MainContent')

@php
use App\Models\Student;
$students = Student::all();

@endphp

<div class="row form-container">
    <div class="col-md-3" >
        <form action="{{ route('course-students.update',  $courseStudent->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="student">Name Student</label>
                <select name="student_id" id="student" class="form-control" style="width:300px;">
                    <option value="">Select student</option>
                    @foreach ($students as $student)
                        @if ($student->is_active)
                            <option value="{{ $student->id }}" {{ $courseStudent->student_id == $student->id ? 'selected' : '' }}>
                                {{ $student->name_english }}
                            </option>
                        @endif
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="amount_paid">amount_paid</label>
                <input type="number" name="amount_paid"  value="{{$courseStudent->amount_paid}}"  id="amount_paid" class="form-control"style="width: 300px;" >
            </div>
       
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date"value="{{$courseStudent->start_date}}" class="form-control" style="width: 300px; height: 40px;">
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{$courseStudent->end_date}}" class="form-control" style="width: 300px; height: 40px;">
            </div>
      
            <button type="submit" class="btn btn-primary" id="btn-primary">Save</button>
        </form>
    </div>
<script>
    $(document).ready(function() {
        $("#btn-primary").click(function() {
            alert("Register Update successfully");
        });
    });
</script>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
 tinymce.init({
  selector: 'textarea#editor'
});
</script>

@stop
