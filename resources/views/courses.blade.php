<x-app-layout>
    <div class="container px-12 py-8 mx-auto">
        <h3 class="text-2xl font-bold text-gray-900">Каталог курсов</h3>
        <div class="h-1 bg-gray-800 w-48"></div>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($courses as $course)
            <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-md shadow-md">
                <img src="{{ url($course->image) }}" alt="" class="w-full max-h-60">
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-gray-700 uppercase">{{ $course->name }}</h3>
                    </div>
                    <form action="{{ route('favorit.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
                        @csrf
                        <input type="hidden" value="{{ $course->id }}" name="id">
                        <input type="hidden" value="{{ $course->name }}" name="name">
                        <input type="hidden" value="{{ $course->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-1.5 text-white text-sm bg-gray-900 rounded" href = '/course'>Добавить в избранное</button>
                        <button class="px-2 py-1 text-white text-sm bg-gray-700 rounded">Узнать подробнее</button>
                    </form>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>