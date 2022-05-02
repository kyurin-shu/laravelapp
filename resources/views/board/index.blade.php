<table>
    <tr>
        <th>User</th>
        <th>Content</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>{{$item->person->getData()}}</td>
        <td>{{$item->getData()}}</td>
    </tr>
    @endforeach
</table>

<br>

<form action="/board" method="POST">
<table>
    @csrf
    <tr>
        <th>person id: </th>
        <td><input type="number" name="person_id" value="{{old('person_id')}}"></td>
    </tr>
    <tr>
        <th>title: </th>
        <td><input type="text" name="title" value="{{old('title')}}"></td>
    </tr>
        <th>message: </th>
        <td><input type="text" name="message" value="{{old('message')}}"></td>
    <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
    </tr>
</table>
</form>
