<tr>
    <td>{{$product->id}}</td>
    <td>NULL</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->created_at }}</td>
    <td>{{$product->user_id}}</td>
    <td>{{$product->ractopamine}}</td>
    <td>
        <a href="{{ route('home') }}" class="btn btn-info btn-sm">
            詳細資料
        </a>
    </td>
</tr>
