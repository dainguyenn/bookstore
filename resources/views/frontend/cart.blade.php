<x-guest-layout>
    <ul>
        
   @if (isset($books))
    
   @foreach ($books as $book)
   <li>{{$book['item']['title']}}</li>
   <li>{{$book['qty']}}</li>
   <li>{{$book['price']}}</li>
    @endforeach
<li>{{$total}}</li>
@endif
    
</ul>
</x-guest-layout>