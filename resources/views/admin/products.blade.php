@foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->category->name }}</td>
    </tr>
@endforeach
