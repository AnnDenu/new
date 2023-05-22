<x-app-layout>
<div class="container px-12 py-8 mx-auto">
<h1 class="text-2xl font-bold dark:bg-slate-800 text-center">Корзина</h1>

<?php
    $sum = 0;
?>

@if (!count($favorits))
    <p>Здесь пусто, добавьте избранное</p>
@else

<table class="w-full whitespace-no-wrap">
    <thead>
        <tr class="text-left font-bold">
            <td class="border px-6 py-4 dark:bg-slate-800">Наименование</th>
            <td class="border px-6 py-4 dark:bg-slate-800">Изображение</th>
            <td class="border px-6 py-4 dark:bg-slate-800">Добавить</th>
            <td class="border px-6 py-4 dark:bg-slate-800">Удалить</th>
        </tr>
    </thead>
    <tbody>
@foreach($favorits as $favorit)
     <tr>
         <td class="border px-6 py-4 dark:bg-slate-800">{{$favorit->product->name}}</td>
         <td class="border px-6 py-4 dark:bg-slate-800">{{$sum += $favorit->product->price * $favorit->count}}</td>
         <td class="border px-6 py-4 dark:bg-slate-800"><img src="storage/{{$favorit->product->image}}" /></td>
         <td class="border px-6 py-4 dark:bg-slate-800 ">{{$favorit->count}}</td>
         <td class="border px-6 py-4">
         <form action="/favorit/{{$favorit->id}}/count" method="get">
                 <input class="text-black" type="number" min="1" max="99" name="count" value="{{$favorit->count}}">
                 <button  class="inline-block dark:bg-slate-800 rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">Добавить</button>
             </form>
         </td>
         <td class="border px-6 py-4">
          <form action="/favorit/{{$favorit->id}}/remove" method="post">
                 @csrf
                 <button type="submit"  class="inline-block dark:bg-slate-800 rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">Удалить</button>
             </form>
         </td>
     </tr>
@endforeach
    </tbody>
</table>
<button type="submit"  class="text-2xl font-bold dark:bg-slate-800"> <a href="{{ route('order.index')}}">Добавить в используемое</a></button>
@endif
</div>
</x-app-layout>