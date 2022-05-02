<table>
    <tr>
        <th>Name</th>
        <th>Mail</th>
        <th>Age</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->age}}</td>
    </tr>
    @endforeach
</table>

<br>

<form action="/person" method="POST">
<table>
    @csrf
    <tr>
        <th>name: </th>
        <td><input type="text" name="name" value="{{old('name')}}"></td>
    </tr>
    <tr>
        <th>mail: </th>
        <td><input type="text" name="mail" value="{{old('mail')}}"></td>
    </tr>
        <th>age: </th>
        <td><input type="number" name="age" value="{{old('age')}}"></td>
    <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
    </tr>
</table>
</form>
