@props(['image' => 'no_image.png'])

<img src="{{ \File::exists('storage/books/' . $image) ? asset('storage/books/' . $image) : asset('storage/books/no_image.png') }}"
    {!! $attributes->merge([
        'class' => 'w-auto',
    ]) !!} />
