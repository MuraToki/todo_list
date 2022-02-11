@extends('layouts.app')

@section('content')
<div class="form-main">
    <form action="{{ route('store') }}" method="post" onSubmit="return checkSubmit()">
        @csrf
        <input type="text" name="text" placeholder="やることを書いてね！">
        <button type="submit" class="btn btn-success">追加</button>
    </form>
</div>

<h1>Todo_Show</h1>
<section class="table_main">
    <table>
        <tr class="thead">
            <th>Number</th>
            <th>Todo_Lsit</th>
            <th>At_Time</th>
            <th></th>
        </tr>
        @foreach($todos as $todo)
        <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->text }}</td>
            <td>{{ $todo->created_at }}</td>

            <form method="post" action="{{ route('delete', $todo->id) }}" onSubmit="return checkDelete()">
                @csrf
                <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
            </form>
        </tr>
        @endforeach
        
    </table>
</section>

<script>

function checkSubmit(){
    if(confirm('投稿してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}

function checkDelete(){
    if(confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}

</script>
@endsection
