<div class="card bg-light mt-3" style="border-color: var(--color5, #ffffff)">
    <div class="card-header" style="background-color: var(--color5, #ffffff); color: var(--color2, #000000)">
        <h3>ধরণ</h3>
    </div>
    <div class="card-body" style="background-color: var(--color4, #ffffff)">
        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item"><a href="{{ route('category.show', array($category->id, $category->slug)) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>